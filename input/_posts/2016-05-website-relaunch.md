---
title: Website Relaunch
date: 2016-05-01T19:56:00+00:00
layout: post
permalink: /2016/05/website-relaunch/
tags:
  - static-site generators
  - Wyam
---

Wow, I finally pressed the button and my rebuilt website has been launched. I have to admit, I was quite nervous about making the actual switch from WordPress to a static HTML site. I kept thinking "_What have I missed?_", but throw caution to the wind, it's my own website - if anything breaks, **I'll just fix it**.

It feels like I've wanted to move away from having a dynamically-generated website for the longest time. I'd been looking at various tools to help me "go static" - from Assemble to Jekyll, most of the static-site generators have their pros &amp; cons, my main concern was my comfort zone.  Just to say, I have built websites using Assemble and Jekyll, but in those cases, I found myself struggling from an extensibility perspective - if I needed my own plug-ins, I'd need to develop with Ruby or Node.js - I mean, I could, but it's out my comfort-zone.

About a year ago, I heard about a new static-site generator called [Wyam](http://wyam.io), it was open-source and written in .NET, and looked well documented! I couldn't wait to play! Unfortunately, between my work and Umbraco-community commitments, I struggled to make the time for it.  That was until at the start of this year, I told myself to stop making excuses and get on with it!

So I started to rebuild my website with [Wyam](http://wyam.io). After an initial learning curve of the key concepts, I was flying - I even started to contribute modules back to the Wyam core, (the [minifications modules](http://wyam.io/modules/minifyhtml) - if anyone is interested?) I had most of my website/blog rebuilt within a day or so. (Deciding to go "[Back to basics](/2016/03/back-to-basics/)" helped speed things along much faster.)

Now I bet you're wondering what took me so long between starting and relaunching my website? It turns out to be all those little things - reformatting of line code snippets, redirection rules (`.htaccess`), Disqus commenting, contact form, etc.  To be honest, I probably could have relaunched a few weeks ago, but I'd re-prioritised working on one of my Umbraco packages ([Ditto v0.9.0-beta](https://github.com/leekelleher/umbraco-ditto/releases/tag/0.9.0-beta) - again, if anyone is interested?).

So here we are... website relaunched - CSS naked, but HTML semantically enriched.  Let me know what you think in the comments.
