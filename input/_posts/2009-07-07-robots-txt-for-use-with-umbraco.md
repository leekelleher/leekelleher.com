---
id: 299
title: Robots.txt for use with Umbraco
date: 2009-07-07T16:10:30+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=132
permalink: /2009/07/07/robots-txt-for-use-with-umbraco/
dsq_thread_id:
  - 1054584002
tags:
  - Robots.txt
  - SEO
  - Umbraco
---
_I originally posted this over at the Our Umbraco community wiki. [[Robots.txt for use with Umbraco](http://our.umbraco.org/wiki/reference/umbraco-best-practices/robotstxt-for-use-with-umbraco)] I am only posting it on my blog as a cross-reference. The Our Umbraco wiki version will evolve with the community&#8217;s experience and knowledge._

The Robots Exclusion Protocol has been around for many years, yet there are a lot of web-developers who are unaware of the reasons for having a robots.txt file in the root of their websites.

There have been many rumours around whether the bigger search engine crwalers (i.e. Googlebot) consider your website amateurish if you didn&#8217;t have a robots.txt &#8211; and if handled badly, could lead to your site being invisible on SERPs.

If you are happy for a crawler to crawl/index all of your website&#8217;s content, then you can use the following:

<pre class="brush: bash; title: ; notranslate" title="">User-agent: *
Disallow:</pre>

However, when using Umbraco to power my websites, it is preferable to define which folders are accessible by the crawler. Personally, I would not like to see the contents of my `/umbraco/` folder to be returned in Google&#8217;s SERPs.

Here is an example of the robots.txt that I have used on several Umbraco-powered websites.

<pre class="brush: bash; title: ; notranslate" title=""># robots.txt for Umbraco
User-agent: *
Disallow: /aspnet_client/
Disallow: /bin/
Disallow: /config/
Disallow: /css/
Disallow: /data/
Disallow: /scripts/
Disallow: /umbraco/
Disallow: /umbraco_client/
Disallow: /usercontrols/
Disallow: /xslt/</pre>

From my perspective, there is no reason for a search engine crawler to be crawling/indexing files from any of the above folders &#8211; you may have a different perspective, to which you can amend your robots.txt accordingly.

For more information about the robots.txt standard, please refer to the official website: <http://www.robotstxt.org/robotstxt.html>