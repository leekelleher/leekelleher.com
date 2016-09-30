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

```xml
<node id="1066" parentID="-1" level="1" nodeName="Home" ... nodeTypeAlias="Homepage" path="-1,1066">
	<data alias="bodyText"><![CDATA[<p>Welcome to my homepage.</p>]]></data>
</node>
```

```xml
<Homepage id="1066" parentID="-1" level="1" ... nodeName="Home" path="-1,1066" isDoc="">
    <bodyText><![CDATA[<p>Welcome to my homepage.</p>]]></bodyText>
</Homepage>
```

Obviously for long-time Umbraco developers this will require a small shift in mindset, as we are way too familiar with writing XPath queries like;

```
$currentPage/descendant-or-self::node[string(data[@alias='umbracoNaviHide'])  != '1']
```

&#8230; which will need to be rewritten to;

```
$currentPage/descendant-or-self::*[umbracoNaviHide != '1']
```

Not that it's a difficult thing to change/update, but I can see a lot of questions being asked on the [Our Umbraco forum](http://our.umbraco.org/).

Since there are a lot of existing Umbraco packages that use the current, (soon to be legacy) XML schema, it might be worthwhile making use of XSLT itself to convert the new back to the old &#8211; in order to keep the existing XSLT templates working.  Here's a quick example:

```xml
<!-- ROOT element -->
<xsl:template match="root">
	<xsl:element name="root">
		<xsl:apply-templates select="child::*" />
	</xsl:element>
</xsl:template>

<!-- NODE elements -->
<xsl:template match="*[count(@isDoc) = 1]">
	<xsl:element name="node">
		<xsl:attribute name="nodeTypeAlias">
			<xsl:value-of select="local-name()"/>
		</xsl:attribute>
		<xsl:copy-of select="@@*" />
		<xsl:apply-templates select="child::*" />
	</xsl:element>
</xsl:template>

<!-- DATA elements -->
<xsl:template match="*[count(parent::*) > 0 and count(@isDoc) = 0]">
	<xsl:element name="data">
		<xsl:attribute name="alias">
			<xsl:value-of select="local-name()"/>
		</xsl:attribute>
		<xsl:copy-of select="text()" />
	</xsl:element>
</xsl:template>
```

These templates would be used to transform the new schema/structure back to the old legacy schema/structure, like so:

```xml
<xsl:variable name="legacyFragment">
	<xsl:apply-templates select="$currentPage/ancestor::root" />
</xsl:variable>
<xsl:variable name="legacyRoot" select="msxml:node-set($legacyFragment)/root" />
<xsl:variable name="legacyCurrentPage" select="$legacyRoot/descendant-or-self::node[@id = $currentPage/@id]" />
```

Since you can't modify a variable's value in XSLT, it would be a case of replacing all the &#8220;$currentPage&#8221; references with &#8220;$legacyCurrentPage&#8221; (or whatever you decided to call it). But in all honesty, if you are going to start modifying your XSLT, then it would be better to refactor the XPath statements to use the new schema!

Personally, I'm looking forward to using the new XML schema in Umbraco 4.1, the structure makes more sense from a semantic perspective &#8211; and I am told it will have performance gains on the XSLT processor.