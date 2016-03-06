title: "WordPress: post.php is blank after publishing"
link: "http://leekelleher.com/2008/02/13/wordpress-postphp-is-blank-after-publishing/"
pubDate: "Wed, 13 Feb 2008 19:31:53 +0000"
guid: "http://leekelleher.wordpress.com/?p=6"
dc_creator: "leekelleher"
wp_post_id: 252
wp_post_date: "2008-02-13 19:31:53"
wp_post_date_gmt: "2008-02-13 19:31:53"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "wordpress-postphp-is-blank-after-publishing"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1054583959'
categories:
  - blog: "blog"
  - bookninja: "bookninja"
  - google: "google"
  - php: "php"
  - ping: "ping"
  - trouble-shooting: "trouble-shooting"
  - wordpress-2: "WordPress"

---

# WordPress: "post.php" is blank after publishing

Whilst I was helping out <a href="http://www.bookninja.com/">Bookninja</a> earlier this week, I came across a strange problem in WordPress.

Every time we tried to publish a new blog post (or page), there would be a pause, then the page would go blank.
(This was on the "<code>post.php</code>" page)

I spent a long time trying to figure out what the issue was... even longer googling it!

Several pages into the Google results, I found the answer! Thank you <a href="http://www.seandeasy.com/">Sean Deasy</a>!
<a href="http://www.seandeasy.com/wordpress-posting-issue-solved-at-last/">Wordpress posting issue solved at last :)</a>

It seems that Bookninja's hijacker added a rogue URL to the notification/ping-list (http://www.newsisfree.com/RPCCloud), who knows why it was put there, but it was definitely the cause of the blank "<code>post.php</code>" issue!

After removing the rogue URL, everything was working fine again!