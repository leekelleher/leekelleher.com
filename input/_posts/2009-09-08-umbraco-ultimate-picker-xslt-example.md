---
id: 302
title: 'Umbraco: Ultimate Picker XSLT Example'
date: 2009-09-08T22:38:14+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=157
permalink: /2009/09/08/umbraco-ultimate-picker-xslt-example/
dsq_thread_id:
  - 1053346907
categories:
  - blog
tags:
  - Data Types
  - Template
  - Tutorial
  - Ultimate Picker
  - Umbraco
  - XSLT
---
Chatting with Dan (my partner-in-code at [Bodenko](http://bodenko.com/)) about the Ultimate Picker data-type in Umbraco, we realised that we couldn&#8217;t find any examples of how to use the data in XSLT. So obviously needing an excuse to write-up a new blog post, here we go.

If you need a quick overview about the Ultimate Picker data-type, see [Tim Geyssens&#8217; blog post](http://www.nibble.be/?p=38).

For my example, using a default Umbraco install (with Runway), we will create a new data-type using the Ultimate Picker, (let&#8217;s call it &#8220;_Runway Textpage Picker_&#8220;), we select the &#8216;**Database datatype**&#8216; to be &#8220;Nvarchar&#8221;; the &#8216;**Type**&#8216; as a &#8220;List Box&#8221;; The &#8216;**Parent nodeid**&#8216; is &#8220;1048&#8221; and the &#8216;**Document Alias**&#8216; filter is &#8220;RunwayTextpage&#8221; &#8211; we also tick the &#8216;**Show grandchildren**&#8216; checkbox.

<div id="attachment_158" style="width: 160px" class="wp-caption aligncenter">
  <a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-datatype.png"><img class="size-thumbnail wp-image-158 " title="UltimatePicker-DataType" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-datatype.png?w=150" alt="Ultimate Picker Data Type settings" width="150" height="112" /></a>
  
  <p class="wp-caption-text">
    Ultimate Picker Data Type settings
  </p>
</div>

Next, we will assign the new &#8220;_Runway Textpage Picker_&#8221; data-type to a property of the Runway Textpage, we will call it &#8220;_Related Content_&#8220;. For more information about working with document types, please refer to the our.umbraco.org wiki page, ([Working with document types](http://our.umbraco.org/wiki/how-tos/working-with-document-types)).

<div id="attachment_160" style="width: 160px" class="wp-caption aligncenter">
  <a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-doctype.png"><img class="size-thumbnail wp-image-160 " title="UltimatePicker-DocType" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-doctype.png?w=150" alt="Adding Ultimate Picker to a Document Type" width="150" height="112" /></a>
  
  <p class="wp-caption-text">
    Adding Ultimate Picker to a Document Type
  </p>
</div>

Once the document-type is saved, we move on to the &#8216;**Content**&#8216; section. Select any of the Runway Textpages.  You should now see the &#8216;_Related Content_&#8216; property panel, containing a list of all the other Runway Textpages.  To select multiple items, hold-down the CTRL (or Command on the Mac) button.  When you have finished, click the &#8216;**Save and publish**&#8216; button.

<div id="attachment_162" style="width: 160px" class="wp-caption aligncenter">
  <a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-relatedcontent.png"><img class="size-thumbnail wp-image-162" title="UltimatePicker-RelatedContent" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-relatedcontent.png?w=150" alt="Selecting related content" width="150" height="112" /></a>
  
  <p class="wp-caption-text">
    Selecting related content
  </p>
</div>

For the next part we get to the real meat of this blog post&#8230; the XSLT!

<div id="attachment_163" style="width: 160px" class="wp-caption aligncenter">
  <a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-createmacro.png"><img class="size-thumbnail wp-image-163 " title="UltimatePicker-CreateMacro" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-createmacro.png?w=150" alt="Create a new XSLT" width="150" height="112" /></a>
  
  <p class="wp-caption-text">
    Create a new XSLT
  </p>
</div>

Create a new XSLT called &#8220;_RelatedContent_&#8221; (without the .xslt extension), keep it &#8216;Clean&#8217; and tick the &#8216;**Create Macro**&#8216; checkbox.  Next a quick short-cut for you; copy-n-paste the following XSLT into the main editor window.

<div id="attachment_164" style="width: 160px" class="wp-caption aligncenter">
  <a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-xslt.png"><img class="size-thumbnail wp-image-164" title="UltimatePicker-XSLT" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-xslt.png?w=150" alt="Copy-n-paste the XSLT" width="150" height="112" /></a>
  
  <p class="wp-caption-text">
    Copy-n-paste the XSLT
  </p>
</div>

<pre class="brush: xml; title: ; notranslate" title="">&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;!DOCTYPE xsl:stylesheet &#91; &lt;!ENTITY nbsp "&#xA0;"&gt; ]&gt;
&lt;xsl:stylesheet
	version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:msxml="urn:schemas-microsoft-com:xslt"
	xmlns:umbraco.library="urn:umbraco.library"
	exclude-result-prefixes="msxml umbraco.library"&gt;
	&lt;xsl:output method="xml" omit-xml-declaration="yes"/&gt;

	&lt;xsl:param name="currentPage"/&gt;

	&lt;xsl:template match="/"&gt;
		&lt;xsl:variable name="preNodes"&gt;
					&lt;xsl:variable name="relatedContent" select="$currentPage/data&#91;@alias='RelatedContent'&#93;" /&gt;
					&lt;xsl:variable name="nodeIds" select="umbraco.library:Split($relatedContent, ',')" /&gt;
					&lt;xsl:for-each select="$nodeIds/value"&gt;
						&lt;xsl:copy-of select="umbraco.library:GetXmlNodeById(.)"/&gt;
					&lt;/xsl:for-each&gt;
		&lt;/xsl:variable&gt;
		&lt;xsl:variable name="nodes" select="msxml:node-set($preNodes)/node" /&gt;
		&lt;xsl:if test="count($nodes) &gt; 0"&gt;
&lt;div class="related-content"&gt;
&lt;h3&gt;Related Content&lt;/h3&gt;
&lt;ul&gt;
					&lt;xsl:for-each select="$nodes"&gt;
	&lt;li&gt;
							&lt;a href="{umbraco.library:NiceUrl(@id)}"&gt;
								&lt;xsl:value-of select="@nodeName" /&gt;
							&lt;/a&gt;&lt;/li&gt;
&lt;/xsl:for-each&gt;&lt;/ul&gt;
&lt;/div&gt;
&lt;/xsl:if&gt;
	&lt;/xsl:template&gt;

&lt;/xsl:stylesheet&gt;</pre>

Here&#8217;s a quick explanation of what is happening in the XSLT.  We are provided with a list of comma-separated nodeIds from the Ultimate Picker, which we need to parse/split &#8211; then pull back the XML node data, then we can transform it however we like!

The way we do this is 2-tiered, first we must loop through the comma-separated list, pulling back the XML node for each nodeId, adding it to an XSLT variable.  Doing this will cause the XSLT variable to be a fragmented node-tree, which means that we need to convert the node-tree fragment into a node-set.  (*Note: there are a gazillion ways to skin a cat &#8211; suggestions are welcome &#8211; this method works for me).

Once we have the complete XML node-set, we can transform into whatever HTML we  like.

Now that we are done with the XSLT, we can edit our template in the &#8216;**Settings**&#8216; section. Select the &#8220;_Runway Textpage_&#8221; template. Somewhere after the &#8216;_bodyText_&#8216; property item, click on the &#8216;Insert Macro&#8217; button.  From the &#8216;**Choose a macro**&#8216; drop-down, select the &#8216;_Related Content_&#8216; option &#8211; this will add the macro code to the template.

<div id="attachment_167" style="width: 160px" class="wp-caption aligncenter">
  <a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-template.png"><img class="size-thumbnail wp-image-167" title="UltimatePicker-Template" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-template.png?w=150" alt="Insert the macro into the template" width="150" height="112" /></a>
  
  <p class="wp-caption-text">
    Insert the macro into the template
  </p>
</div>

Save the template and view the front-end page. We can now see the _Related Content_ pages. Tada!

<div id="attachment_168" style="width: 310px" class="wp-caption aligncenter">
  <a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-frontend.png"><img class="size-medium wp-image-168" title="UltimatePicker-FrontEnd" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-frontend.png?w=300" alt="The end result! Related Content" width="300" height="225" /></a>
  
  <p class="wp-caption-text">
    The end result! Related Content
  </p>
</div>