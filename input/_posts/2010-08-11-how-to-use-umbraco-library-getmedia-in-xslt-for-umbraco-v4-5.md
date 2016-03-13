---
id: 310
title: How to use umbraco.library GetMedia in XSLT for Umbraco v4.5
date: 2010-08-11T15:42:39+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=210
permalink: /2010/08/11/how-to-use-umbraco-library-getmedia-in-xslt-for-umbraco-v4-5/
superawesome:
  - 'false'
jabber_published:
  - 1281541363
email_notification:
  - 1281541365
dsq_thread_id:
  - 1054182353
categories:
  - blog
tags:
  - code
  - GetMedia
  - snippet
  - Umbraco
  - XSLT
---
This is a quick follow-up on my previous blog post: &#8220;[How to use umbraco.library GetMedia in XSLT](http://blog.leekelleher.com/2009/11/30/how-to-use-umbraco-library-getmedia-in-xslt/)&#8220;.  At the request of fellow [Umbraco South-West UK](http://our.umbraco.org/events/umbraco-south-west-uk-user-meetup-(july-2010)) developer, [Dan](http://our.umbraco.org/member/5585), that I should update the code snippets for the new XML schema in Umbraco v4.5+

First a quick notice; if you are using v4.5.0, then please [upgrade to v4.5.1](http://umbraco.codeplex.com/releases/view/48015), as there was [a tiny bug in GetMedia](http://umbraco.codeplex.com/workitem/28147) that caused great confusion and headaches &#8211; you have been advised!

Without further ado, the updated XSLT snippet that you came here for&#8230;

<pre class="brush: xml; title: ; notranslate" title="">&lt;xsl:template match="/"&gt;
	&lt;xsl:variable name="mediaId" select="number($currentPage/mediaId)" /&gt;
	&lt;xsl:if test="$mediaId &gt; 0"&gt;
		&lt;xsl:variable name="mediaNode" select="umbraco.library:GetMedia($mediaId, 0)" /&gt;
		&lt;xsl:if test="$mediaNode/umbracoFile"&gt;
			&lt;img src="{$mediaNode/umbracoFile}" alt="[image]" height="{umbracoHeight}" width="{umbracoWidth}" /&gt;
		&lt;/xsl:if&gt;
	&lt;/xsl:if&gt;
&lt;/xsl:template&gt;</pre>

Any questions? [Come join us over at Our Umbraco&#8230;](http://our.umbraco.org/) we are a friendly bunch!