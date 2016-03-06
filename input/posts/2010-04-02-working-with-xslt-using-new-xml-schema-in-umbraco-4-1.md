title: "Working with XSLT using new XML schema in Umbraco 4.1"
link: "http://leekelleher.com/2010/04/02/working-with-xslt-using-new-xml-schema-in-umbraco-4-1/"
pubDate: "Fri, 02 Apr 2010 13:31:13 +0000"
guid: "http://blog.leekelleher.com/?p=197"
dc_creator: "leekelleher"
wp_post_id: 197
wp_post_date: "2010-04-02 13:31:13"
wp_post_date_gmt: "2010-04-02 13:31:13"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "working-with-xslt-using-new-xml-schema-in-umbraco-4-1"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1053341498'
categories:
  - blog: "blog"
  - legacy: "Legacy"
  - transform: "Transform"
  - umbraco: "Umbraco"
  - xml: "xml"
  - xml-schema: "XML Schema"
  - xslt-2: "XSLT"

---

# Working with XSLT using new XML schema in Umbraco 4.1

Most of the Umbraco community are aware that the XML schema in the upcoming Umbraco 4.1 release has changed.

Instead of each document being a node element, the element name is the node-type alias, same with property values; they no longer use data elements with alias attributes. Here is a quick example, comparing the old/legacy with the new:

[sourcecode language="xml"]&lt;node id=&quot;1066&quot; parentID=&quot;-1&quot; level=&quot;1&quot; nodeName=&quot;Home&quot; ... nodeTypeAlias=&quot;Homepage&quot; path=&quot;-1,1066&quot;&gt;
	&lt;data alias=&quot;bodyText&quot;&gt;&lt;![CDATA[&lt;p&gt;Welcome to my homepage.&lt;/p&gt;]]&gt;&lt;/data&gt;
&lt;/node&gt;[/sourcecode]

[sourcecode language="xml"]&lt;Homepage id=&quot;1066&quot; parentID=&quot;-1&quot; level=&quot;1&quot; ... nodeName=&quot;Home&quot; path=&quot;-1,1066&quot; isDoc=&quot;&quot;&gt;
    &lt;bodyText&gt;&lt;![CDATA[&lt;p&gt;Welcome to my homepage.&lt;/p&gt;]]&gt;&lt;/bodyText&gt;
&lt;/Homepage&gt;[/sourcecode]

Obviously for long-time Umbraco developers this will require a small shift in mindset, as we are way too familiar with writing XPath queries like;

[sourcecode language="text"]$currentPage/descendant-or-self::node[string(data[@alias='umbracoNaviHide'])  != '1'][/sourcecode]

... which will need to be rewritten to;

[sourcecode language="text"]$currentPage/descendant-or-self::*[umbracoNaviHide != '1'][/sourcecode]

Not that it's a difficult thing to change/update, but I can see a lot of questions being asked on the <a href="http://our.umbraco.org/">Our Umbraco forum</a>.

Since there are a lot of existing Umbraco packages that use the current, (soon to be legacy) XML schema, it might be worthwhile making use of XSLT itself to convert the new back to the old - in order to keep the existing XSLT templates working.  Here's a quick example:

[sourcecode language="xml"]&lt;!-- ROOT element --&gt;
&lt;xsl:template match=&quot;root&quot;&gt;
	&lt;xsl:element name=&quot;root&quot;&gt;
		&lt;xsl:apply-templates select=&quot;child::*&quot; /&gt;
	&lt;/xsl:element&gt;
&lt;/xsl:template&gt;

&lt;!-- NODE elements --&gt;
&lt;xsl:template match=&quot;*[count(@isDoc) = 1]&quot;&gt;
	&lt;xsl:element name=&quot;node&quot;&gt;
		&lt;xsl:attribute name=&quot;nodeTypeAlias&quot;&gt;
			&lt;xsl:value-of select=&quot;local-name()&quot;/&gt;
		&lt;/xsl:attribute&gt;
		&lt;xsl:copy-of select=&quot;@*&quot; /&gt;
		&lt;xsl:apply-templates select=&quot;child::*&quot; /&gt;
	&lt;/xsl:element&gt;
&lt;/xsl:template&gt;

&lt;!-- DATA elements --&gt;
&lt;xsl:template match=&quot;*[count(parent::*) &amp;gt; 0 and count(@isDoc) = 0]&quot;&gt;
	&lt;xsl:element name=&quot;data&quot;&gt;
		&lt;xsl:attribute name=&quot;alias&quot;&gt;
			&lt;xsl:value-of select=&quot;local-name()&quot;/&gt;
		&lt;/xsl:attribute&gt;
		&lt;xsl:copy-of select=&quot;text()&quot; /&gt;
	&lt;/xsl:element&gt;
&lt;/xsl:template&gt;[/sourcecode]

These templates would be used to transform the new schema/structure back to the old legacy schema/structure, like so:

[sourcecode language="xml"]&lt;xsl:variable name=&quot;legacyFragment&quot;&gt;
	&lt;xsl:apply-templates select=&quot;$currentPage/ancestor::root&quot; /&gt;
&lt;/xsl:variable&gt;
&lt;xsl:variable name=&quot;legacyRoot&quot; select=&quot;msxml:node-set($legacyFragment)/root&quot; /&gt;
&lt;xsl:variable name=&quot;legacyCurrentPage&quot; select=&quot;$legacyRoot/descendant-or-self::node[@id = $currentPage/@id]&quot; /&gt;[/sourcecode]

Since you can't modify a variable's value in XSLT, it would be a case of replacing all the "$currentPage" references with "$legacyCurrentPage" (or whatever you decided to call it).   But in all honesty, if you are going to start modifying your XSLT, then it would be better to refactor the XPath statements to use the new schema!

Personally, I'm looking forward to using the new XML schema in Umbraco 4.1, the structure makes more sense from a semantic perspective - and I am told it will have performance gains on the XSLT processor.