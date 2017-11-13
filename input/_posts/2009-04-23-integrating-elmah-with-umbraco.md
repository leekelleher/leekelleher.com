---
id: 296
title: Integrating ELMAH with Umbraco
date: 2009-04-23T21:13:34+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=116
permalink: /2009/04/23/integrating-elmah-with-umbraco/
superawesome:
  - 'false'
dsq_thread_id:
  - 1053787189
categories:
  - blog
tags:
  - ASP.NET
  - ELMAH
  - Error Handling
  - Exception
  - Umbraco
---
**<span style="text-decoration:underline;">Update:</span>** For the latest details on [how to integrate ELMAH with Umbraco](http://our.umbraco.org/wiki/how-tos/use-elmah-with-umbraco), please read the article over on the Our Umbraco wiki.

I have a few [Umbraco](http://umbraco.org/) projects that have a lot of custom .NET code, mostly in they are in the form of user-controls and XSLT extensions.  As far as I&#8217;m aware Umbraco doesn&#8217;t have an extendable mechanism for exception handling and sending out notification emails, (there is the umbraco.BusinessLogic.Log, which writes to the umbracoLog table in the database, but that&#8217;s all).

Initially I looked at [Tim Gaunt&#8217;s Advanced Error Reporting](http://blogs.thesitedoctor.co.uk/tim/2009/02/27/Advanced+Error+Reporting+In+Umbraco+DasBlog+And+Other+ASPNet+Sites.aspx) &#8211; a great drop-in solution that does exactly what it says on the tin!  Whilst reading the comments on Tim&#8217;s blog, [Simon Dingley](http://www.prolificnotion.co.uk/) reminded me of the [ELMAH](http://code.google.com/p/elmah/) project &#8211; which has been one of those web-applications that you keep meaning to try out, but never get around to.

**What is ELMAH?**

> ELMAH ([Error Logging Modules and Handlers](http://code.google.com/p/elmah/)) is an application-wide error logging facility that is completely pluggable. It can be dynamically added to a running ASP.NET web application, or even all ASP.NET web applications on a machine, without any need for re-compilation or re-deployment.

So I decided to see how nicely it plays with Umbraco&#8230; the result, it plays very nicely indeed.

If you are interested, here&#8217;s how&#8230;

  1. Download the latest ELMAH binary release (1.0 Beta 3 at the time of writing [[direct link](http://elmah.googlecode.com/files/ELMAH-1.0-BETA3-bin.zip)]) from the Google Code project page. (<http://code.google.com/p/elmah/>)
  2. Extract the files from the ZIP.
  3. Select the DLLs from the &#8220;`/bin/`&#8221; folder, for Umbraco you&#8217;ll be using the DLL from &#8220;`/bin/net-2.0/Release/`&#8220;.  For the benefit of this post, I decided to use the [SQLite](http://www.sqlite.org/) option to store the error logs in a database. I could easily have used the SQL Server or [VistaDB](http://www.vistadb.net/) options.
  4. Drop the DLLs into the &#8220;`/bin/`&#8221; folder of your Umbraco installation.
  5. Open the web.config of your Umbracoo installation and add the following lines:

Add the following to your `<configSections>` section:

<pre class="brush: xml; title: ; notranslate" title="">&lt;sectionGroup name="elmah"&gt;
	&lt;section name="security" requirePermission="false" type="Elmah.SecuritySectionHandler, Elmah"/&gt;
	&lt;section name="errorLog" requirePermission="false" type="Elmah.ErrorLogSectionHandler, Elmah"/&gt;
	&lt;section name="errorMail" requirePermission="false" type="Elmah.ErrorMailSectionHandler, Elmah"/&gt;
	&lt;section name="errorFilter" requirePermission="false" type="Elmah.ErrorFilterSectionHandler, Elmah"/&gt;
&lt;/sectionGroup&gt;</pre>

Add the following just after the `</configSections>` section:

<pre class="brush: xml; title: ; notranslate" title="">&lt;elmah&gt;
	&lt;security allowRemoteAccess="yes" /&gt;
	&lt;errorLog type="Elmah.SQLiteErrorLog, Elmah" connectionStringName="ELMAH.SQLite" /&gt;
	&lt;errorMail from="no-reply@domain.com" to="webmaster@domain.com" /&gt;
&lt;/elmah&gt;</pre>

Add the following to your `<connectionStrings>` section, (if you have one, otherwise create one):

<pre class="brush: xml; title: ; notranslate" title="">&lt;add name="ELMAH.SQLite" connectionString="Data Source=~/data/errors.s3db"/&gt;</pre>

In the `<httpModules>` section, add this:

<pre class="brush: xml; title: ; notranslate" title="">&lt;add name="ErrorMail" type="Elmah.ErrorMailModule, Elmah"/&gt;
&lt;add name="ErrorLog" type="Elmah.ErrorLogModule, Elmah"/&gt;
&lt;add name="ErrorFilter" type="Elmah.ErrorFilterModule, Elmah"/&gt;</pre>

&#8230; and finally, in the `<httpHandlers>` section, add this:

<pre class="brush: xml; title: ; notranslate" title="">&lt;add verb="POST,GET,HEAD" path="elmah.axd" type="Elmah.ErrorLogPageFactory, Elmah"/&gt;</pre>

If you run into any trouble, there is a more detailed guide on [Setting Up ELMAH](http://code.google.com/p/elmah/wiki/DotNetSlackersArticle#Setting_it_up) from DotNetSlackers.

By now you should have ELMAH up and running.  Open up your web-browser and go to http://localhost/elmah.axd, (obviously replace &#8220;localhost&#8221; with whatever your hostname is). You should see the ELMAH Error Log page.  Since this is open to the public, **you may want to secure it**, see the [Securing Error Log Pages](http://code.google.com/p/elmah/wiki/SecuringErrorLogPages) article for further details.

The last part is to integrate the ELMAH Error Log page into the Umbraco back-end.  I created a new user-control in the &#8220;/usercontrols/&#8221; folder called &#8220;ELMAH.ascx&#8221;, using the following HTML:

<pre class="brush: xml; title: ; notranslate" title="">&lt;%@ Control Language="C#" %&gt;
&lt;iframe height="98%" width="100%" scrolling="auto" src="elmah.axd" style="margin-top:5px;"&gt;&lt;/iframe&gt;</pre>

Then in the &#8220;`/config/Dashboard.config`&#8221; configuration file, I added a new section for the developer area.

<pre class="brush: xml; title: ; notranslate" title="">&lt;section&gt;
	&lt;areas&gt;
		&lt;area&gt;developer&lt;/area&gt;
	&lt;/areas&gt;
	&lt;tab caption="Error Logging Modules and Handlers for ASP.NET"&gt;
		&lt;control&gt;/usercontrols/ELMAH.ascx&lt;/control&gt;
	&lt;/tab&gt;
&lt;/section&gt;</pre>

Now in the Umbraco back-end the developer area looks like this.

<p style="text-align:center;">
  <a href="/wordpress/wp-content/uploads/2009/04/umbraco-development-2009-04-23-19-26-30.png"><img class="size-medium wp-image-118 aligncenter" title="ELMAH in Umbraco" src="/wordpress/wp-content/uploads/2009/04/umbraco-development-2009-04-23-19-26-30.png?w=300" alt="ELMAH in Umbraco" width="300" height="225" /></a>
</p>

I have been very impressed with how well ELMAH functions.  Aside from the essential email notifications, the RSS feeds are a great bonus!
