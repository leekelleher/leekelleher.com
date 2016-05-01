---
id: 282
title: How to best embed a WMV video clip?
date: 2008-06-09T14:56:11+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=38
permalink: /2008/06/09/how-to-best-embed-a-wmv-video-clip/
superawesome:
  - 'false'
dsq_thread_id:
  - 1053754050
categories:
  - blog
tags:
  - browser
  - code
  - embed
  - HTML
  - platform
  - video
  - wmv
---
I hate to admit it, but I&#8217;m stuck&#8230; I&#8217;m trying to figure out how to best embed a WMV video clip in a web-page, so that it works cross-browser (and cross-platform).

Even after all my years of web-development, I&#8217;m still confused to which browser supports which tag &#8230; nested `<embed>` tags in `<object>` tags &#8230; _it gets messy!_

I&#8217;m as equally confused with the Class ID attribute: &#8220;`CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6`&#8221; &#8211; surely that can&#8217;t be the same across all browsers/platforms?!

[A List Apart article](http://www.alistapart.com/articles/byebyeembed/) discusses dropping the `<embed>` tag. Which sounds like a good idea to me. The HTML looks _so_ much better&#8230; MIME types all the way baby!!

<pre class="brush: xml; title: ; notranslate" title="">&lt;object type="video/x-ms-wmv" data="/media/video.wmv" width="320" height="260"&gt;
	&lt;param name="src" value="/media/video.wmv" /&gt;
	&lt;param name="autostart" value="0" /&gt;
	&lt;param name="controller" value="1" /&gt;
&lt;/object&gt;
</pre>

I tested this on Firefox 2.0 and IE7 on Vista, and IE6 and Safari on XP &#8211; all fine, so far so good! When I ask my client to test the page on their Mac &#8230; **it&#8217;s no good!** The videos just wouldn&#8217;t load! _Hmphf!_

So does anyone know of a simple way of embedding a WMV video clip that works cross-browser/platform? Please let me know, I&#8217;d be very a happy developer!

Otherwise, I&#8217;m so close to using the beastly code that comes from the &#8220;[Embedded Media HTML Generator](http://cit.ucsf.edu/embedmedia/step1.php)&#8221; &#8230; _help me please!_ ;-)