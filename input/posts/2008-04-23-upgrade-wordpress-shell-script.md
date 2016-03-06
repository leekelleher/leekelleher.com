title: "Upgrade WordPress Shell Script"
link: "http://leekelleher.com/2008/04/23/upgrade-wordpress-shell-script/"
pubDate: "Wed, 23 Apr 2008 11:41:30 +0000"
guid: "http://leekelleher.wordpress.com/?p=28"
dc_creator: "leekelleher"
wp_post_id: 274
wp_post_date: "2008-04-23 11:41:30"
wp_post_date_gmt: "2008-04-23 11:41:30"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "upgrade-wordpress-shell-script"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0_edit_last: 2
dsq_thread_id: 1108279514
categories:
  - blog: "blog"
  - code: "code"
  - shell-script: "Shell Script"
  - short-code: "short code"
  - source: "source"
  - unix: "Unix"
  - upgrade: "Upgrade"
  - wordpress-2: "WordPress"

---

# Upgrade WordPress Shell Script

Now that I've found my new best friend (<a href="http://blog.leekelleher.com/2008/04/23/posting-source-code-on-wordpresscom/">the sourcecode short-code</a>), I want to put it to good use now.

Here's a quick Unix shell script that I use to upgrade my <a href="http://wordpress.org/">WordPress</a> installations:

[sourcecode language='python']#!/bin/sh
# Wordpress Update Script
# Written by: Lee Kelleher
# Released: 2008-04-23
# Email: lee # at # vertino # dot # net
# Released under GPL

echo "Downloading current version of Wordpress..."
wget http://wordpress.org/latest.tar.gz

echo "Uncompressing WordPress archive..."
tar -zxvf latest.tar.gz

echo "Removing downloaded archive..."
rm -f latest.tar.gz

echo "WordPress Upgrade complete!"[/sourcecode]

It's a very very basic script... if you're looking for something more user-friendly, (with back-ups), then either take a read of the <a href="http://codex.wordpress.org/Installing_WordPress#Step_1:_Download_and_Extract">WordPress Codex article</a>, or download <a href="http://krell.cellsandbytes.net/2007/02/22/wordpress-upgrade-script/">a better Unix shell script</a>.

My version suits my purposes nicely.