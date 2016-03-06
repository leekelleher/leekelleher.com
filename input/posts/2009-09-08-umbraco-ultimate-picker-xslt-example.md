title: "Umbraco: Ultimate Picker XSLT Example"
link: "http://leekelleher.com/2009/09/08/umbraco-ultimate-picker-xslt-example/"
pubDate: "Tue, 08 Sep 2009 22:38:14 +0000"
guid: "http://blog.leekelleher.com/?p=157"
dc_creator: "leekelleher"
wp_post_id: 302
wp_post_date: "2009-09-08 22:38:14"
wp_post_date_gmt: "2009-09-08 22:38:14"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "umbraco-ultimate-picker-xslt-example"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1053346907'
categories:
  - blog: "blog"
  - data-types: "Data Types"
  - template: "Template"
  - tutorial: "Tutorial"
  - ultimate-picker: "Ultimate Picker"
  - umbraco: "Umbraco"
  - xslt-2: "XSLT"

---

# Umbraco: Ultimate Picker XSLT Example

Chatting with Dan (my partner-in-code at <a href="http://bodenko.com/">Bodenko</a>) about the Ultimate Picker data-type in Umbraco, we realised that we couldn't find any examples of how to use the data in XSLT.  So obviously needing an excuse to write-up a new blog post, here we go.

If you need a quick overview about the Ultimate Picker data-type, see <a href="http://www.nibble.be/?p=38">Tim Geyssens' blog post</a>.

For my example, using a default Umbraco install (with Runway), we will create a new data-type using the Ultimate Picker, (let's call it "<em>Runway Textpage Picker</em>"), we select the '<strong>Database datatype</strong>' to be "Nvarchar"; the '<strong>Type</strong>' as a "List Box"; The '<strong>Parent nodeid</strong>' is "1048" and the '<strong>Document Alias</strong>' filter is "RunwayTextpage" - we also tick the '<strong>Show grandchildren</strong>' checkbox.

[caption id="attachment_158" align="aligncenter" width="150" caption="Ultimate Picker Data Type settings"]<a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-datatype.png"><img class="size-thumbnail wp-image-158 " title="UltimatePicker-DataType" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-datatype.png?w=150" alt="Ultimate Picker Data Type settings" width="150" height="112" /></a>[/caption]

Next, we will assign the new "<em>Runway Textpage Picker</em>" data-type to a property of the Runway Textpage, we will call it "<em>Related Content</em>". For more information about working with document types, please refer to the our.umbraco.org wiki page, (<a href="http://our.umbraco.org/wiki/how-tos/working-with-document-types">Working with document types</a>).

[caption id="attachment_160" align="aligncenter" width="150" caption="Adding Ultimate Picker to a Document Type"]<a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-doctype.png"><img class="size-thumbnail wp-image-160 " title="UltimatePicker-DocType" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-doctype.png?w=150" alt="Adding Ultimate Picker to a Document Type" width="150" height="112" /></a>[/caption]

Once the document-type is saved, we move on to the '<strong>Content</strong>' section. Select any of the Runway Textpages.  You should now see the '<em>Related Content</em>' property panel, containing a list of all the other Runway Textpages.  To select multiple items, hold-down the CTRL (or Command on the Mac) button.  When you have finished, click the '<strong>Save and publish</strong>' button.

[caption id="attachment_162" align="aligncenter" width="150" caption="Selecting related content"]<a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-relatedcontent.png"><img class="size-thumbnail wp-image-162" title="UltimatePicker-RelatedContent" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-relatedcontent.png?w=150" alt="Selecting related content" width="150" height="112" /></a>[/caption]

For the next part we get to the real meat of this blog post... the XSLT!

[caption id="attachment_163" align="aligncenter" width="150" caption="Create a new XSLT"]<a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-createmacro.png"><img class="size-thumbnail wp-image-163 " title="UltimatePicker-CreateMacro" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-createmacro.png?w=150" alt="Create a new XSLT" width="150" height="112" /></a>[/caption]

Create a new XSLT called "<em>RelatedContent</em>" (without the .xslt extension), keep it 'Clean' and tick the '<strong>Create Macro</strong>' checkbox.  Next a quick short-cut for you; copy-n-paste the following XSLT into the main editor window.

[caption id="attachment_164" align="aligncenter" width="150" caption="Copy-n-paste the XSLT"]<a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-xslt.png"><img class="size-thumbnail wp-image-164" title="UltimatePicker-XSLT" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-xslt.png?w=150" alt="Copy-n-paste the XSLT" width="150" height="112" /></a>[/caption]

[sourcecode language='xml']<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE xsl:stylesheet [ <!ENTITY nbsp "&#xA0;"> ]>
<xsl:stylesheet
	version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:msxml="urn:schemas-microsoft-com:xslt"
	xmlns:umbraco.library="urn:umbraco.library"
	exclude-result-prefixes="msxml umbraco.library">
	<xsl:output method="xml" omit-xml-declaration="yes"/>

	<xsl:param name="currentPage"/>

	<xsl:template match="/">
		<xsl:variable name="preNodes">
					<xsl:variable name="relatedContent" select="$currentPage/data[@alias='RelatedContent']" />
					<xsl:variable name="nodeIds" select="umbraco.library:Split($relatedContent, ',')" />
					<xsl:for-each select="$nodeIds/value">
						<xsl:copy-of select="umbraco.library:GetXmlNodeById(.)"/>
					</xsl:for-each>
		</xsl:variable>
		<xsl:variable name="nodes" select="msxml:node-set($preNodes)/node" />
		<xsl:if test="count($nodes) > 0">
<div class="related-content">
<h3>Related Content</h3>
<ul>
					<xsl:for-each select="$nodes">
	<li>
							<a href="{umbraco.library:NiceUrl(@id)}">
								<xsl:value-of select="@nodeName" />
							</a></li>
</xsl:for-each></ul>
</div>
</xsl:if>
	</xsl:template>

</xsl:stylesheet>[/sourcecode]

Here's a quick explanation of what is happening in the XSLT.  We are provided with a list of comma-separated nodeIds from the Ultimate Picker, which we need to parse/split - then pull back the XML node data, then we can transform it however we like!

The way we do this is 2-tiered, first we must loop through the comma-separated list, pulling back the XML node for each nodeId, adding it to an XSLT variable.  Doing this will cause the XSLT variable to be a fragmented node-tree, which means that we need to convert the node-tree fragment into a node-set.  (*Note: there are a gazillion ways to skin a cat - suggestions are welcome - this method works for me).

Once we have the complete XML node-set, we can transform into whatever HTML we  like.

Now that we are done with the XSLT, we can edit our template in the '<strong>Settings</strong>' section. Select the "<em>Runway Textpage</em>" template. Somewhere after the '<em>bodyText</em>' property item, click on the 'Insert Macro' button.  From the '<strong>Choose a macro</strong>' drop-down, select the '<em>Related Content</em>' option - this will add the macro code to the template.

[caption id="attachment_167" align="aligncenter" width="150" caption="Insert the macro into the template"]<a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-template.png"><img class="size-thumbnail wp-image-167" title="UltimatePicker-Template" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-template.png?w=150" alt="Insert the macro into the template" width="150" height="112" /></a>[/caption]

Save the template and view the front-end page. We can now see the <em>Related Content</em> pages. Tada!

[caption id="attachment_168" align="aligncenter" width="300" caption="The end result! Related Content"]<a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-frontend.png"><img class="size-medium wp-image-168" title="UltimatePicker-FrontEnd" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/09/ultimatepicker-frontend.png?w=300" alt="The end result! Related Content" width="300" height="225" /></a>[/caption] 