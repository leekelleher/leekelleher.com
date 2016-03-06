title: "Last.fm Web Services"
link: "http://leekelleher.com/2008/07/02/lastfm-web-services/"
pubDate: "Wed, 02 Jul 2008 01:29:27 +0000"
guid: "http://leekelleher.wordpress.com/?p=42"
dc_creator: "leekelleher"
wp_post_id: 284
wp_post_date: "2008-07-02 01:29:27"
wp_post_date_gmt: "2008-07-02 01:29:27"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "lastfm-web-services"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1284321109'
categories:
  - net: ".NET"
  - api: "api"
  - blog: "blog"
  - c: "C#"
  - flickr: "flickr"
  - lastfm-6: "last.fm"
  - open-source: "open source"

---

# Last.fm Web Services

<a href="http://www.last.fm/"><img class="alignright" src="http://cdn.last.fm/depth/advertising/lastfm/badge_red_rev.gif" alt="Last.fm" width="150" height="60" /></a> Last weekend, <a href="http://blog.last.fm/2008/06/27/developers-developers-developers">the good folk at Last.fm revealed version 2.0 of their public API</a>:
<blockquote>The new API introduces a user authentication protocol which for the first time allows applications to create user sessions, bringing both read and write services to web apps, desktop apps and mobile devices.

Take our new tagging API’s. Developers can both pull and apply tags to music content from any application on any platform now. The same goes for sharing – developers can build Last.fm sharing support into any app.

There are also new search, playlist, event and geo API’s being rolled out today, with lots more stuff planned in the coming weeks and months.</blockquote>
At first glance, I noticed that there were a couple of key features (to me) were missing - <a href="http://www.last.fm/group/Last.fm+Web+Services/forum/21604/_/426605">namely the "Get Similar Tracks"</a> - the Last.fm staff reminded me that <em>they are planning to roll out more features in the coming weeks and months!</em> OK, okay... I'll be more patient!

The new API feels and works like the Flickr API; with very similar convensions of the method/call names and authentication/token process.  This isn't a bad thing - just that I feel they should be leading the crowd, rather than following it.  (The <a href="http://beta.last.fm/home">beta version</a> of the upcoming Last.fm site <a href="http://www.last.fm/group/Last.fm+Beta/forum/95114/_/427221">is being critisised for being a "facebook clone"</a>!)

Regardless of my negative comments, I'm actually a fan of the <a href="http://www.last.fm/api">new API</a> - being more structured and scalable.  I'm considering writing a .NET wrapper library (C#) for it too!  As I've got plans for a small iTunes/Last.fm playlist app, that would require it; (all open-source, of course).

Since the new API follows similar Flickr API convensions, it seems to make sense that I could/should base my Last.fm .NET wrapper on it's Flickr counter-part.... <a href="http://www.wackylabs.net/flickr/flickr-api/">Flickr.NET API</a>.  The library is developed in a decent way - deserializing XML objects into the appropriate classes.  It feels a lot nicer to develop with, rather than messing around with XPath node selections!

Not sure when I'll get the time to develop the library, as my contract work is as busy as ever!! Hopefully things will calm down in a couple of weeks!