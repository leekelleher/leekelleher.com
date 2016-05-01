---
id: 284
title: Last.fm Web Services
date: 2008-07-02T01:29:27+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=42
permalink: /2008/07/02/lastfm-web-services/
dsq_thread_id:
  - 1284321109
categories:
  - blog
tags:
  - .NET
  - api
  - 'C#'
  - flickr
  - last.fm
  - open source
---
[<img class="alignright" src="http://cdn.last.fm/depth/advertising/lastfm/badge_red_rev.gif" alt="Last.fm" width="150" height="60" />](http://www.last.fm/) Last weekend, [the good folk at Last.fm revealed version 2.0 of their public API](http://blog.last.fm/2008/06/27/developers-developers-developers):

> The new API introduces a user authentication protocol which for the first time allows applications to create user sessions, bringing both read and write services to web apps, desktop apps and mobile devices.
> 
> Take our new tagging API’s. Developers can both pull and apply tags to music content from any application on any platform now. The same goes for sharing – developers can build Last.fm sharing support into any app.
> 
> There are also new search, playlist, event and geo API’s being rolled out today, with lots more stuff planned in the coming weeks and months.

At first glance, I noticed that there were a couple of key features (to me) were missing &#8211; [namely the &#8220;Get Similar Tracks&#8221;](http://www.last.fm/group/Last.fm+Web+Services/forum/21604/_/426605) &#8211; the Last.fm staff reminded me that _they are planning to roll out more features in the coming weeks and months!_ OK, okay&#8230; I&#8217;ll be more patient!

The new API feels and works like the Flickr API; with very similar convensions of the method/call names and authentication/token process.  This isn&#8217;t a bad thing &#8211; just that I feel they should be leading the crowd, rather than following it.  (The [beta version](http://beta.last.fm/home) of the upcoming Last.fm site [is being critisised for being a &#8220;facebook clone&#8221;](http://www.last.fm/group/Last.fm+Beta/forum/95114/_/427221)!)

Regardless of my negative comments, I&#8217;m actually a fan of the [new API](http://www.last.fm/api) &#8211; being more structured and scalable.  I&#8217;m considering writing a .NET wrapper library (C#) for it too!  As I&#8217;ve got plans for a small iTunes/Last.fm playlist app, that would require it; (all open-source, of course).

Since the new API follows similar Flickr API convensions, it seems to make sense that I could/should base my Last.fm .NET wrapper on it&#8217;s Flickr counter-part&#8230;. [Flickr.NET API](http://www.wackylabs.net/flickr/flickr-api/).  The library is developed in a decent way &#8211; deserializing XML objects into the appropriate classes.  It feels a lot nicer to develop with, rather than messing around with XPath node selections!

Not sure when I&#8217;ll get the time to develop the library, as my contract work is as busy as ever!! Hopefully things will calm down in a couple of weeks!