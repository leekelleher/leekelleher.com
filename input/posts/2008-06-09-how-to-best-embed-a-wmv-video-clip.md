title: "How to best embed a WMV video clip?"
link: "http://leekelleher.com/2008/06/09/how-to-best-embed-a-wmv-video-clip/"
pubDate: "Mon, 09 Jun 2008 14:56:11 +0000"
guid: "http://leekelleher.wordpress.com/?p=38"
dc_creator: "leekelleher"
wp_post_id: 282
wp_post_date: "2008-06-09 14:56:11"
wp_post_date_gmt: "2008-06-09 14:56:11"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "how-to-best-embed-a-wmv-video-clip"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
superawesome: 'false'
dsq_thread_id: '1053754050'
categories:
  - blog: "blog"
  - browser: "browser"
  - code: "code"
  - embed: "embed"
  - html-2: "HTML"
  - platform: "platform"
  - video: "video"
  - wmv: "wmv"

---

# How to best embed a WMV video clip?

I hate to admit it, but I'm stuck... I'm trying to figure out how to best embed a WMV video clip in a web-page, so that it works cross-browser (and cross-platform).

Even after all my years of web-development, I'm still confused to which browser supports which tag ... nested <code>&lt;embed&gt;</code> tags in <code>&lt;object&gt;</code> tags ... <em>it gets messy!</em>

I'm as equally confused with the Class ID attribute: "<code>CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6</code>" - surely that can't be the same across all browsers/platforms?!

<a href="http://www.alistapart.com/articles/byebyeembed/">A List Apart article</a> discusses dropping the <code>&lt;embed&gt;</code> tag.  Which sounds like a good idea to me.  The HTML looks <em>so</em> much better... MIME types all the way baby!!

[sourcecode language="html"]
&lt;object type=&quot;video/x-ms-wmv&quot; data=&quot;/media/video.wmv&quot; width=&quot;320&quot; height=&quot;260&quot;&gt;
	&lt;param name=&quot;src&quot; value=&quot;/media/video.wmv&quot; /&gt;
	&lt;param name=&quot;autostart&quot; value=&quot;0&quot; /&gt;
	&lt;param name=&quot;controller&quot; value=&quot;1&quot; /&gt;
&lt;/object&gt;
[/sourcecode]

I tested this on Firefox 2.0 and IE7 on Vista, and IE6 and Safari on XP - all fine, so far so good!  When I ask my client to test the page on their Mac ... <strong>it's no good!</strong> The videos just wouldn't load! <em>Hmphf!</em>

So does anyone know of a simple way of embedding a WMV video clip that works cross-browser/platform? Please let me know, I'd be very a happy developer!

Otherwise, I'm so close to using the beastly code that comes from the "<a href="http://cit.ucsf.edu/embedmedia/step1.php">Embedded Media HTML Generator</a>" ... <em>help me please!</em> ;-)