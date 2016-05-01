---
id: 197
title: Working with XSLT using new XML schema in Umbraco 4.1
date: 2010-04-02T13:31:13+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=197
permalink: /2010/04/02/working-with-xslt-using-new-xml-schema-in-umbraco-4-1/
dsq_thread_id:
  - 1053341498
categories:
  - blog
tags:
  - Legacy
  - Transform
  - Umbraco
  - xml
  - XML Schema
  - XSLT
---
Most of the Umbraco community are aware that the XML schema in the upcoming Umbraco 4.1 release has changed.

Instead of each document being a node element, the element name is the node-type alias, same with property values; they no longer use data elements with alias attributes. Here is a quick example, comparing the old/legacy with the new:

<pre class="brush: xml; title: ; notranslate" title="">&lt;node id="1066" parentID="-1" level="1" nodeName="Home" ... nodeTypeAlias="Homepage" path="-1,1066"&gt;
	&lt;data alias="bodyText"&gt;&lt;![CDATA[&lt;p&gt;Welcome to my homepage.&lt;/p&gt;]]&gt;&lt;/data&gt;
&lt;/node&gt;</pre>

<pre class="brush: xml; title: ; notranslate" title="">&lt;Homepage id="1066" parentID="-1" level="1" ... nodeName="Home" path="-1,1066" isDoc=""&gt;
    &lt;bodyText&gt;&lt;![CDATA[&lt;p&gt;Welcome to my homepage.&lt;/p&gt;]]&gt;&lt;/bodyText&gt;
&lt;/Homepage&gt;</pre>

Obviously for long-time Umbraco developers this will require a small shift in mindset, as we are way too familiar with writing XPath queries like;

<pre class="brush: plain; title: ; notranslate" title="">$currentPage/descendant-or-self::node[string(data[@alias='umbracoNaviHide'])  != '1']</pre>

&#8230; which will need to be rewritten to;

<pre class="brush: plain; title: ; notranslate" title="">$currentPage/descendant-or-self::*[umbracoNaviHide != '1']</pre>

Not that it&#8217;s a difficult thing to change/update, but I can see a lot of questions being asked on the [Our Umbraco forum](http://our.umbraco.org/).

Since there are a lot of existing Umbraco packages that use the current, (soon to be legacy) XML schema, it might be worthwhile making use of XSLT itself to convert the new back to the old &#8211; in order to keep the existing XSLT templates working.  Here&#8217;s a quick example:

<pre class="brush: xml; title: ; notranslate" title="">&lt;!-- ROOT element --&gt;
&lt;xsl:template match="root"&gt;
	&lt;xsl:element name="root"&gt;
		&lt;xsl:apply-templates select="child::*" /&gt;
	&lt;/xsl:element&gt;
&lt;/xsl:template&gt;

&lt;!-- NODE elements --&gt;
&lt;xsl:template match="*[count(@isDoc) = 1]"&gt;
	&lt;xsl:element name="node"&gt;
		&lt;xsl:attribute name="nodeTypeAlias"&gt;
			&lt;xsl:value-of select="local-name()"/&gt;
		&lt;/xsl:attribute&gt;
		&lt;xsl:copy-of select="@*" /&gt;
		&lt;xsl:apply-templates select="child::*" /&gt;
	&lt;/xsl:element&gt;
&lt;/xsl:template&gt;

&lt;!-- DATA elements --&gt;
&lt;xsl:template match="*[count(parent::*) &gt; 0 and count(@isDoc) = 0]"&gt;
	&lt;xsl:element name="data"&gt;
		&lt;xsl:attribute name="alias"&gt;
			&lt;xsl:value-of select="local-name()"/&gt;
		&lt;/xsl:attribute&gt;
		&lt;xsl:copy-of select="text()" /&gt;
	&lt;/xsl:element&gt;
&lt;/xsl:template&gt;</pre>

These templates would be used to transform the new schema/structure back to the old legacy schema/structure, like so:

<pre class="brush: xml; title: ; notranslate" title="">&lt;xsl:variable name="legacyFragment"&gt;
	&lt;xsl:apply-templates select="$currentPage/ancestor::root" /&gt;
&lt;/xsl:variable&gt;
&lt;xsl:variable name="legacyRoot" select="msxml:node-set($legacyFragment)/root" /&gt;
&lt;xsl:variable name="legacyCurrentPage" select="$legacyRoot/descendant-or-self::node[@id = $currentPage/@id]" /&gt;</pre>

Since you can&#8217;t modify a variable&#8217;s value in XSLT, it would be a case of replacing all the &#8220;$currentPage&#8221; references with &#8220;$legacyCurrentPage&#8221; (or whatever you decided to call it). But in all honesty, if you are going to start modifying your XSLT, then it would be better to refactor the XPath statements to use the new schema!

Personally, I&#8217;m looking forward to using the new XML schema in Umbraco 4.1, the structure makes more sense from a semantic perspective &#8211; and I am told it will have performance gains on the XSLT processor.