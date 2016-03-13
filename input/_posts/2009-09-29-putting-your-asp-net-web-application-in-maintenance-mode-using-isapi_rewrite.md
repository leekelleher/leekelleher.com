---
id: 304
title: Putting your ASP.NET Web Application in Maintenance Mode (using ISAPI_Rewrite)
date: 2009-09-29T13:22:14+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=177
permalink: /2009/09/29/putting-your-asp-net-web-application-in-maintenance-mode-using-isapi_rewrite/
superawesome:
  - 'false'
dsq_thread_id:
  - 1053718910
categories:
  - blog
tags:
  - App_Offline
  - ASP.NET
  - htaccess
  - ISAPI_Rewrite
  - Maintenance
  - Offline
  - Redirect
  - Umbraco
  - web-application
---
Prompted by [@slace&#8217;s tweet](http://twitter.com/slace/status/4466099083):

<blockquote class="twitter-tweet" width="500">
  <p>
    i wish there was a way to use app_offline but still view from certain ip's
  </p>
  
  <p>
    &mdash; Aaron Powell (@slace) <a href="https://twitter.com/slace/status/4466099083">September 29, 2009</a>
  </p>
</blockquote>



I [replied](http://twitter.com/leekelleher/status/4466197573) with a suggestion that we&#8217;ve used in the past. [Aaron said I should blog about it&#8230;](http://twitter.com/slace/status/4466254905) so here I am (again)!

A while ago we needed to do an Umbraco upgrade (from v3 to v4) on a production server &#8211; in my opinion it was a pretty major upgrade on a live site, we had done a couple of test upgrades on dev and staging, all was successful.  But since there was various parts of the site that we need to regression test, I felt it best to take the entire site offline whilst we upgraded.

Usually creating an &#8220;[App_Offline.htm](http://weblogs.asp.net/scottgu/archive/2005/10/06/426755.aspx)&#8221; page in the root of your web app is enough to take it offline.  However that was no good for testing&#8230; so what to do?

This is where [ISAPI_Rewrite](http://www.helicontech.com/isapi_rewrite/) is your best friend, (or [.htaccess](http://en.wikipedia.org/wiki/Htaccess) to be precise).  We needed to configure the site to allow access for us and redirect everyone else to a &#8220;Site under maintenance&#8221; page.  I found a few examples across the web, but to save you all that hassle, here are the .htaccess rules that we use:

<pre class="brush: xml; title: ; notranslate" title=""># BEGIN Maintanence Mode
&lt;IfModule mod_rewrite.c&gt;
RewriteEngine On
RewriteBase /
RewriteCond %{REQUEST_URI} !/offline.html$
RewriteCond %{REMOTE_ADDR} !^82.13.23.230$
RewriteRule ^(.*)$ /offline.html [R=302,L]
&lt;/IfModule&gt;
# END Maintanence Mode</pre>

What does it do? The first &#8220;RewriteCond&#8221; rule checks that you are not requesting the &#8220;offline.html&#8221; page (otherwise you would end up in a constant loop!) The second &#8220;RewriteCond&#8221; checks the IP address of the visitor &#8211; in my case it was &#8220;82.13.23.230&#8221; (remember to escape the dots). If those two rules aren&#8217;t satisfied, then the &#8220;RewriteRule&#8221; is used, redirecting the visitor to the &#8220;offline.html&#8221; page.

As always, I am open to any suggestions or improvements!