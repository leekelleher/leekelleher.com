---
title: Apologies for RSS mistake
date: 2016-05-26T18:58:37+01:00
layout: post
permalink: /2016/05/apologies-for-rss-mistake/
tags:
  - RSS
  - Feedly
---

For readers of my blog via the RSS feed, I have to apologise to you. When I relaunched my blog at the start of May, I was using [Wyam's built-in RSS module](http://wyam.io/modules/rss) - which initially appeared to work well. But I noticed an issue with my configuration after I'd corrected a typo on a recent post.

It turns out the `<guid>` value for each post had been created as a unique identifier based off a hash of the post's contents. This meant that in correcting a typo, a different GUID would be created, thus treated as a new post by your RSS reader.

I'm using [Feedly](http://feedly.com/) as my reader - _and yes, I'm subscribed to my own blog feed, (mostly to verify that it works)_ - so I noticed this straight away, but it took me a few tweaks to figure out it the GUID was the issue.

To resolve this, I've switched the GUID to use the blog post's URL (permalink). Of course in doing this, the other recent posts (that had dynamically generated GUIDs) will reappear in your RSS reader stream... again, I apologise!
