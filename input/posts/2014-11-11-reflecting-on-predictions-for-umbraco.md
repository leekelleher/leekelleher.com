title: "Reflecting on predictions for Umbraco"
link: "http://leekelleher.com/2014/11/11/reflecting-on-predictions-for-umbraco/"
pubDate: "Tue, 11 Nov 2014 13:58:18 +0000"
guid: "http://leekelleher.com/?p=2077"
dc_creator: "leekelleher"
wp_post_id: 2077
wp_post_date: "2014-11-11 13:58:18"
wp_post_date_gmt: "2014-11-11 13:58:18"
wp_comment_status: "open"
wp_ping_status: "closed"
wp_post_name: "reflecting-on-predictions-for-umbraco"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '3213982942'
categories:
  - aspnet: "ASP.NET"
  - asp-net-vnext: "ASP.NET vNext"
  - blog: "blog"
  - cms: "CMS"
  - node-js: "node.js"
  - nosql: "NoSQL"
  - predictions: "predictions"
  - umbraco: "Umbraco"

---

# Reflecting on predictions for Umbraco

Last year a wrote a few <a href="http://leekelleher.com/2013/11/17/predictions-for-umbraco-beyond-2014/">predictions for Umbraco</a> - for beyond 2014; a 5-year future.

Reviewing those predictions, many things have happened in the world of web-development, so I would like to reflect on those.

<hr/>

<h3>node.js</h3>
The idea of switching Umbraco's "server-side" codebase from ASP.NET to node.js was quite appealing. Out-the-box it would be cross-platform, high-performance, asynchronous - all win!

Then <a href="http://blogs.msdn.com/b/dotnet/archive/2014/05/12/the-next-generation-of-net-asp-net-vnext.aspx">Microsoft announced ASP.NET vNext</a>! Bringing us... <a href="http://roslyn.codeplex.com/">Roslyn</a>! KVM! Cross-platform (Mono)! Async! NuGet! <a href="https://github.com/aspnet">All open-source</a>! <strong><em>BOOM!</em></strong>

<img src="http://www.reactiongifs.com/wp-content/uploads/2013/10/tim-and-eric-mind-blown.gif" alt="MIND EXPLOSION!" />

Scott Hanselman covers all this in his post: <a href="http://www.hanselman.com/blog/IntroducingASPNETVNext.aspx">Introducing ASP.NET vNext</a>

In a nutshell, ASP.NET vNext has reinvented itself as a killer web-platform for the next decade.

<strong>My revised predication would be that Umbraco will (<em>in time</em>) fully embrace ASP.NET vNext.</strong>

I'd say that the appeal for node.js is great - especially in that it would open up the playing field to great JavaScript developers.

<hr />

<h3>NoSQL (document database)</h3>
I still believe that document-databases are better suited for CMS repositories - flexible structures/data-models, etc. I don't have a favourite "NoSQL" flavour - (although redis and mongodb do get mentioned a lot in my various newsfeeds).

Would Umbraco ever leave its SQL Server roots? Maybe one day, but I doubt it will happen in the next 5 years - could be one for v12?

<a href="http://azure.microsoft.com/en-gb/documentation/articles/documentdb-introduction/">Microsoft have announced DocumentDB</a>, but that looks to be exclusively for Azure. At least this means someone in Microsoft recognised the need for document-databases on the .NET stack. <em>Food for thought.</em>

<hr />

<h3>The bifurcation of Umbraco</h3>
This prediction remains the same. It's the area that excites and interests me the most.

To <a href="http://leekelleher.com/2013/11/17/predictions-for-umbraco-beyond-2014/">quote from last year</a>:
<blockquote>In terms of Umbraco, I think we'll see a demand for separating the "front-end" from the "back-office".
There'll be teams who will <strong><em>love the editorial experience</em></strong> that Umbraco offers, but are not willing to be forced to use the front-end technology/framework.</blockquote>

<hr />

Next week is the annual <a href="http://umbracoukfestival.co.uk/">Umbraco UK Festival</a> in London. If you are attending and want to discuss any of these predictions, then feel free to say hello for a chat.