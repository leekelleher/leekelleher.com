---
id: 306
title: How to use umbraco.library GetMedia in XSLT
date: 2009-11-30T14:33:14+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=188
permalink: /2009/11/30/how-to-use-umbraco-library-getmedia-in-xslt/
dsq_thread_id:
  - 1054323322
tags:
  - code
  - GetMedia
  - snippet
  - Umbraco
  - XSLT
---
From time to time I notice a reoccurring post over at the Our Umbraco forum; how to display an image (from the Media section) in XSLT?

A quick answer can be found on the Our Umbraco wiki for the [umbraco.library GetMedia](http://our.umbraco.org/wiki/reference/umbracolibrary/getmedia) method.

For most uses, the last example in the wiki works great.  But I want to show you a &#8220;super safe&#8221; way of dealing with GetMedia in XSLT.

Where I find a lot of the examples go wrong is that they make the assumption that a media node (XML) is returned from the GetMedia call, e.g.

<pre class="brush: xml; title: ; notranslate" title="">&lt;xsl:value-of select="umbraco.library:GetMedia($currentPage/data[@alias='mediaId'], 'false')/data[@alias='umbracoFile']" /&gt;</pre>

If the &#8216;mediaId&#8217; property didn&#8217;t contain either a numeric value or a valid media node id, then it would return **null** &#8230; meaning that the following &#8220;**/data**&#8221; would throw an Exception! (Displaying &#8220;_Error parsing XSLT file_&#8221; message on the front-end.)  Not what you or your users want to see!

In order to consider any user inputs, like media IDs not being selected, or even a referenced media node is deleted in the back-office, here is the &#8220;super safe&#8221; approach:

<pre class="brush: xml; title: ; notranslate" title="">&lt;xsl:template match="/"&gt;
	&lt;xsl:variable name="mediaId" select="number($currentPage/data[@alias='mediaId'])" /&gt;
	&lt;xsl:if test="$mediaId &gt; 0"&gt;
		&lt;xsl:variable name="mediaNode" select="umbraco.library:GetMedia($mediaId, 0)" /&gt;
		&lt;xsl:if test="count($mediaNode/data) &gt; 0"&gt;
			&lt;xsl:if test="string($mediaNode/data[@alias='umbracoFile']) != ''"&gt;
				&lt;img src="{$mediaNode/data[@alias='umbracoFile']}" alt="[image]"&gt;
					&lt;xsl:if test="string($mediaNode/data[@alias='umbracoHeight']) != ''"&gt;
						&lt;xsl:attribute name="height"&gt;
							&lt;xsl:value-of select="$mediaNode/data[@alias='umbracoHeight']" /&gt;
						&lt;/xsl:attribute&gt;
					&lt;/xsl:if&gt;
					&lt;xsl:if test="string($mediaNode/data[@alias='umbracoWidth']) != ''"&gt;
						&lt;xsl:attribute name="width"&gt;
							&lt;xsl:value-of select="$mediaNode/data[@alias='umbracoWidth']" /&gt;
						&lt;/xsl:attribute&gt;
					&lt;/xsl:if&gt;
				&lt;/img&gt;
			&lt;/xsl:if&gt;
		&lt;/xsl:if&gt;
	&lt;/xsl:if&gt;
&lt;/xsl:template&gt;</pre>

Here&#8217;s what happens:

  1. The &#8220;mediaId&#8221; is pulled from a property of the &#8220;currentPage&#8221; and cast as a number.  Optionally the &#8220;mediaId&#8221; could be passed in via a macro parameter, or somewhere else?
  2. The first condition checks the the &#8220;mediaId&#8221; is numeric, and greater-than zero.
  3. The &#8220;mediaId&#8221; is passed through to &#8220;GetMedia&#8221;, along with the _false_ flag to only pull-back the required node (not it&#8217;s children, for Folder media items).
  4. We check if the media node has any child &#8220;data&#8221; elements &#8211; which contain the data about the image/media.
  5. Then we check if the &#8220;umbracoFile&#8221; property has any data &#8211; if not, then there is no point displaying an image.
  6. There are extra conditions for the &#8220;height&#8221; and &#8220;width&#8221; properties &#8211; these are optional.

Personally, I add an &#8220;altText&#8221; property to the Image media-type &#8230; and use that in the XSLT &#8211; again this is optional, but strongly recommended!

I can see how this &#8220;super safe&#8221; approach is overkill &#8211; especially compared with a single line of XSLT &#8230; but from my experience, it&#8217;s better to be safe than sorry &#8211; especially when dealing with user data-input &#8211; your assumptions and expectations of how users will use the system aren&#8217;t always correct!

**<span style="text-decoration:underline;">Update:</span>** OK, I agree the extra &#8220;if&#8221; statements are overkill&#8230; so here&#8217;s a condensed version &#8211; assuming that the &#8220;umbracoHeight&#8221; and &#8220;umbracoWidth&#8221; properties are always there&#8230;

<pre class="brush: xml; title: ; notranslate" title="">&lt;xsl:template match="/"&gt;
	&lt;xsl:variable name="mediaId" select="number($currentPage/data[@alias='mediaId'])" /&gt;
	&lt;xsl:if test="$mediaId &gt; 0"&gt;
		&lt;xsl:variable name="mediaNode" select="umbraco.library:GetMedia($mediaId, 0)" /&gt;
		&lt;xsl:if test="count($mediaNode/data) &gt; 0 and string($mediaNode/data[@alias='umbracoFile']) != ''"&gt;
			&lt;img src="{$mediaNode/data[@alias='umbracoFile']}" alt="[image]" height="{$mediaNode/data[@alias='umbracoHeight']}" width="{$mediaNode/data[@alias='umbracoWidth']}" /&gt;
		&lt;/xsl:if&gt;
	&lt;/xsl:if&gt;
&lt;/xsl:template&gt;</pre>