---
id: 253
title: 'All hail &#8220;The Bookninja Messiah&#8221;!'
date: 2008-02-13T20:50:22+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=7
permalink: /2008/02/13/all-hail-the-bookninja-messiah/
dsq_thread_id:
  - 1054583967
categories:
  - blog
tags:
  - akismet
  - bookninja
  - google
  - messiah
  - pages
  - posts
  - readysteadybook
  - spam
  - sql
  - WordPress
---
Earlier this week I&#8217;d heard that [Bookninja](http://www.bookninja.com/) had been hijacked, they needed some help to get their WordPress back in working order. [Mark](http://www.readysteadybook.com/Contributor.aspx?name=markthwaite) suggested that I offered my services, so I did.

[George](http://www.georgemurray.ca/) explained what the problems since the hijack:

  1. Unable to publish blog posts and pages; (a blank page appeared when he tried to publish)
  2. All the pages had been delete, or disappeared.
  3. Akismet was turned off&#8230; opening the floodgates to lots of unwanted casino and porn comment spam!

Previously, Bookninja was running an earlier version of WordPress &#8211; [one that had a known exploit/vulnerability](http://wordpress.org/development/2006/03/security-202/) &#8211; so George quickly upgraded to the latest version. (This is all beside the point now).

George sorted out the comment spam and got Askimet back up and running.

[The blank page after publishing took a while to figure out, but I got there in the end!](http://leekelleher.wordpress.com/2008/02/13/wordpress-postphp-is-blank-after-publishing/) (It was a rogue URL in the notification/ping-list).

With the mysteriously vanishing pages ([as opposed to posts](http://codex.wordpress.org/Pages#What_is_a_Page.3F)), my initial reaction was that they had been deleted from the database. I was about to break the bad news to George, but I thought I&#8217;d take a quick look at the database to make doubly-sure.

Low-and-behold, I found them! But something weird had happened&#8230; All the WordPress pages had been converted into blog posts! This caused an issue because the permalink structure was using &#8220;`?page_id=`&#8221; querystring &#8211; which meant that all the page links would be broken.

I needed to find a way of bulk converting them back to proper &#8220;pages&#8221;. Good old Google pointed me towards a blog post by [Jesse Caulfield](http://netthink.com/) that had a bit of SQL that would [Convert a Post to Page](http://netthink.com/archives/113).

I adapted the SQL to fit my needs:

> **`UPDATE wp_posts SET post_type = "page" WHERE guid LIKE "%?page_id=%";`**

With that, Bookninja was back to normal&#8230; George has dubbed me &#8220;**[The Bookninja Messiah](http://www.bookninja.com/?p=3737)**&#8220;! [Cue: Monty Python gag]

Now the hunt is on for the hijacker!