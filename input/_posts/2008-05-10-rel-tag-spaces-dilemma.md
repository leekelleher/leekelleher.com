---
id: 278
title: rel-tag-spaces dilemma
date: 2008-05-10T12:08:05+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=32
permalink: /2008/05/10/rel-tag-spaces-dilemma/
dsq_thread_id:
  - 1054583715
categories:
  - blog
tags:
  - ASP.NET
  - firefox
  - IIS
  - link
  - microformats
  - Operator
  - readysteadybook
  - rel-tag
  - rel-tag-spaces
  - tag
  - tagspace
---
Since I started using the [Operator](https://addons.mozilla.org/firefox/addon/4106) Firefox extension a couple of week ago, I&#8217;ve found it to be a useful tool &#8211; to quickly access microformatted content; such as Contact details and Tagspaces.

Whilst I was testing it out on [ReadySteadyBook](http://www.readysteadybook.com/), I noticed that the only tagspace was &#8220;`Blog.aspx`&#8220;, which seemed a bit weird. When I found the same problem on other websites, such as Amazon ([example here](http://www.amazon.com/gp/product/B000FI73MA/)) where the tagspace was &#8220;`ref=tag_dpp_cust_itdp_t`&#8220;. I thought this was a bug, so [I raised a ticket on Bugzilla](https://bugzilla.mozilla.org/show_bug.cgi?id=431708).

&#8230; however, [I was wrong!](https://bugzilla.mozilla.org/show_bug.cgi?id=431708#c1) [Michael Kaply](http://www.kaply.com/) (the Operator developer) pointed me towards [the Tagspaces spec](http://microformats.org/wiki/rel-tag#Tag_Spaces).

It seems that for a [rel-tag](http://microformats.org/wiki/rel-tag) to be recognised as a tagspace it needs to have a specific URI structure:

> Tags are embedded in HTTP URIs in a well-defined manner so that the tag embedded in an HTTP URI can be mechanically extracted from that URI. Specifically, the last segment of the path portion of the URI (after the final &#8220;/&#8221; character) contains the tag value. For example, the URI: http://www.example.com/tags/foo contains the tag &#8220;foo&#8221;.

This causes an issue for me. On [ReadySteadyBook](http://www.readysteadybook.com/), the site is built using ASP.NET (1.1) on a shared web hosting environment. This means that I have no control over how the web-server (IIS) handles the page requests. For legacy reasons, IIS is configured to only map URI that have ASP.NET extensions (e.g. **.aspx**, **.ascx**, **.ashx**, **.asmx**, etc) to handled by the .NET Framework. So any &#8220;fancy permalinks&#8221; that I want to use must have one of those extensions.

At present, an example of a tagspace on ReadySteadyBook is: `http://www.readysteadybook.com/Blog.aspx?tag=poetry`

(The &#8220;Blog.aspx&#8221; page is quite complex, it can take all sorts of parameter to filter out it&#8217;s content &#8211; hence my reason to use the querystring)

Even if I did pretty up the URI structure to not use the querystring, at most I could get it to this: `http://www.readysteadybook.com/blog/tag/poetry.aspx`

Unfortunately, that still wouldn&#8217;t pass the grade with the &#8220;Masters of the Microformats&#8221;! As the tag would be defined as &#8220;`poetry.aspx`&#8220;, rather than &#8220;`poetry`&#8220;. See my dilemma?

Should I keep the rel-tag attribute on my tag links? or remove them because it conflicts with the current version of the rel-tag specification? ([For other issues with the rel-tag spec, go here.](http://microformats.org/wiki/rel-tag-issues))

Alternatively, I could link them to an external tagspace, such as Technorati? <snarky>_oooh, they&#8217;d like that wouldn&#8217;t they!?!_</snarky> [A list of external tagspaces can be found here.](http://microformats.org/wiki/rel-tag-spaces)