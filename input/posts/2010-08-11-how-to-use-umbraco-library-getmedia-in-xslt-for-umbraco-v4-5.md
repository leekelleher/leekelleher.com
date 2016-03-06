title: "How to use umbraco.library GetMedia in XSLT for Umbraco v4.5"
link: "http://leekelleher.com/2010/08/11/how-to-use-umbraco-library-getmedia-in-xslt-for-umbraco-v4-5/"
pubDate: "Wed, 11 Aug 2010 15:42:39 +0000"
guid: "http://blog.leekelleher.com/?p=210"
dc_creator: "leekelleher"
wp_post_id: 310
wp_post_date: "2010-08-11 15:42:39"
wp_post_date_gmt: "2010-08-11 15:42:39"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "how-to-use-umbraco-library-getmedia-in-xslt-for-umbraco-v4-5"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
superawesome: 'false'
jabber_published: '1281541363'
email_notification: '1281541365'
dsq_thread_id: '1054182353'
categories:
  - blog: "blog"
  - code: "code"
  - getmedia: "GetMedia"
  - snippet: "snippet"
  - umbraco: "Umbraco"
  - xslt-2: "XSLT"

---

# How to use umbraco.library GetMedia in XSLT for Umbraco v4.5

This is a quick follow-up on my previous blog post: "<a href="http://blog.leekelleher.com/2009/11/30/how-to-use-umbraco-library-getmedia-in-xslt/">How to use umbraco.library GetMedia in XSLT</a>".  At the request of fellow <a href="http://our.umbraco.org/events/umbraco-south-west-uk-user-meetup-(july-2010)">Umbraco South-West UK</a> developer, <a href="http://our.umbraco.org/member/5585">Dan</a>, that I should update the code snippets for the new XML schema in Umbraco v4.5+

First a quick notice; if you are using v4.5.0, then please <a href="http://umbraco.codeplex.com/releases/view/48015">upgrade to v4.5.1</a>, as there was <a href="http://umbraco.codeplex.com/workitem/28147">a tiny bug in GetMedia</a> that caused great confusion and headaches - you have been advised!

Without further ado, the updated XSLT snippet that you came here for...

[sourcecode language="xml"]&lt;xsl:template match=&quot;/&quot;&gt;
	&lt;xsl:variable name=&quot;mediaId&quot; select=&quot;number($currentPage/mediaId)&quot; /&gt;
	&lt;xsl:if test=&quot;$mediaId &gt; 0&quot;&gt;
		&lt;xsl:variable name=&quot;mediaNode&quot; select=&quot;umbraco.library:GetMedia($mediaId, 0)&quot; /&gt;
		&lt;xsl:if test=&quot;$mediaNode/umbracoFile&quot;&gt;
			&lt;img src=&quot;{$mediaNode/umbracoFile}&quot; alt=&quot;[image]&quot; height=&quot;{umbracoHeight}&quot; width=&quot;{umbracoWidth}&quot; /&gt;
		&lt;/xsl:if&gt;
	&lt;/xsl:if&gt;
&lt;/xsl:template&gt;[/sourcecode]

Any questions? <a href="http://our.umbraco.org/">Come join us over at Our Umbraco...</a> we are a friendly bunch!