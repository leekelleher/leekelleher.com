---
id: 286
title: How to prevent hotlinking to FLV files? (Flash Videos)
date: 2008-07-02T13:07:22+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=49
permalink: /2008/07/02/how-to-prevent-hotlinking-to-flv-files-flash-videos/
dsq_thread_id:
  - 1054584193
tags:
  - flash
  - flv
  - hotlinking
  - htaccess
  - HTTP_REFERER
---
My friend Shane (from [DVD House of Horrors](http://dvdhouseofhorror.net/)) is having a hard time trying to stop other websites hotlinking to his horror movie clips.  The site is running Joomla on a Linux server, so he&#8217;s been down the usual .htaccess routes to [prevent remote hotlinking](http://forum.powweb.com/showthread.php?t=79757).

However the problem with FLV files is that they aren&#8217;t requested directly by the web-browser, but rather the Flash video player (a .swf file).  This causes a problem for the .htacces rules as there is no [HTTP_REFERER](http://en.wikipedia.org/wiki/HTTP_referer) value to restrict against.

This is causing an unnecessary hit on Shane&#8217;s bandwidth costs&#8230; so he&#8217;s desperately looking for an answer.

Any ideas are most welcome. Thanks.

<span style="text-decoration:underline;"><strong>Update:</strong></span> It seems that a lot of people have this same problem&#8230; so I suggested to Shane to turn the situation around by using the hotlinking as an advert for his site.  [All his video clips are watermarked with the DVD House of Horrors logo.](http://dvdhouseofhorror.net/blog/?p=78)

I&#8217;m curious why the developers of the Flash video players don&#8217;t send a HTTP_REFERER value, but then again that&#8217;s also easy to spoof.