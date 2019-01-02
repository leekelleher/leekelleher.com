---
id: 661
title: 'Predictions for Umbraco - beyond 2014'
date: 2013-11-17T21:24:12+00:00
author: leekelleher
layout: post
guid: http://leekelleher.com/?p=661
permalink: /2013/11/17/predictions-for-umbraco-beyond-2014/
dsq_thread_id:
  - 1974520622
tags:
  - CMS
  - node.js
  - NoSQL
  - predictions
  - Umbraco
---
With [Umbraco 7](http://our.umbraco.org/contribute/releases/700) release imminent, the community will be eager to see its adoption. For those who have been following the progress of its development, the entire back-office has been re-built from the ground up &#8211; from UX concepts to the introduction of the [AngularJS framework](http://angularjs.org/).  (For technical details, see [the Belle documentation website](http://umbraco.github.io/Belle/).)

The introduction of AngularJS is a major shift for Umbraco &#8211; it is also a bold statement &#8211; that _web-technology is moving forwards and we are embracing it!_

The consequence is that any 3rd-party back-office add-ons using WebForm-based DataTypes (or Macro Params)[*](http://leekelleher.com/2013/11/17/predictions-for-umbraco-beyond-2014/#comment-1127790087) would no longer be supported. The impact of this on future adoption is be unknown, we&#8217;ll wait and see how package developers deal with refactoring/upgrading their Property Editor codebases.

This isn&#8217;t all doom and gloom, personally I have high hopes for Umbraco 7 &#8211; my point is that technology progresses, despite the backlash; despite the risks involved.

Seeing the use of AngularJS in the Umbraco back-office, I started to think how else could Umbraco progress, beyond the boundaries of the .NET framework/MS-stack.  Here are my predictions for Umbraco, not for the immediate future, but say a 5-year future.

### node.js

With the introduction of AngularJS in the back-office, all of the &#8220;server-side&#8221; is handled by ASP.NET Web API.  This means that the CMS business-logic has been abstracted way from the back-office UI. Which leads to the question, could it be replaced?  Enter [node.js](http://nodejs.org/). Node.js is a platform built on top of Chrome&#8217;s JavaScript runtime &#8211; meaning that it is a very fast, scalable and robust architecture.  The main advantage of using node.js for Umbraco&#8217;s business-logic would opening it up to cross-platform (OS) support. Along with exposure to a vast number of JavaScript application developers.

Just think, running the same code on the server and the client? There are a lot of geek-romantic ideas of [isomorphic JavaScript](http://blog.nodejitsu.com/scaling-isomorphic-javascript-code) [floating about](http://nerds.airbnb.com/isomorphic-javascript-future-web-apps/).

(You&#8217;ll see from the [Belle documentation website](http://umbraco.github.io/Belle/), node.js can already be used for mocking the data-layer.)

### NoSQL (document database)

Following the idea of Umbraco being cross-platform, the database component is a dilemma. SQL Server has served us very well, it is a great relational-database &#8211; of course, it is the de facto choice on the MS-stack.

If we take a step back and look at the nature of Umbraco, how flexible the schemas for content & media are defined &#8211; this could be represented in a document database.

I don&#8217;t have any predictions of which NoSQL/document-database could be used, (there are so many! mongodb, redis, RavenDB &#8211; to name a few); but it&#8217;s a topic worth exploring.

### The bifurcation of Umbraco

There&#8217;s a great post on Gadgetopia called [The Bifurcation of Content Management and Delivery](http://gadgetopia.com/post/7208), which discusses the concept of separating the content-management (WCMS) from the content-delivery (WCDS).  In terms of Umbraco, I think we&#8217;ll see a demand for separating the &#8220;front-end&#8221; from the &#8220;back-office&#8221;. There&#8217;ll be teams who will love the editorial experience that Umbraco offers, but are not willing to be forced to use the front-end technology/framework.  One potential solution would be for the default Umbraco to ship with its own detachable front-end &#8220;runtime&#8221; &#8211; becoming even more of a Lego analogy.

&nbsp;

Finishing up with a little note&#8230; these are all my own personal predictions, they don&#8217;t represent my company, ([Umbrella](http://www.umbrellainc.co.uk/)), nor do I have any &#8220;insider knowledge&#8221; from the Umbraco core team or HQ. They are just things that I&#8217;d been thinking about and wanted to get them &#8220;out there&#8221;.  Let&#8217;s discuss, collaborate and most of all progress! :-)