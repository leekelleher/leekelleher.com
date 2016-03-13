---
id: 300
title: Add YouTube Plug-in to Umbraco/TinyMCE
date: 2009-07-16T15:07:25+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=134
permalink: /2009/07/16/add-youtube-plugin-to-umbraco-tinymce/
dsq_thread_id:
  - 1054078020
categories:
  - blog
tags:
  - plug-in
  - TinyMCE
  - Umbraco
  - YouTube
---
**<span style="text-decoration:underline;"><em>Update:</em></span>** _Following on from [Dirk and Ismail&#8217;s comments](#comment-224), I found out that this YouTube plug-in does not work with TinyMCE v3 (which is the default richtext editor in Umbraco v4). This guide is written to works  for Umbraco v3 **only**, (using TinyMCE v2)._

_If you are looking for similar functionality in Umbraco v4, (TinyMCE v3), then all you need to do is enable the &#8216;Flash/media&#8217; button in your Richtext editor data-type and embed the YouTube video like any other Flash movie (swf) &#8211; [more details in my comment below](#comment-225)._

_**<span style="text-decoration:underline;">/End of update.</span>**_

* * *Recently one of my clients wanted the ability to insert YouTube video clips directly into the TinyMCE editor within Umbraco.  My initial thought was to create a macro that would take a YouTube video URL, parse it and display it on the rendered (front-end) page.  

[Tim G has a blog post on how to do this on his Nibble blog](http://www.nibble.be/?p=36), (love the [Surfin&#8217; Bird](http://www.youtube.com/watch?v=fruHQhNe-UM) reference).</p> 

This approached worked fine, but we ran into problems trying to edit the YouTube video URL, along with that, my client had an additional step of selecting a macro, then entering the YouTube URL.

After a little researching, I eventually found a native [YouTube plug-in for TinyMCE](http://sourceforge.net/tracker/index.php?func=detail&aid=1669296&group_id=103281&atid=738747), ([direct link to ZIP download](http://sourceforge.net/tracker/download.php?group_id=103281&atid=738747&file_id=217845&aid=1669296)).

Here is how I integrated in Umbraco:

  1. Extract the contents of the `youtube.zip` archive to your `/umbraco_client/tinymce/plugins/youtube/`
  2. In your `/config/` folder, open the `tinyMceConfig.config` file.
  3. Insert the following lines:
  
    After the last `<command />` entry, add&#8230; <pre class="brush: xml; title: ; notranslate" title="">&lt;command&gt;
	&lt;umbracoAlias&gt;mceYoutube&lt;/umbracoAlias&gt;
	&lt;icon&gt;../umbraco_client/tinymce/plugins/youtube/images/youtube.gif&lt;/icon&gt;
	&lt;tinyMceCommand value="" userInterface="true" frontendCommand="youtube"&gt;youtube&lt;/tinyMceCommand&gt;
&lt;priority&gt;75&lt;/priority&gt;
&lt;/command&gt;</pre>
    
    Then after the last `<plugin />` entry, add&#8230;
    
    <pre class="brush: xml; title: ; notranslate" title="">&lt;plugin loadOnFrontend="false"&gt;youtube&lt;/plugin&gt;</pre>

  4. Once the XML config entries are in place, you will need to restart the  Umbraco application &#8211; the quickest way of doing this is by modifying your `Web.config`, (literally open it, add a space, remove it, hit save).
  5. The YouTube button is now available in Umbraco. **However, it&#8217;s not quite ready yet, there is still one more step!**
  6. In your Umbraco back-end, go to the &#8220;Developer&#8221; section, expand the &#8220;DataTypes&#8221; folder and then select &#8220;Richtext editor&#8221;. In the &#8220;Buttons&#8221; section you should see a YouTube icon. Check the box next to the icon, and you&#8217;re done! If you don&#8217;t see the YouTube icon, then check that the did the config steps above, and/or check that the read permissions are set correctly on your `/umbraco_client/` folder, (re-apply them if needs be).