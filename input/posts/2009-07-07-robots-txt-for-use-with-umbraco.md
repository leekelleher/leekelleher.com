title: "Robots.txt for use with Umbraco"
link: "http://leekelleher.com/2009/07/07/robots-txt-for-use-with-umbraco/"
pubDate: "Tue, 07 Jul 2009 16:10:30 +0000"
guid: "http://blog.leekelleher.com/?p=132"
dc_creator: "leekelleher"
wp_post_id: 299
wp_post_date: "2009-07-07 16:10:30"
wp_post_date_gmt: "2009-07-07 16:10:30"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "robots-txt-for-use-with-umbraco"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0_edit_last: 2
dsq_thread_id: 1054584002
categories:
  - blog: "blog"
  - robots-txt: "Robots.txt"
  - seo-2: "SEO"
  - umbraco: "Umbraco"

---

# Robots.txt for use with Umbraco

<em>I originally posted this over at the Our Umbraco community wiki. [<a href="http://our.umbraco.org/wiki/reference/umbraco-best-practices/robotstxt-for-use-with-umbraco">Robots.txt for use with Umbraco</a>] I am only posting it on my blog as a cross-reference. The Our Umbraco wiki version will evolve with the community's experience and knowledge.</em>

The Robots Exclusion Protocol has been around for many years, yet there are a lot of web-developers who are unaware of the reasons for having a robots.txt file in the root of their websites.

There have been many rumours around whether the bigger search engine crwalers (i.e. Googlebot) consider your website amateurish if you didn't have a robots.txt - and if handled badly, could lead to your site being invisible on SERPs.

If you are happy for a crawler to crawl/index all of your website's content, then you can use the following:

[sourcecode language='shell']User-agent: *
Disallow:[/sourcecode]

However, when using Umbraco to power my websites, it is preferable to define which folders are accessible by the crawler. Personally, I would not like to see the contents of my <code>/umbraco/</code> folder to be returned in Google's SERPs.

Here is an example of the robots.txt that I have used on several Umbraco-powered websites.

[sourcecode language='shell']# robots.txt for Umbraco
User-agent: *
Disallow: /aspnet_client/
Disallow: /bin/
Disallow: /config/
Disallow: /css/
Disallow: /data/
Disallow: /scripts/
Disallow: /umbraco/
Disallow: /umbraco_client/
Disallow: /usercontrols/
Disallow: /xslt/[/sourcecode]

From my perspective, there is no reason for a search engine crawler to be crawling/indexing files from any of the above folders - you may have a different perspective, to which you can amend your robots.txt accordingly.

For more information about the robots.txt standard, please refer to the official website: <a href="http://www.robotstxt.org/robotstxt.html">http://www.robotstxt.org/robotstxt.html</a>