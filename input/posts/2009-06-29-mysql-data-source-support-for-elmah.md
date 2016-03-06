title: "MySql data-source support for ELMAH"
link: "http://leekelleher.com/2009/06/29/mysql-data-source-support-for-elmah/"
pubDate: "Mon, 29 Jun 2009 11:28:19 +0000"
guid: "http://blog.leekelleher.com/?p=126"
dc_creator: "leekelleher"
wp_post_id: 297
wp_post_date: "2009-06-29 11:28:19"
wp_post_date_gmt: "2009-06-29 11:28:19"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "mysql-data-source-support-for-elmah"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0_edit_last: 2
dsq_thread_id: 1054584228
categories:
  - net: ".NET"
  - blog: "blog"
  - c: "C#"
  - code: "code"
  - elmah: "ELMAH"
  - error-handling: "Error Handling"
  - exception: "Exception"
  - mysql: "MySql"

---

# MySql data-source support for ELMAH

Following on from my last post (a couple of months ago) about <a href="http://blog.leekelleher.com/2009/04/23/integrating-elmah-with-umbraco/">Integrating ELMAH with Umbraco</a>, I <a href="http://blog.leekelleher.com/2009/04/23/integrating-elmah-with-umbraco/#comment-182">received a comment</a> if it was possible for ELMAH to use MySQL as a back-end data-source.

After a few emails back and forth between myself and Rajiv, (as well as <a href="http://groups.google.com/group/elmah/browse_thread/thread/33d2597ad0fd15cd">Rajiv's requests over at the ELMAH support group</a>), the advice was to simpily develop some code that implemented the <code>ErrorLog</code> class, (making use of the 3 core methods: <code>Log</code>, <code>GetError</code> and <code>GetErrors</code>). Rajiv make a start with this code, but ran into a few problems, (mostly because he was trying to reference methods/properties that were internal to the core <code>Elmah.dll</code>).

Given that I'd said it was quick and easy to develop this code, I best put my money (or time in this case) where my mouth was. Fifteen minutes later the code was written... and then another hour later, the code was tested and bugs fixed.

For the MySQL connectivity, I used the <a href="http://dev.mysql.com/downloads/connector/net/6.0.html"><code>MySql.Data.MySqlClient</code> connector</a>. For the <code>MySqlErrorLog</code>, I followed the code/design patterns that <a title="Atif Aziz" href="http://www.raboof.com/">Atif</a> had used in both the core <code>SqlErrorLog</code> and <code>SQLiteErrorLog</code> classes.

I have uploaded the Visual Studio (2008) solution to the <a href="http://groups.google.com/group/elmah/files">ELMAH support group file repo</a> (<a href="http://elmah.googlegroups.com/web/Elmah.MySql.zip">here is a direct link to the ZIP</a>) - you will need to compile the DLL from the solution. If you need a pre-compiled DLL, then <a href="http://leekelleher.com/contact">give me a shout</a>, I'll sort something out.

Once you have the compiled Elmah.MySql.dll, you will need to add following to your Web.config file:

In your <code>&lt;elmah&gt;</code> section, change the <code>&lt;errorLog&gt;</code> to: (if you haven't installed ELMAH before, <a href="http://code.google.com/p/elmah/wiki/WebBase">please see the WebBase</a>)

[sourcecode language='xml']
<errorLog type="Elmah.MySqlErrorLog, Elmah.MySql" />
[/sourcecode]

In the VS2008 solution, there is a script called MySql.sql - run this against your database to create the new table (called "elmah") needed to log the errors/exceptions.

Then add your MySql connection string in the <code>&lt;connectionStrings&gt;</code> section:

[sourcecode language='xml']
<add name="ELMAH_MySql" connectionString="SERVER=localhost;DATABASE=elmah;USER=XXXX;PASSWORD=XXXX;" />
[/sourcecode]

It is <strong>very</strong> important that you call the connection string "<code>ELMAH_MySql</code>" - as this is hard-coded in the backend. (Let me know if this is a problem, I think it could be moved to the <code>&lt;errorLog&gt;</code> section?)

Once you have saved the changes to your Web.config, you are all set to use MySql as your ELMAH back-end data-source!

<strong><span style="text-decoration:underline;">Known issues:</span></strong>
<ul>
	<li>The "Sequence" column in the "elmah" table should be auto-incremental, but it isn't! (I don't claim to know enough about MySql to have multiple auto-incremental columns) - any suggestions?</li>
	<li>The MySql connection string is hard-coded as "<code>ELMAH_MySql</code>"</li>
	<li>The code will only compile with .NET 2.0 and above (no support for .NET 1.0 or 1.1 - sorry)</li>
</ul>
I have <a href="http://twitter.com/raboof/status/2076357031">mentioned to Atif</a> about the possibility of including MySql support to the ELMAH core - to which he is willing to do, only if I support it. Which I will be happy to do - but only if there is a need for it.  So my suggestion would be, if you would like to see MySql support in the ELMAH core - then <a href="http://code.google.com/p/elmah/issues/list">raise a feature request on the ELMAH Google Code site</a>. Once it gains momentum, we'll take it from there.