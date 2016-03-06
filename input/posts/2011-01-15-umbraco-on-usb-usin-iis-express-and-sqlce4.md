title: "Running Umbraco from a USB drive"
link: "http://leekelleher.com/2011/01/15/umbraco-on-usb-usin-iis-express-and-sqlce4/"
pubDate: "Sat, 15 Jan 2011 01:41:43 +0000"
guid: "http://blog.leekelleher.com/?p=215"
dc_creator: "leekelleher"
wp_post_id: 311
wp_post_date: "2011-01-15 01:41:43"
wp_post_date_gmt: "2011-01-15 01:41:43"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "umbraco-on-usb-usin-iis-express-and-sqlce4"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0superawesome: false
_edit_last: 2
jabber_published: 1295055703
email_notification: 1295055704
_oembed_b6cdcc029c6613310d4754f04c433006: {{unknown}}
_oembed_47ccf36f79b39e2c91bb9486b2977bd3: {{unknown}}
_oembed_8ffe12756e6ff11b387d0412292bf216: {{unknown}}
_tweet-26060538500878337: &lt;blockquote class="twitter-tweet" width="550"&gt;&lt;p&gt;&lt;a href="https://twitter.com/search/%2523umbraco"&gt;#umbraco&lt;/a&gt; 4.6.1 + IIS Express 7.5 + SQL CE 4 + USB key = Success!&lt;/p&gt;&amp;mdash; Lee Kelleher (@leekelleher) &lt;a href="https://twitter.com/leekelleher/status/26060538500878337" data-datetime="2011-01-14T23:38:11+00:00"&gt;January 14, 2011&lt;/a&gt;&lt;/blockquote&gt;
&lt;script src="//platform.twitter.com/widgets.js" charset="utf-8"&gt;&lt;/script&gt;
_oembed_d703d4901a3f7a148a910ff796a3d9bd: &lt;blockquote class="twitter-tweet" width="500"&gt;&lt;p&gt;&lt;a href="https://twitter.com/hashtag/umbraco?src=hash"&gt;#umbraco&lt;/a&gt; 4.6.1 + IIS Express 7.5 + SQL CE 4 + USB key = Success!&lt;/p&gt;&amp;mdash; Lee Kelleher (@leekelleher) &lt;a href="https://twitter.com/leekelleher/status/26060538500878337"&gt;January 14, 2011&lt;/a&gt;&lt;/blockquote&gt;&lt;script async src="//platform.twitter.com/widgets.js" charset="utf-8"&gt;&lt;/script&gt;
_oembed_b5d3cfb1206ddd7d4897956eb01ad02d: &lt;blockquote class="twitter-tweet" width="550"&gt;&lt;p&gt;&lt;a href="https://twitter.com/search/%23umbraco"&gt;#umbraco&lt;/a&gt; 4.6.1 + IIS Express 7.5 + SQL CE 4 + USB key = Success!&lt;/p&gt;&amp;mdash; Lee Kelleher (@leekelleher) &lt;a href="https://twitter.com/leekelleher/status/26060538500878337" data-datetime="2011-01-14T23:38:11+00:00"&gt;January 14, 2011&lt;/a&gt;&lt;/blockquote&gt;&lt;script async src="//platform.twitter.com/widgets.js" charset="utf-8"&gt;&lt;/script&gt;
dsq_thread_id: 1053293608
_syntaxhighlighter_encoded: 1
_oembed_time_d703d4901a3f7a148a910ff796a3d9bd: 1411588630
categories:
  - net: ".NET"
  - blog: "blog"
  - iis: "IIS"
  - iis-express: "IIS Express"
  - sql: "sql"
  - sql-ce-4: "SQL CE 4"
  - umbraco: "Umbraco"
  - usb-2: "USB"
  - webmatrix: "WebMatrix"

---

# Running Umbraco from a USB drive

