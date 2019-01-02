---
id: 288
title: My WordPress hacked by c99madshell script
date: 2008-07-22T00:35:51+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=71
permalink: /2008/07/22/my-wordpress-hacked-by-c99madshell-script/
dsq_thread_id:
  - 1053564204
tags:
  - c99madshell
  - google
  - Hacked
  - php
  - spam
  - Travelblog
  - Upgrade
  - WordPress
---
After all the excitement of last Friday&#8217;s attempted hack on my [travelblog](http://www.lee-and-lucy.com/), and the subsequent upgrade to [WordPress 2.6](http://wordpress.org/development/2008/07/wordpress-26-tyner/) &#8211; I thought everything was under control.  _**Boy was I wrong!**_

A few hours ago I received a blog comment (from a Mr Andrew Wong) on the [travelblog](http://www.lee-and-lucy.com/travelblog/2008/07/19/attempted-hack/):

> http://www.lee-and-lucy.com/travelblog/index.php?p=5817
  
> check this out!!

I clicked the link, my jaw dropped!  It wasn&#8217;t an attempted hack, it was a very successful hack&#8230; I felt violated -in a digital sense.  The threat was far from over!

From looking through the WordPress management screens, I couldn&#8217;t find a blog post with the ID #5817.  I opened up phpMyAdmin to see if it was in the database; nope, nada, nothing!

I wanted to see the extend of the problem, so I googled &#8220;[site:lee-and-lucy.com](http://www.google.co.uk/search?q=site:lee-and-lucy.com)&#8220;, and found a &#8220;lot&#8221; of pages&#8230; oh yes, LOTS OF SPAM!

[<img class="aligncenter size-full wp-image-76" src="http://leekelleher.com/wordpress/wp-content/uploads/2008/07/clipboard01.png" alt="" width="551" height="300" />](http://www.google.co.uk/search?q=site:lee-and-lucy.com)

To say the least, [I was furious](http://twitter.com/leekelleher/statuses/864498898)!  I wanted to; _a._ resolve this asap; _b._ find out how this happened; _c._ cause pain to this would-be hacker!  Obviously, option _c._ goes against my good karma nature, but they digitally violated my site; sticking spam in places that spam should never go!!! _**Furious I tell you!**_

Digging through my WordPress files, I find a PHP script in my theme folder called &#8220;`simple.php`&#8220;; it contains a nested &#8220;`eval(gzinflate(base64_encode()))`&#8221; string.  Very suspect. I try to manually decrypt the string, (replacing the eval with an echo), but it&#8217;s nested a few levels deep&#8230; so [I found a snippet of code that would easily decode/decrypt it](http://uk3.php.net/manual/en/function.eval.php#59862).

The script turned out to be a modified version of [c99madshell](http://www.derekfountain.org/security_c99madshell.php), specifically focused on [WordPress hi-jacks](http://wordpress.org/tags/c99madshell).  The script tries to inject a small trojan code into one of the core WP files (for me it was the &#8220;`wp-blog-header.php`&#8220;).  I removed the hi-jacked code, along with the &#8220;`simple.php`&#8221; file (from my theme folder) &#8211; then re-upgraded to the latest WordPress (2.6) &#8230; just to overwrite any other tampered files.

Hopefully this should be the end of this matter (until next time) &#8230;.  I&#8217;ll be keeping a careful eye on my WordPress installations now on.