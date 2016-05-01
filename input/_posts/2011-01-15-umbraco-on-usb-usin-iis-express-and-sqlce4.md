---
id: 311
title: Running Umbraco from a USB drive
date: 2011-01-15T01:41:43+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=215
permalink: /2011/01/15/umbraco-on-usb-usin-iis-express-and-sqlce4/
superawesome:
  - 'false'
jabber_published:
  - 1295055703
email_notification:
  - 1295055704
dsq_thread_id:
  - 1053293608
categories:
  - blog
tags:
  - .NET
  - IIS
  - IIS Express
  - sql
  - SQL CE 4
  - Umbraco
  - USB
  - WebMatrix
---
With the release of [Umbraco 4.6 (Juno)](http://umbraco.codeplex.com/releases/view/59025), users now have the option of using Microsoft&#8217;s new embedded database engine, [SQL CE 4](http://www.microsoft.com/downloads/en/details.aspx?FamilyID=0d2357ea-324f-46fd-88fc-7364c80e4fdb&displaylang=en). This means that you don&#8217;t need to depend on using a database server (such as SQL Server [Express] or MySQL), you can run Umbraco exclusively from the file-system!

Also recently released is [IIS Express 7.5](http://www.microsoft.com/web/gallery/install.aspx?appid=iisexpress), (another Microsoft web technology, as part of their [WebMatrix](http://www.microsoft.com/web/webmatrix/) framework), which offers a lightweight version of IIS &#8211; aimed at developers as a replacement for the Cassini web-server.  One of the major features of IIS Express are that it can be launched straight from disk &#8211; it does not need to be registered/configured on the operating-system/machine.

Now, this got me thinking&#8230; Would it be possible to run Umbraco from a USB drive? Well, guess what?

<blockquote class="twitter-tweet" width="500">
  <p>
    <a href="https://twitter.com/hashtag/umbraco?src=hash">#umbraco</a> 4.6.1 + IIS Express 7.5 + SQL CE 4 + USB key = Success!
  </p>
  
  <p>
    &mdash; Lee Kelleher (@leekelleher) <a href="https://twitter.com/leekelleher/status/26060538500878337">January 14, 2011</a>
  </p>
</blockquote>



Best of all its very very easy to do&#8230; here&#8217;s how:

  * Download and install IIS Express 7.5 and SQL CE 4 &#8211; the quickest and easiest way is to install [WebMatrix](http://www.microsoft.com/web/).
  * Download [Umbraco 4.6.1](http://umbraco.codeplex.com/releases/view/59025#DownloadId=197075) (latest version at the time of writing) and also the &#8220;[SQLCE4Umbraco.dll](http://umbraco.codeplex.com/releases/view/59025#DownloadId=197313)&#8221; assembly.
  * Copy the following to your USB drive: 
      * Extract the Umbraco zip file, rename the &#8220;build&#8221; folder to something else &#8211; like &#8220;wwwroot&#8221;, then copy that to the USB.
      * Copy over the &#8220;SQLCE4Umbraco.dll&#8221; into the &#8220;wwwroot\bin&#8221; directory.
      * Copy the &#8220;IIS Express&#8221; directory (typically found at &#8220;C:\Program Files (x86)\IIS Express&#8221;) to the USB.
      * Copy the SQL CE 4 binaries (typically found at &#8220;C:\Program Files (x86)\Microsoft SQL Server Compact Edition\v4.0\Private&#8221;) &#8211; also copy the &#8220;amd64&#8221; and &#8220;x86&#8221; sub-directories &#8211; to the &#8220;wwwroot\bin&#8221; on the USB drive.
  * Once everything is in place, you should have 2 root directories, &#8220;IIS Express&#8221; and &#8220;wwwroot&#8221;.
  * Open up a command prompt, run the following command:

<pre class="brush: powershell; title: ; notranslate" title="">"E:\IIS Express\iisexpress.exe" /path:E:\wwwroot /port:8080</pre>

  * Open a new web-browser window, go to &#8220;http://localhost:8080&#8221;.
  * If everything went to plan, the command prompt will display an output of all incoming requests.
  * Back in the web-browser window, you should be prompted with the Umbraco installer wizard.  If not, something went wrong! :-(
  * Remember to used the SQL CE 4 database engine!!! (otherwise it wont be portable)

Once I had successfully installed Umbraco, I tried out a few packages; e.g. [uComponents](http://our.umbraco.org/projects/backoffice-extensions/ucomponents), set up an MNTP data-type, which worked as expected! Great!

After that I removed the USB drive; booted up my old laptop (Windows XP SP3) to see if it would still work.  First try it failed! I didn&#8217;t have .NET 4.0 framework installed.  Once I installed it, re-ran the command prompt &#8211; portable Umbraco worked as expected!

One point to raise is that I did notice slower performance of the Umbraco back-office &#8211; which doesn&#8217;t surprise me &#8211; since I was using a fairly old USB drive, but still the lag wasn&#8217;t enough to be overly concerned about.

Personally I see the portability of Umbraco to be very useful for client/customer demos/meetings&#8230; for any Umbraco developers who want to showcase their favourite CMS, now there is no excuse not to have a working copy in your pocket!