With the release of <a href="http://umbraco.codeplex.com/releases/view/59025">Umbraco 4.6 (Juno)</a>, users now have the option of using Microsoft's new embedded database engine, <a href="http://www.microsoft.com/downloads/en/details.aspx?FamilyID=0d2357ea-324f-46fd-88fc-7364c80e4fdb&amp;displaylang=en">SQL CE 4</a>.  This means that you don't need to depend on using a database server (such as SQL Server [Express] or MySQL), you can run Umbraco exclusively from the file-system!

Also recently released is <a href="http://www.microsoft.com/web/gallery/install.aspx?appid=iisexpress">IIS Express 7.5</a>, (another Microsoft web technology, as part of their <a href="http://www.microsoft.com/web/webmatrix/">WebMatrix</a> framework), which offers a lightweight version of IIS - aimed at developers as a replacement for the Cassini web-server.  One of the major features of IIS Express are that it can be launched straight from disk - it does not need to be registered/configured on the operating-system/machine.

Now, this got me thinking... Would it be possible to run Umbraco from a USB drive? Well, guess what?

http://twitter.com/leekelleher/status/26060538500878337

Best of all its very very easy to do... here's how:
<ul>
	<li>Download and install IIS Express 7.5 and SQL CE 4 - the quickest and easiest way is to install <a href="http://www.microsoft.com/web/">WebMatrix</a>.</li>
	<li>Download <a href="http://umbraco.codeplex.com/releases/view/59025#DownloadId=197075">Umbraco 4.6.1</a> (latest version at the time of writing) and also the "<a href="http://umbraco.codeplex.com/releases/view/59025#DownloadId=197313">SQLCE4Umbraco.dll</a>" assembly.</li>
	<li>Copy the following to your USB drive:
<ul>
	<li>Extract the Umbraco zip file, rename the "build" folder to something else - like "wwwroot", then copy that to the USB.</li>
	<li>Copy over the "SQLCE4Umbraco.dll" into the "wwwroot\bin" directory.</li>
	<li>Copy the "IIS Express" directory (typically found at "C:\Program Files (x86)\IIS Express") to the USB.</li>
	<li>Copy the SQL CE 4 binaries (typically found at "C:\Program Files (x86)\Microsoft SQL Server Compact Edition\v4.0\Private") - also copy the "amd64" and "x86" sub-directories - to the "wwwroot\bin" on the USB drive.</li>
</ul>
</li>
	<li>Once everything is in place, you should have 2 root directories, "IIS Express" and "wwwroot".</li>
	<li>Open up a command prompt, run the following command:</li>
</ul>
[sourcecode language="powershell"]&quot;E:\IIS Express\iisexpress.exe&quot; /path:E:\wwwroot /port:8080[/sourcecode]
<ul>
	<li>Open a new web-browser window, go to "http://localhost:8080".</li>
	<li>If everything went to plan, the command prompt will display an output of all incoming requests.</li>
	<li>Back in the web-browser window, you should be prompted with the Umbraco installer wizard.  If not, something went wrong! :-(</li>
	<li>Remember to used the SQL CE 4 database engine!!! (otherwise it wont be portable)</li>
</ul>
Once I had successfully installed Umbraco, I tried out a few packages; e.g. <a href="http://our.umbraco.org/projects/backoffice-extensions/ucomponents">uComponents</a>, set up an MNTP data-type, which worked as expected! Great!

After that I removed the USB drive; booted up my old laptop (Windows XP SP3) to see if it would still work.  First try it failed! I didn't have .NET 4.0 framework installed.  Once I installed it, re-ran the command prompt - portable Umbraco worked as expected!

One point to raise is that I did notice slower performance of the Umbraco back-office - which doesn't surprise me - since I was using a fairly old USB drive, but still the lag wasn't enough to be overly concerned about.

Personally I see the portability of Umbraco to be very useful for client/customer demos/meetings... for any Umbraco developers who want to showcase their favourite CMS, now there is no excuse not to have a working copy in your pocket!