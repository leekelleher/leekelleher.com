title: "How to prevent hotlinking to FLV files? (Flash Videos)"
link: "http://leekelleher.com/2008/07/02/how-to-prevent-hotlinking-to-flv-files-flash-videos/"
pubDate: "Wed, 02 Jul 2008 13:07:22 +0000"
guid: "http://leekelleher.wordpress.com/?p=49"
dc_creator: "leekelleher"
wp_post_id: 286
wp_post_date: "2008-07-02 13:07:22"
wp_post_date_gmt: "2008-07-02 13:07:22"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "how-to-prevent-hotlinking-to-flv-files-flash-videos"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1054584193'
categories:
  - blog: "blog"
  - flash: "flash"
  - flv: "flv"
  - hotlinking: "hotlinking"
  - htaccess: "htaccess"
  - http_referer: "HTTP_REFERER"

---

# How to prevent hotlinking to FLV files? (Flash Videos)

My friend Shane (from <a href="http://dvdhouseofhorror.net/">DVD House of Horrors</a>) is having a hard time trying to stop other websites hotlinking to his horror movie clips.  The site is running Joomla on a Linux server, so he's been down the usual .htaccess routes to <a href="http://forum.powweb.com/showthread.php?t=79757">prevent remote hotlinking</a>.

However the problem with FLV files is that they aren't requested directly by the web-browser, but rather the Flash video player (a .swf file).  This causes a problem for the .htacces rules as there is no <a href="http://en.wikipedia.org/wiki/HTTP_referer">HTTP_REFERER</a> value to restrict against.

This is causing an unnecessary hit on Shane's bandwidth costs... so he's desperately looking for an answer.

Any ideas are most welcome. Thanks.

<span style="text-decoration:underline;"><strong>Update:</strong></span> It seems that a lot of people have this same problem... so I suggested to Shane to turn the situation around by using the hotlinking as an advert for his site.  <a href="http://dvdhouseofhorror.net/blog/?p=78">All his video clips are watermarked with the DVD House of Horrors logo.</a>

I'm curious why the developers of the Flash video players don't send a HTTP_REFERER value, but then again that's also easy to spoof.