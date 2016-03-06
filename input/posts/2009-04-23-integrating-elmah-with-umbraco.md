title: "Integrating ELMAH with Umbraco"
link: "http://leekelleher.com/2009/04/23/integrating-elmah-with-umbraco/"
pubDate: "Thu, 23 Apr 2009 21:13:34 +0000"
guid: "http://blog.leekelleher.com/?p=116"
dc_creator: "leekelleher"
wp_post_id: 296
wp_post_date: "2009-04-23 21:13:34"
wp_post_date_gmt: "2009-04-23 21:13:34"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "integrating-elmah-with-umbraco"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
superawesome: 'false'
dsq_thread_id: '1053787189'
categories:
  - aspnet: "ASP.NET"
  - blog: "blog"
  - elmah: "ELMAH"
  - error-handling: "Error Handling"
  - exception: "Exception"
  - umbraco: "Umbraco"

---

# Integrating ELMAH with Umbraco

<strong><span style="text-decoration:underline;">Update:</span></strong> For the latest details on <a href="http://our.umbraco.org/wiki/how-tos/use-elmah-with-umbraco">how to integrate ELMAH with Umbraco</a>, please read the article over on the Our Umbraco wiki.

I have a few <a href="http://umbraco.org/">Umbraco</a> projects that have a lot of custom .NET code, mostly in they are in the form of user-controls and XSLT extensions.  As far as I'm aware Umbraco doesn't have an extendable mechanism for exception handling and sending out notification emails, (there is the umbraco.BusinessLogic.Log, which writes to the umbracoLog table in the database, but that's all).

Initially I looked at <a href="http://blogs.thesitedoctor.co.uk/tim/2009/02/27/Advanced+Error+Reporting+In+Umbraco+DasBlog+And+Other+ASPNet+Sites.aspx">Tim Gaunt's Advanced Error Reporting</a> - a great drop-in solution that does exactly what it says on the tin!  Whilst reading the comments on Tim's blog, <a href="http://www.prolificnotion.co.uk/">Simon Dingley</a> reminded me of the <a href="http://code.google.com/p/elmah/">ELMAH</a> project - which has been one of those web-applications that you keep meaning to try out, but never get around to.

<strong>What is ELMAH?</strong>
<blockquote>ELMAH (<a href="http://code.google.com/p/elmah/">Error Logging Modules and Handlers</a>) is an application-wide error logging facility that is completely pluggable. It can be dynamically added to a running ASP.NET web application, or even all ASP.NET web applications on a machine, without any need for re-compilation or re-deployment.</blockquote>
So I decided to see how nicely it plays with Umbraco... the result, it plays very nicely indeed.

If you are interested, here's how...
<ol>
	<li>Download the latest ELMAH binary release (1.0 Beta 3 at the time of writing [<a href="http://elmah.googlecode.com/files/ELMAH-1.0-BETA3-bin.zip">direct link</a>]) from the Google Code project page. (<a href="http://code.google.com/p/elmah/">http://code.google.com/p/elmah/</a>)</li>
	<li>Extract the files from the ZIP.</li>
	<li>Select the DLLs from the "<code>/bin/</code>" folder, for Umbraco you'll be using the DLL from "<code>/bin/net-2.0/Release/</code>".  For the benefit of this post, I decided to use the <a href="http://www.sqlite.org/">SQLite</a> option to store the error logs in a database. I could easily have used the SQL Server or <a href="http://www.vistadb.net/">VistaDB</a> options.</li>
	<li>Drop the DLLs into the "<code>/bin/</code>" folder of your Umbraco installation.</li>
	<li>Open the web.config of your Umbracoo installation and add the following lines:</li>
</ol>
Add the following to your <code>&lt;configSections&gt;</code> section:

[sourcecode language="xml"]&lt;sectionGroup name=&quot;elmah&quot;&gt;
	&lt;section name=&quot;security&quot; requirePermission=&quot;false&quot; type=&quot;Elmah.SecuritySectionHandler, Elmah&quot;/&gt;
	&lt;section name=&quot;errorLog&quot; requirePermission=&quot;false&quot; type=&quot;Elmah.ErrorLogSectionHandler, Elmah&quot;/&gt;
	&lt;section name=&quot;errorMail&quot; requirePermission=&quot;false&quot; type=&quot;Elmah.ErrorMailSectionHandler, Elmah&quot;/&gt;
	&lt;section name=&quot;errorFilter&quot; requirePermission=&quot;false&quot; type=&quot;Elmah.ErrorFilterSectionHandler, Elmah&quot;/&gt;
&lt;/sectionGroup&gt;[/sourcecode]

Add the following just after the <code>&lt;/configSections&gt;</code> section:

[sourcecode language="xml"]&lt;elmah&gt;
	&lt;security allowRemoteAccess=&quot;yes&quot; /&gt;
	&lt;errorLog type=&quot;Elmah.SQLiteErrorLog, Elmah&quot; connectionStringName=&quot;ELMAH.SQLite&quot; /&gt;
	&lt;errorMail from=&quot;no-reply@domain.com&quot; to=&quot;webmaster@domain.com&quot; /&gt;
&lt;/elmah&gt;[/sourcecode]

Add the following to your <code>&lt;connectionStrings&gt;</code> section, (if you have one, otherwise create one):

[sourcecode language="xml"]&lt;add name=&quot;ELMAH.SQLite&quot; connectionString=&quot;Data Source=~/data/errors.s3db&quot;/&gt;[/sourcecode]

In the <code>&lt;httpModules&gt;</code> section, add this:

[sourcecode language="xml"]&lt;add name=&quot;ErrorMail&quot; type=&quot;Elmah.ErrorMailModule, Elmah&quot;/&gt;
&lt;add name=&quot;ErrorLog&quot; type=&quot;Elmah.ErrorLogModule, Elmah&quot;/&gt;
&lt;add name=&quot;ErrorFilter&quot; type=&quot;Elmah.ErrorFilterModule, Elmah&quot;/&gt;[/sourcecode]

... and finally, in the <code>&lt;httpHandlers&gt;</code> section, add this:

[sourcecode language="xml"]&lt;add verb=&quot;POST,GET,HEAD&quot; path=&quot;elmah.axd&quot; type=&quot;Elmah.ErrorLogPageFactory, Elmah&quot;/&gt;[/sourcecode]

If you run into any trouble, there is a more detailed guide on <a href="http://code.google.com/p/elmah/wiki/DotNetSlackersArticle#Setting_it_up">Setting Up ELMAH</a> from DotNetSlackers.

By now you should have ELMAH up and running.  Open up your web-browser and go to http://localhost/elmah.axd, (obviously replace "localhost" with whatever your hostname is). You should see the ELMAH Error Log page.  Since this is open to the public, <strong>you may want to secure it</strong>, see the <a href="http://code.google.com/p/elmah/wiki/SecuringErrorLogPages">Securing Error Log Pages</a> article for further details.

The last part is to integrate the ELMAH Error Log page into the Umbraco back-end.  I created a new user-control in the "/usercontrols/" folder called "ELMAH.ascx", using the following HTML:

[sourcecode language="html"]&lt;%@ Control Language=&quot;C#&quot; %&gt;
&lt;iframe height=&quot;98%&quot; width=&quot;100%&quot; scrolling=&quot;auto&quot; src=&quot;elmah.axd&quot; style=&quot;margin-top:5px;&quot;&gt;&lt;/iframe&gt;[/sourcecode]

Then in the "<code>/config/Dashboard.config</code>" configuration file, I added a new section for the developer area.

[sourcecode language="xml"]&lt;section&gt;
	&lt;areas&gt;
		&lt;area&gt;developer&lt;/area&gt;
	&lt;/areas&gt;
	&lt;tab caption=&quot;Error Logging Modules and Handlers for ASP.NET&quot;&gt;
		&lt;control&gt;/usercontrols/ELMAH.ascx&lt;/control&gt;
	&lt;/tab&gt;
&lt;/section&gt;[/sourcecode]

Now in the Umbraco back-end the developer area looks like this.
<p style="text-align:center;"><a href="http://leekelleher.com/wordpress/wp-content/uploads/2009/04/umbraco-development-2009-04-23-19-26-30.png"><img class="size-medium wp-image-118 aligncenter" title="ELMAH in Umbraco" src="http://leekelleher.com/wordpress/wp-content/uploads/2009/04/umbraco-development-2009-04-23-19-26-30.png?w=300" alt="ELMAH in Umbraco" width="300" height="225" /></a></p>
I have been very impressed with how well ELMAH functions.  Aside from the essential email notifications, the RSS feeds are a great bonus!

<a href="http://www.dotnetkicks.com/kick/?url=http%3a%2f%2fblog.leekelleher.com%2f2009%2f04%2f23%2fintegrating-elmah-with-umbraco%2f"><img class="alignright" src="http://www.dotnetkicks.com/Services/Images/KickItImageGenerator.ashx?url=http%3a%2f%2fblog.leekelleher.com%2f2009%2f04%2f23%2fintegrating-elmah-with-umbraco%2f&amp;fgcolor=000000&amp;bgcolor=FFFFFF&amp;cbgcolor=CCCCFF" border="0" alt="kick it on DotNetKicks.com" /></a>