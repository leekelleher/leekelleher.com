---
id: 274
title: Upgrade WordPress Shell Script
date: 2008-04-23T11:41:30+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=28
permalink: /2008/04/23/upgrade-wordpress-shell-script/
dsq_thread_id:
  - 1108279514
categories:
  - blog
tags:
  - code
  - Shell Script
  - short code
  - source
  - Unix
  - Upgrade
  - WordPress
---
Now that I&#8217;ve found my new best friend ([the sourcecode short-code](http://blog.leekelleher.com/2008/04/23/posting-source-code-on-wordpresscom/)), I want to put it to good use now.

Here&#8217;s a quick Unix shell script that I use to upgrade my [WordPress](http://wordpress.org/) installations:

```python
#!/bin/sh
# WordPress Update Script
# Written by: Lee Kelleher
# Released: 2008-04-23
# Email: lee # at # vertino # dot # net
# Released under GPL

echo "Downloading current version of WordPress..."
wget http://wordpress.org/latest.tar.gz

echo "Uncompressing WordPress archive..."
tar -zxvf latest.tar.gz

echo "Removing downloaded archive..."
rm -f latest.tar.gz

echo "WordPress Upgrade complete!"
```

It&#8217;s a very very basic script&#8230; if you&#8217;re looking for something more user-friendly, (with back-ups), then either take a read of the [WordPress Codex article](http://codex.wordpress.org/Installing_WordPress#Step_1:_Download_and_Extract), or download [a better Unix shell script](http://krell.cellsandbytes.net/2007/02/22/wordpress-upgrade-script/).

My version suits my purposes nicely.