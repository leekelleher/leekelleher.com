title: "Predictions for Umbraco - beyond 2014"
link: "http://leekelleher.com/2013/11/17/predictions-for-umbraco-beyond-2014/"
pubDate: "Sun, 17 Nov 2013 21:24:12 +0000"
guid: "http://leekelleher.com/?p=661"
dc_creator: "leekelleher"
wp_post_id: 661
wp_post_date: "2013-11-17 21:24:12"
wp_post_date_gmt: "2013-11-17 21:24:12"
wp_comment_status: "open"
wp_ping_status: "closed"
wp_post_name: "predictions-for-umbraco-beyond-2014"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1974520622'
categories:
  - blog: "blog"
  - cms: "CMS"
  - node-js: "node.js"
  - nosql: "NoSQL"
  - predictions: "predictions"
  - umbraco: "Umbraco"

---

# Predictions for Umbraco - beyond 2014

With <a href="http://our.umbraco.org/contribute/releases/700">Umbraco 7</a> release imminent, the community will be eager to see its adoption. For those who have been following the progress of its development, the entire back-office has been re-built from the ground up - from UX concepts to the introduction of the <a href="http://angularjs.org/">AngularJS framework</a>.  (For technical details, see <a href="http://umbraco.github.io/Belle/">the Belle documentation website</a>.)

The introduction of AngularJS is a major shift for Umbraco - it is also a bold statement - that <em>web-technology is moving forwards and we are embracing it!</em>

The consequence is that any 3rd-party back-office add-ons using WebForm-based DataTypes (or Macro Params)<a href="http://leekelleher.com/2013/11/17/predictions-for-umbraco-beyond-2014/#comment-1127790087">*</a> would no longer be supported. The impact of this on future adoption is be unknown, we'll wait and see how package developers deal with refactoring/upgrading their Property Editor codebases.

This isn't all doom and gloom, personally I have high hopes for Umbraco 7 - my point is that technology progresses, despite the backlash; despite the risks involved.

Seeing the use of AngularJS in the Umbraco back-office, I started to think how else could Umbraco progress, beyond the boundaries of the .NET framework/MS-stack.  Here are my predictions for Umbraco, not for the immediate future, but say a 5-year future.
<h3>node.js</h3>
With the introduction of AngularJS in the back-office, all of the "server-side" is handled by ASP.NET Web API.  This means that the CMS business-logic has been abstracted way from the back-office UI. Which leads to the question, could it be replaced?  Enter <a href="http://nodejs.org/">node.js</a>. Node.js is a platform built on top of Chrome's JavaScript runtime - meaning that it is a very fast, scalable and robust architecture.  The main advantage of using node.js for Umbraco's business-logic would opening it up to cross-platform (OS) support. Along with exposure to a vast number of JavaScript application developers.

Just think, running the same code on the server and the client? There are a lot of geek-romantic ideas of <a href="http://blog.nodejitsu.com/scaling-isomorphic-javascript-code">isomorphic JavaScript</a> <a href="http://nerds.airbnb.com/isomorphic-javascript-future-web-apps/">floating about</a>.

(You'll see from the <a href="http://umbraco.github.io/Belle/">Belle documentation website</a>, node.js can already be used for mocking the data-layer.)
<h3>NoSQL (document database)</h3>
Following the idea of Umbraco being cross-platform, the database component is a dilemma. SQL Server has served us very well, it is a great relational-database - of course, it is the de facto choice on the MS-stack.

If we take a step back and look at the nature of Umbraco, how flexible the schemas for content &amp; media are defined - this could be represented in a document database.

I don't have any predictions of which NoSQL/document-database could be used, (there are so many! mongodb, redis, RavenDB - to name a few); but it's a topic worth exploring.
<h3>The bifurcation of Umbraco</h3>
There's a great post on Gadgetopia called <a href="http://gadgetopia.com/post/7208">The Bifurcation of Content Management and Delivery</a>, which discusses the concept of separating the content-management (WCMS) from the content-delivery (WCDS).  In terms of Umbraco, I think we'll see a demand for separating the "front-end" from the "back-office". There'll be teams who will love the editorial experience that Umbraco offers, but are not willing to be forced to use the front-end technology/framework.  One potential solution would be for the default Umbraco to ship with its own detachable front-end "runtime" - becoming even more of a Lego analogy.

&nbsp;

Finishing up with a little note... these are all my own personal predictions, they don't represent my company, (<a href="http://www.umbrellainc.co.uk/">Umbrella</a>), nor do I have any "insider knowledge" from the Umbraco core team or HQ. They are just things that I'd been thinking about and wanted to get them "out there".  Let's discuss, collaborate and most of all progress! :-)