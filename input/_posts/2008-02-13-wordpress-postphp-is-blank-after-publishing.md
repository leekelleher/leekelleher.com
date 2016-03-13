---
id: 252
title: 'WordPress: &#8220;post.php&#8221; is blank after publishing'
date: 2008-02-13T19:31:53+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=6
permalink: /2008/02/13/wordpress-postphp-is-blank-after-publishing/
dsq_thread_id:
  - 1054583959
categories:
  - blog
tags:
  - bookninja
  - google
  - php
  - ping
  - trouble-shooting
  - WordPress
---
Whilst I was helping out [Bookninja](http://www.bookninja.com/) earlier this week, I came across a strange problem in WordPress.

Every time we tried to publish a new blog post (or page), there would be a pause, then the page would go blank.
  
(This was on the &#8220;`post.php`&#8221; page)

I spent a long time trying to figure out what the issue was&#8230; even longer googling it!

Several pages into the Google results, I found the answer! Thank you [Sean Deasy](http://www.seandeasy.com/)!
  
[WordPress posting issue solved at last :)](http://www.seandeasy.com/wordpress-posting-issue-solved-at-last/)

It seems that Bookninja&#8217;s hijacker added a rogue URL to the notification/ping-list (http://www.newsisfree.com/RPCCloud), who knows why it was put there, but it was definitely the cause of the blank &#8220;`post.php`&#8221; issue!

After removing the rogue URL, everything was working fine again!