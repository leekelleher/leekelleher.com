title: "Add YouTube Plug-in to Umbraco/TinyMCE"
link: "http://leekelleher.com/2009/07/16/add-youtube-plugin-to-umbraco-tinymce/"
pubDate: "Thu, 16 Jul 2009 15:07:25 +0000"
guid: "http://blog.leekelleher.com/?p=134"
dc_creator: "leekelleher"
wp_post_id: 300
wp_post_date: "2009-07-16 15:07:25"
wp_post_date_gmt: "2009-07-16 15:07:25"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "add-youtube-plugin-to-umbraco-tinymce"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1054078020'
categories:
  - blog: "blog"
  - plug-in: "plug-in"
  - tinymce: "TinyMCE"
  - umbraco: "Umbraco"
  - youtube-2: "YouTube"

---

# Add YouTube Plug-in to Umbraco/TinyMCE

<strong><span style="text-decoration:underline;"><em>Update:</em></span></strong><em> Following on from <a href="#comment-224">Dirk and Ismail's comments</a>, I found out that this YouTube plug-in does not work with TinyMCE v3 (which is the default richtext editor in Umbraco v4). This guide is written to works  for Umbraco v3 <strong>only</strong>, (using TinyMCE v2).</em>

<em>If you are looking for similar functionality in Umbraco v4, (TinyMCE v3), then all you need to do is enable the 'Flash/media' button in your Richtext editor data-type and embed the YouTube video like any other Flash movie (swf) - <a href="#comment-225">more details in my comment below</a>.</em>

<em><strong><span style="text-decoration:underline;">/End of update.</span></strong></em>

<hr />
Recently one of my clients wanted the ability to insert YouTube video clips directly into the TinyMCE editor within Umbraco.  My initial thought was to create a macro that would take a YouTube video URL, parse it and display it on the rendered (front-end) page.  <a href="http://www.nibble.be/?p=36">Tim G has a blog post on how to do this on his Nibble blog</a>, (love the <a href="http://www.youtube.com/watch?v=fruHQhNe-UM">Surfin' Bird</a> reference).

This approached worked fine, but we ran into problems trying to edit the YouTube video URL, along with that, my client had an additional step of selecting a macro, then entering the YouTube URL.

After a little researching, I eventually found a native <a href="http://sourceforge.net/tracker/index.php?func=detail&amp;aid=1669296&amp;group_id=103281&amp;atid=738747">YouTube plug-in for TinyMCE</a>, (<a href="http://sourceforge.net/tracker/download.php?group_id=103281&amp;atid=738747&amp;file_id=217845&amp;aid=1669296">direct link to ZIP download</a>).

Here is how I integrated in Umbraco:
<ol>
	<li>Extract the contents of the <code>youtube.zip</code> archive to your <code>/umbraco_client/tinymce/plugins/youtube/</code></li>
	<li>In your <code>/config/</code> folder, open the <code>tinyMceConfig.config</code> file.</li>
	<li>Insert the following lines:
After the last <code>&lt;command /&gt;</code> entry, add... [sourcecode language='xml']<command>
	<umbracoAlias>mceYoutube</umbracoAlias>
	<icon>../umbraco_client/tinymce/plugins/youtube/images/youtube.gif</icon>
	<tinyMceCommand value="" userInterface="true" frontendCommand="youtube">youtube</tinyMceCommand>
<priority>75</priority>
</command>[/sourcecode]

Then after the last <code>&lt;plugin /&gt;</code> entry, add...

[sourcecode language='xml']
<plugin loadOnFrontend="false">youtube</plugin>[/sourcecode]</li>
	<li>Once the XML config entries are in place, you will need to restart the  Umbraco application - the quickest way of doing this is by modifying your <code>Web.config</code>, (literally open it, add a space, remove it, hit save).</li>
	<li>The YouTube button is now available in Umbraco. <strong>However, it's not quite ready yet, there is still one more step!</strong></li>
	<li>In your Umbraco back-end, go to the "Developer" section, expand the "DataTypes" folder and then select "Richtext editor". In the "Buttons" section you should see a YouTube icon. Check the box next to the icon, and you're done! If you don't see the YouTube icon, then check that the did the config steps above, and/or check that the read permissions are set correctly on your <code>/umbraco_client/</code> folder, (re-apply them if needs be).</li>
</ol>