title: "My WordPress hacked by c99madshell script"
link: "http://leekelleher.com/2008/07/22/my-wordpress-hacked-by-c99madshell-script/"
pubDate: "Tue, 22 Jul 2008 00:35:51 +0000"
guid: "http://leekelleher.wordpress.com/?p=71"
dc_creator: "leekelleher"
wp_post_id: 288
wp_post_date: "2008-07-22 00:35:51"
wp_post_date_gmt: "2008-07-22 00:35:51"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "my-wordpress-hacked-by-c99madshell-script"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1053564204'
categories:
  - blog: "blog"
  - c99madshell: "c99madshell"
  - google: "google"
  - hacked: "Hacked"
  - php: "php"
  - spam: "spam"
  - travelblog: "Travelblog"
  - upgrade: "Upgrade"
  - wordpress-2: "WordPress"

---

# My WordPress hacked by c99madshell script

After all the excitement of last Friday's attempted hack on my <a href="http://www.lee-and-lucy.com/">travelblog</a>, and the subsequent upgrade to <a href="http://wordpress.org/development/2008/07/wordpress-26-tyner/">WordPress 2.6</a> - I thought everything was under control.  <em><strong>Boy was I wrong!</strong></em>

A few hours ago I received a blog comment (from a Mr Andrew Wong) on the <a href="http://www.lee-and-lucy.com/travelblog/2008/07/19/attempted-hack/">travelblog</a>:
<blockquote>http://www.lee-and-lucy.com/travelblog/index.php?p=5817
check this out!!</blockquote>
I clicked the link, my jaw dropped!  It wasn't an attempted hack, it was a very successful hack... I felt violated -in a digital sense.  The threat was far from over!

From looking through the WordPress management screens, I couldn't find a blog post with the ID #5817.  I opened up phpMyAdmin to see if it was in the database; nope, nada, nothing!

I wanted to see the extend of the problem, so I googled "<a href="http://www.google.co.uk/search?q=site:lee-and-lucy.com">site:lee-and-lucy.com</a>", and found a "lot" of pages... oh yes, LOTS OF SPAM!

<a href="http://www.google.co.uk/search?q=site:lee-and-lucy.com"><img class="aligncenter size-full wp-image-76" src="http://leekelleher.com/wordpress/wp-content/uploads/2008/07/clipboard01.png" alt="" width="551" height="300" /></a>

To say the least, <a href="http://twitter.com/leekelleher/statuses/864498898">I was furious</a>!  I wanted to; <em>a.</em> resolve this asap; <em>b.</em> find out how this happened; <em>c.</em> cause pain to this would-be hacker!  Obviously, option <em>c.</em> goes against my good karma nature, but they digitally violated my site; sticking spam in places that spam should never go!!! <em><strong>Furious I tell you!</strong></em>

Digging through my WordPress files, I find a PHP script in my theme folder called "<code>simple.php</code>"; it contains a nested "<code>eval(gzinflate(base64_encode()))</code>" string.  Very suspect. I try to manually decrypt the string, (replacing the eval with an echo), but it's nested a few levels deep... so <a href="http://uk3.php.net/manual/en/function.eval.php#59862">I found a snippet of code that would easily decode/decrypt it</a>.

The script turned out to be a modified version of <a href="http://www.derekfountain.org/security_c99madshell.php">c99madshell</a>, specifically focused on <a href="http://wordpress.org/tags/c99madshell">WordPress hi-jacks</a>.  The script tries to inject a small trojan code into one of the core WP files (for me it was the "<code>wp-blog-header.php</code>").  I removed the hi-jacked code, along with the "<code>simple.php</code>" file (from my theme folder) - then re-upgraded to the latest WordPress (2.6) ... just to overwrite any other tampered files.

Hopefully this should be the end of this matter (until next time) ....  I'll be keeping a careful eye on my WordPress installations now on.