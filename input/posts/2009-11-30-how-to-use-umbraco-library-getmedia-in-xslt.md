title: "How to use umbraco.library GetMedia in XSLT"
link: "http://leekelleher.com/2009/11/30/how-to-use-umbraco-library-getmedia-in-xslt/"
pubDate: "Mon, 30 Nov 2009 14:33:14 +0000"
guid: "http://blog.leekelleher.com/?p=188"
dc_creator: "leekelleher"
wp_post_id: 306
wp_post_date: "2009-11-30 14:33:14"
wp_post_date_gmt: "2009-11-30 14:33:14"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "how-to-use-umbraco-library-getmedia-in-xslt"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1054323322'
categories:
  - blog: "blog"
  - code: "code"
  - getmedia: "GetMedia"
  - snippet: "snippet"
  - umbraco: "Umbraco"
  - xslt-2: "XSLT"

---

# How to use umbraco.library GetMedia in XSLT

From time to time I notice a reoccurring post over at the Our Umbraco forum; how to display an image (from the Media section) in XSLT?

A quick answer can be found on the Our Umbraco wiki for the <a href="http://our.umbraco.org/wiki/reference/umbracolibrary/getmedia">umbraco.library GetMedia</a> method.

For most uses, the last example in the wiki works great.  But I want to show you a "super safe" way of dealing with GetMedia in XSLT.

Where I find a lot of the examples go wrong is that they make the assumption that a media node (XML) is returned from the GetMedia call, e.g.

[sourcecode language="xml"]&lt;xsl:value-of select=&quot;umbraco.library:GetMedia($currentPage/data[@alias='mediaId'], 'false')/data[@alias='umbracoFile']&quot; /&gt;[/sourcecode]

If the 'mediaId' property didn't contain either a numeric value or a valid media node id, then it would return <strong>null</strong> ... meaning that the following "<strong>/data</strong>" would throw an Exception! (Displaying "<em>Error parsing XSLT file</em>" message on the front-end.)  Not what you or your users want to see!

In order to consider any user inputs, like media IDs not being selected, or even a referenced media node is deleted in the back-office, here is the "super safe" approach:

[sourcecode language="xml"]&lt;xsl:template match=&quot;/&quot;&gt;
	&lt;xsl:variable name=&quot;mediaId&quot; select=&quot;number($currentPage/data[@alias='mediaId'])&quot; /&gt;
	&lt;xsl:if test=&quot;$mediaId &amp;gt; 0&quot;&gt;
		&lt;xsl:variable name=&quot;mediaNode&quot; select=&quot;umbraco.library:GetMedia($mediaId, 0)&quot; /&gt;
		&lt;xsl:if test=&quot;count($mediaNode/data) &amp;gt; 0&quot;&gt;
			&lt;xsl:if test=&quot;string($mediaNode/data[@alias='umbracoFile']) != ''&quot;&gt;
				&lt;img src=&quot;{$mediaNode/data[@alias='umbracoFile']}&quot; alt=&quot;[image]&quot;&gt;
					&lt;xsl:if test=&quot;string($mediaNode/data[@alias='umbracoHeight']) != ''&quot;&gt;
						&lt;xsl:attribute name=&quot;height&quot;&gt;
							&lt;xsl:value-of select=&quot;$mediaNode/data[@alias='umbracoHeight']&quot; /&gt;
						&lt;/xsl:attribute&gt;
					&lt;/xsl:if&gt;
					&lt;xsl:if test=&quot;string($mediaNode/data[@alias='umbracoWidth']) != ''&quot;&gt;
						&lt;xsl:attribute name=&quot;width&quot;&gt;
							&lt;xsl:value-of select=&quot;$mediaNode/data[@alias='umbracoWidth']&quot; /&gt;
						&lt;/xsl:attribute&gt;
					&lt;/xsl:if&gt;
				&lt;/img&gt;
			&lt;/xsl:if&gt;
		&lt;/xsl:if&gt;
	&lt;/xsl:if&gt;
&lt;/xsl:template&gt;[/sourcecode]

Here's what happens:
<ol>
	<li>The "mediaId" is pulled from a property of the "currentPage" and cast as a number.  Optionally the "mediaId" could be passed in via a macro parameter, or somewhere else?</li>
	<li>The first condition checks the the "mediaId" is numeric, and greater-than zero.</li>
	<li>The "mediaId" is passed through to "GetMedia", along with the <em>false</em> flag to only pull-back the required node (not it's children, for Folder media items).</li>
	<li>We check if the media node has any child "data" elements - which contain the data about the image/media.</li>
	<li>Then we check if the "umbracoFile" property has any data - if not, then there is no point displaying an image.</li>
	<li>There are extra conditions for the "height" and "width" properties - these are optional.</li>
</ol>
Personally, I add an "altText" property to the Image media-type ... and use that in the XSLT - again this is optional, but strongly recommended!

I can see how this "super safe" approach is overkill - especially compared with a single line of XSLT ... but from my experience, it's better to be safe than sorry - especially when dealing with user data-input - your assumptions and expectations of how users will use the system aren't always correct!

<strong><span style="text-decoration:underline;">Update:</span></strong> OK, I agree the extra "if" statements are overkill... so here's a condensed version - assuming that the "umbracoHeight" and "umbracoWidth" properties are always there...

[sourcecode language="xml"]&lt;xsl:template match=&quot;/&quot;&gt;
	&lt;xsl:variable name=&quot;mediaId&quot; select=&quot;number($currentPage/data[@alias='mediaId'])&quot; /&gt;
	&lt;xsl:if test=&quot;$mediaId &amp;gt; 0&quot;&gt;
		&lt;xsl:variable name=&quot;mediaNode&quot; select=&quot;umbraco.library:GetMedia($mediaId, 0)&quot; /&gt;
		&lt;xsl:if test=&quot;count($mediaNode/data) &amp;gt; 0 and string($mediaNode/data[@alias='umbracoFile']) != ''&quot;&gt;
			&lt;img src=&quot;{$mediaNode/data[@alias='umbracoFile']}&quot; alt=&quot;[image]&quot; height=&quot;{$mediaNode/data[@alias='umbracoHeight']}&quot; width=&quot;{$mediaNode/data[@alias='umbracoWidth']}&quot; /&gt;
		&lt;/xsl:if&gt;
	&lt;/xsl:if&gt;
&lt;/xsl:template&gt;[/sourcecode] 