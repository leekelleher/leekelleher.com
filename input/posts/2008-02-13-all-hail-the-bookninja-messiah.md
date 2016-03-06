title: "All hail The Bookninja Messiah!"
link: "http://leekelleher.com/2008/02/13/all-hail-the-bookninja-messiah/"
pubDate: "Wed, 13 Feb 2008 20:50:22 +0000"
guid: "http://leekelleher.wordpress.com/?p=7"
dc_creator: "leekelleher"
wp_post_id: 253
wp_post_date: "2008-02-13 20:50:22"
wp_post_date_gmt: "2008-02-13 20:50:22"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "all-hail-the-bookninja-messiah"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1054583967'
categories:
  - akismet: "akismet"
  - blog: "blog"
  - bookninja: "bookninja"
  - google: "google"
  - messiah: "messiah"
  - pages: "pages"
  - posts: "posts"
  - readysteadybook: "readysteadybook"
  - spam: "spam"
  - sql: "sql"
  - wordpress-2: "WordPress"

---

# All hail "The Bookninja Messiah"!

Earlier this week I'd heard that <a href="http://www.bookninja.com/">Bookninja</a> had been hijacked, they needed some help to get their WordPress back in working order.  <a href="http://www.readysteadybook.com/Contributor.aspx?name=markthwaite">Mark</a> suggested that I offered my services, so I did.

<a href="http://www.georgemurray.ca/">George</a> explained what the problems since the hijack:
<ol>
	<li>Unable to publish blog posts and pages; (a blank page appeared when he tried to publish)</li>
	<li>All the pages had been delete, or disappeared.</li>
	<li>Akismet was turned off... opening the floodgates to lots of unwanted casino and porn comment spam!</li>
</ol>
Previously, Bookninja was running an earlier version of WordPress - <a href="http://wordpress.org/development/2006/03/security-202/">one that had a known exploit/vulnerability</a> - so George quickly upgraded to the latest version. (This is all beside the point now).

George sorted out the comment spam and got Askimet back up and running.

<a href="http://leekelleher.wordpress.com/2008/02/13/wordpress-postphp-is-blank-after-publishing/">The blank page after publishing took a while to figure out, but I got there in the end!</a> (It was a rogue URL in the notification/ping-list).

With the mysteriously vanishing pages (<a href="http://codex.wordpress.org/Pages#What_is_a_Page.3F">as opposed to posts</a>), my initial reaction was that they had been deleted from the database.  I was about to break the bad news to George, but I thought I'd take a quick look at the database to make doubly-sure.

Low-and-behold, I found them! But something weird had happened... All the WordPress pages had been converted into blog posts!  This caused an issue because the permalink structure was using "<code>?page_id=</code>" querystring - which meant that all the page links would be broken.

I needed to find a way of bulk converting them back to proper "pages".  Good old Google pointed me towards a blog post by <a href="http://netthink.com/">Jesse Caulfield</a> that had a bit of SQL that would  <a href="http://netthink.com/archives/113">Convert a Post to Page</a>.

I adapted the SQL to fit my needs:
<blockquote><b><code>UPDATE wp_posts SET post_type = "page" WHERE guid LIKE "%?page_id=%";</code></b></blockquote>
With that, Bookninja was back to normal... George has dubbed me "<b><a href="http://www.bookninja.com/?p=3737">The Bookninja Messiah</a></b>"! [Cue: Monty Python gag]

Now the hunt is on for the hijacker!