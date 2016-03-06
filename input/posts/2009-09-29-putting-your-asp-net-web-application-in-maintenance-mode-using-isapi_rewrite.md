title: "Putting your ASP.NET Web Application in Maintenance Mode (using ISAPI_Rewrite)"
link: "http://leekelleher.com/2009/09/29/putting-your-asp-net-web-application-in-maintenance-mode-using-isapi_rewrite/"
pubDate: "Tue, 29 Sep 2009 13:22:14 +0000"
guid: "http://blog.leekelleher.com/?p=177"
dc_creator: "leekelleher"
wp_post_id: 304
wp_post_date: "2009-09-29 13:22:14"
wp_post_date_gmt: "2009-09-29 13:22:14"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "putting-your-asp-net-web-application-in-maintenance-mode-using-isapi_rewrite"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0_edit_last: 2
superawesome: false
_oembed_f698b38f90faf2a8a061fbce21211b4d: {{unknown}}
_oembed_feabe3d820c9da07d43ad680abc945cc: {{unknown}}
_oembed_283869538079af558c825c0045504d07: {{unknown}}
_tweet-4466099083: &lt;blockquote class="twitter-tweet" width="550"&gt;&lt;p&gt;i wish there was a way to use app_offline but still view from certain ip's&lt;/p&gt;&amp;mdash; Aaron Powell (@slace) &lt;a href="https://twitter.com/slace/status/4466099083" data-datetime="2009-09-29T08:53:10+00:00"&gt;September 29, 2009&lt;/a&gt;&lt;/blockquote&gt;
&lt;script src="//platform.twitter.com/widgets.js" charset="utf-8"&gt;&lt;/script&gt;
_oembed_d0974883dccc8c72b0480d5ede02d083: &lt;blockquote class="twitter-tweet" width="500"&gt;&lt;p&gt;i wish there was a way to use app_offline but still view from certain ip&amp;#39;s&lt;/p&gt;&amp;mdash; Aaron Powell (@slace) &lt;a href="https://twitter.com/slace/status/4466099083"&gt;September 29, 2009&lt;/a&gt;&lt;/blockquote&gt;&lt;script async src="//platform.twitter.com/widgets.js" charset="utf-8"&gt;&lt;/script&gt;
_oembed_b3416bcc12203d63ea4cae73572f3a25: &lt;blockquote class="twitter-tweet" width="550"&gt;&lt;p&gt;i wish there was a way to use app_offline but still view from certain ip's&lt;/p&gt;&amp;mdash; Aaron Powell (@slace) &lt;a href="https://twitter.com/slace/status/4466099083" data-datetime="2009-09-29T08:53:10+00:00"&gt;September 29, 2009&lt;/a&gt;&lt;/blockquote&gt;&lt;script async src="//platform.twitter.com/widgets.js" charset="utf-8"&gt;&lt;/script&gt;
dsq_thread_id: 1053718910
_oembed_time_d0974883dccc8c72b0480d5ede02d083: 1411589096
_syntaxhighlighter_encoded: 1
categories:
  - app_offline: "App_Offline"
  - aspnet: "ASP.NET"
  - blog: "blog"
  - htaccess: "htaccess"
  - isapi_rewrite: "ISAPI_Rewrite"
  - maintenance: "Maintenance"
  - offline: "Offline"
  - redirect: "Redirect"
  - umbraco: "Umbraco"
  - web-application: "web-application"

---

# Putting your ASP.NET Web Application in Maintenance Mode (using ISAPI_Rewrite)

Prompted by <a href="http://twitter.com/slace/status/4466099083">@slace's tweet</a>:

http://twitter.com/#!/slace/status/4466099083

I <a href="http://twitter.com/leekelleher/status/4466197573">replied</a> with a suggestion that we've used in the past. <a href="http://twitter.com/slace/status/4466254905">Aaron said I should blog about it...</a> so here I am (again)!

A while ago we needed to do an Umbraco upgrade (from v3 to v4) on a production server - in my opinion it was a pretty major upgrade on a live site, we had done a couple of test upgrades on dev and staging, all was successful.  But since there was various parts of the site that we need to regression test, I felt it best to take the entire site offline whilst we upgraded.

Usually creating an "<a href="http://weblogs.asp.net/scottgu/archive/2005/10/06/426755.aspx">App_Offline.htm</a>" page in the root of your web app is enough to take it offline.  However that was no good for testing... so what to do?

This is where <a href="http://www.helicontech.com/isapi_rewrite/">ISAPI_Rewrite</a> is your best friend, (or <a href="http://en.wikipedia.org/wiki/Htaccess">.htaccess</a> to be precise).  We needed to configure the site to allow access for us and redirect everyone else to a "Site under maintenance" page.  I found a few examples across the web, but to save you all that hassle, here are the .htaccess rules that we use:

[sourcecode language="xml"]# BEGIN Maintanence Mode
&lt;IfModule mod_rewrite.c&gt;
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_URI} !/offline.html$
RewriteCond %{REMOTE_ADDR} !^82.13.23.230$
RewriteRule ^(.*)$ /offline.html [R=302,L]
&lt;/IfModule&gt;
# END Maintanence Mode[/sourcecode]

What does it do? The first "RewriteCond" rule checks that you are not requesting the "offline.html" page (otherwise you would end up in a constant loop!) The second "RewriteCond" checks the IP address of the visitor - in my case it was "82.13.23.230" (remember to escape the dots). If those two rules aren't satisfied, then the "RewriteRule" is used, redirecting the visitor to the "offline.html" page.

As always, I am open to any suggestions or improvements!