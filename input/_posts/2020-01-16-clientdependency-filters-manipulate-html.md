---
title: "Using ClientDependency Filters to manipulate HTML"
date: 2020-01-16T13:37:00+00:00
layout: post
permalink: /2020/01/clientdependency-filters-manipulate-html/
tags:
  - Umbraco
  - ClientDependency
  - Code
---

On a recent Umbraco project, I needed to be able to manipulate the HTML contents before it was sent to the browser.

Typically, on Umbraco projects you'd do whatever you need do within Razor templating, but in my case, I had to do after the entire page markup was built. _(I won't go into details, as the requirement is specific to my client project.)_

My initial thought for the solution was using a `Request.Filter`. I'd done this previously in my ASP.NET WebForms days - even open open-sourced a packaged called [Safe Mail Link](https://our.umbraco.com/packages/website-utilities/safe-mail-link) that utilised this approach, _(it would encode/protect any email addresses found in the markup)_. The guts of the `Request.Filter` came from [Rick Strahl's `ResponseFilterStream` blog post](https://weblog.west-wind.com/posts/2009/nov/13/capturing-and-transforming-aspnet-output-with-responsefilter).

Given the original `ResponseFilterStream` code was originally posted over 10 years ago, _(wow!)_ I wasn't sure whether the approach would work with latest Umbraco _(v8 is ASP.NET MVC 5)_. Turns out, it does!

As I started to implement this approach, I recalled that the ClientDependency library _(which ships with Umbraco)_ uses a `HttpModule` to manipulate the HTML output to insert references to its bundled CSS & JS assets. So, thought it best to look at the source-code.

...and as it happens, [`ClientDependencyModule`](https://github.com/Shazwazza/ClientDependency/blob/v1.9.8/ClientDependency.Core/Module/ClientDependencyModule.cs) has a lovely undocumented feature in there... its very own `IFilter` interface.  This enables you to piggyback ClientDependency's `HttpModule` and manipulate the HTML with your own code!

After [a small bit of reverse-engineering](https://github.com/Shazwazza/ClientDependency/blob/v1.9.8/ClientDependency.Core/Module/ClientDependencyModule.cs#L126-L142), _(I know, I know, it's all open-source ... so I mean "researching")_, I had a working prototype! Here's a reduced example (for Umbraco v8) ...

```csharp
using System.Configuration;
using System.Web;
using ClientDependency.Core.Config;
using ClientDependency.Core.Module;
using Umbraco.Core;
using Umbraco.Core.Composing;

namespace Umbraco.Community.Web
{
    public class UpdateHtmlExampleComposer : IUserComposer
    {
        public void Compose(Composition composition)
        {
            ClientDependencySettings.Instance.ConfigSection.Filters
                .Add(new ProviderSettings(nameof(UpdateHtmlExampleFilter), typeof(UpdateHtmlExampleFilter).GetFullNameWithAssembly()));
        }
    }

    public class UpdateHtmlExampleFilter : IFilter
    {
        public HttpContextBase CurrentContext { get; private set; }

        public bool CanExecute()
        {
            // ClientDependency checks if the CurrentHandler is an `MvcHandler` type...
            // https://github.com/Shazwazza/ClientDependency/blob/v1.9.8/ClientDependency.Mvc/MvcFilter.cs#L31
            // that is a generic MVC request, covering both frontend and backoffice.
            // Which I only want to run this on frontend requests.
            // Fortunately, Umbraco does have an `UmbracoMvcHandler` for frontend requests.
            // Unfortunately, `UmbracoMvcHandler` is marked as internal...
            // https://github.com/umbraco/Umbraco-CMS/blob/release-8.5.1/src/Umbraco.Web/Mvc/UmbracoMvcHandler.cs#L17
            // so I can't explicitly check the type, I have to compare the string.
            return CurrentContext.CurrentHandler?.GetType().Name == "UmbracoMvcHandler";
        }

        public void SetHttpContext(HttpContextBase ctx) => CurrentContext = ctx;

        public string UpdateOutputHtml(string html)
        {
            // TODO: Do your HTML updates in here! 
            // ------------------------------------
            //    o    o/    o     o/    o     o/  
            //  //|   /|   //|    /|   //|    /|   
            //   / \  / \   / \   / \   / \   / \  
            // ------------------------------------

            return html
                .Replace("Headless", "Heartcore");
        }

        // NOTE: If ClientDependency's MvcFilter is valid, then I'm cool with that.
        public bool ValidateCurrentHandler() => true;
    }
}
```

Examples of things you could do with this, could be: minify the HTML markup; inject external scripts before the closing `</body>` tag, (e.g. [instant.page](https://instant.page/); protect/encode email address (a la [Safe Mail Link](https://our.umbraco.com/packages/website-utilities/safe-mail-link)); or a super-quick way to rename a product across an entire website?