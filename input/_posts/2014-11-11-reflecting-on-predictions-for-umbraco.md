---
id: 2077
title: Reflecting on predictions for Umbraco
date: 2014-11-11T13:58:18+00:00
author: leekelleher
layout: post
guid: http://leekelleher.com/?p=2077
permalink: /2014/11/11/reflecting-on-predictions-for-umbraco/
dsq_thread_id:
  - 3213982942
categories:
  - blog
tags:
  - ASP.NET
  - ASP.NET vNext
  - CMS
  - node.js
  - NoSQL
  - predictions
  - Umbraco
---
Last year a wrote a few [predictions for Umbraco](http://leekelleher.com/2013/11/17/predictions-for-umbraco-beyond-2014/) &#8211; for beyond 2014; a 5-year future.

Reviewing those predictions, many things have happened in the world of web-development, so I would like to reflect on those.

* * *

### node.js

The idea of switching Umbraco&#8217;s &#8220;server-side&#8221; codebase from ASP.NET to node.js was quite appealing. Out-the-box it would be cross-platform, high-performance, asynchronous &#8211; all win!

Then [Microsoft announced ASP.NET vNext](http://blogs.msdn.com/b/dotnet/archive/2014/05/12/the-next-generation-of-net-asp-net-vnext.aspx)! Bringing us&#8230; [Roslyn](http://roslyn.codeplex.com/)! KVM! Cross-platform (Mono)! Async! NuGet! [All open-source](https://github.com/aspnet)! **_BOOM!_**

![MIND EXPLOSION!](http://www.reactiongifs.com/wp-content/uploads/2013/10/tim-and-eric-mind-blown.gif)

Scott Hanselman covers all this in his post: [Introducing ASP.NET vNext](http://www.hanselman.com/blog/IntroducingASPNETVNext.aspx)

In a nutshell, ASP.NET vNext has reinvented itself as a killer web-platform for the next decade.

**My revised predication would be that Umbraco will (_in time_) fully embrace ASP.NET vNext.**

I&#8217;d say that the appeal for node.js is great &#8211; especially in that it would open up the playing field to great JavaScript developers.

* * *

### NoSQL (document database)

I still believe that document-databases are better suited for CMS repositories &#8211; flexible structures/data-models, etc. I don&#8217;t have a favourite &#8220;NoSQL&#8221; flavour &#8211; (although redis and mongodb do get mentioned a lot in my various newsfeeds).

Would Umbraco ever leave its SQL Server roots? Maybe one day, but I doubt it will happen in the next 5 years &#8211; could be one for v12?

[Microsoft have announced DocumentDB](http://azure.microsoft.com/en-gb/documentation/articles/documentdb-introduction/), but that looks to be exclusively for Azure. At least this means someone in Microsoft recognised the need for document-databases on the .NET stack. _Food for thought._

* * *

### The bifurcation of Umbraco

This prediction remains the same. It&#8217;s the area that excites and interests me the most.

To [quote from last year](http://leekelleher.com/2013/11/17/predictions-for-umbraco-beyond-2014/):

> In terms of Umbraco, I think we&#8217;ll see a demand for separating the &#8220;front-end&#8221; from the &#8220;back-office&#8221;.
  
> There&#8217;ll be teams who will **_love the editorial experience_** that Umbraco offers, but are not willing to be forced to use the front-end technology/framework.

* * *

Next week is the annual [Umbraco UK Festival](http://umbracoukfestival.co.uk/) in London. If you are attending and want to discuss any of these predictions, then feel free to say hello for a chat.