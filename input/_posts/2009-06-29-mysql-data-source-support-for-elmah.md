---
id: 297
title: MySql data-source support for ELMAH
date: 2009-06-29T11:28:19+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=126
permalink: /2009/06/29/mysql-data-source-support-for-elmah/
dsq_thread_id:
  - 1054584228
tags:
  - .NET
  - 'C#'
  - code
  - ELMAH
  - Error Handling
  - Exception
  - MySql
---
Following on from my last post (a couple of months ago) about [Integrating ELMAH with Umbraco](http://blog.leekelleher.com/2009/04/23/integrating-elmah-with-umbraco/), I [received a comment](http://blog.leekelleher.com/2009/04/23/integrating-elmah-with-umbraco/#comment-182) if it was possible for ELMAH to use MySQL as a back-end data-source.

After a few emails back and forth between myself and Rajiv, (as well as [Rajiv&#8217;s requests over at the ELMAH support group](http://groups.google.com/group/elmah/browse_thread/thread/33d2597ad0fd15cd)), the advice was to simpily develop some code that implemented the `ErrorLog` class, (making use of the 3 core methods: `Log`, `GetError` and `GetErrors`). Rajiv make a start with this code, but ran into a few problems, (mostly because he was trying to reference methods/properties that were internal to the core `Elmah.dll`).

Given that I&#8217;d said it was quick and easy to develop this code, I best put my money (or time in this case) where my mouth was. Fifteen minutes later the code was written&#8230; and then another hour later, the code was tested and bugs fixed.

For the MySQL connectivity, I used the [`MySql.Data.MySqlClient` connector](http://dev.mysql.com/downloads/connector/net/6.0.html). For the `MySqlErrorLog`, I followed the code/design patterns that [Atif](http://www.raboof.com/ "Atif Aziz") had used in both the core `SqlErrorLog` and `SQLiteErrorLog` classes.

I have uploaded the Visual Studio (2008) solution to the [ELMAH support group file repo](http://groups.google.com/group/elmah/files) ([here is a direct link to the ZIP](http://elmah.googlegroups.com/web/Elmah.MySql.zip)) &#8211; you will need to compile the DLL from the solution. If you need a pre-compiled DLL, then [give me a shout](http://leekelleher.com/contact), I&#8217;ll sort something out.

Once you have the compiled Elmah.MySql.dll, you will need to add following to your Web.config file:

In your `<elmah>` section, change the `<errorLog>` to: (if you haven&#8217;t installed ELMAH before, [please see the WebBase](http://code.google.com/p/elmah/wiki/WebBase))

<pre class="brush: xml; title: ; notranslate" title="">&lt;errorLog type="Elmah.MySqlErrorLog, Elmah.MySql" /&gt;
</pre>

In the VS2008 solution, there is a script called MySql.sql &#8211; run this against your database to create the new table (called &#8220;elmah&#8221;) needed to log the errors/exceptions.

Then add your MySql connection string in the `<connectionStrings>` section:

<pre class="brush: xml; title: ; notranslate" title="">&lt;add name="ELMAH_MySql" connectionString="SERVER=localhost;DATABASE=elmah;USER=XXXX;PASSWORD=XXXX;" /&gt;
</pre>

It is **very** important that you call the connection string &#8220;`ELMAH_MySql`&#8221; &#8211; as this is hard-coded in the backend. (Let me know if this is a problem, I think it could be moved to the `<errorLog>` section?)

Once you have saved the changes to your Web.config, you are all set to use MySql as your ELMAH back-end data-source!

**<span style="text-decoration:underline;">Known issues:</span>**

  * The &#8220;Sequence&#8221; column in the &#8220;elmah&#8221; table should be auto-incremental, but it isn&#8217;t! (I don&#8217;t claim to know enough about MySql to have multiple auto-incremental columns) &#8211; any suggestions?
  * The MySql connection string is hard-coded as &#8220;`ELMAH_MySql`&#8220;
  * The code will only compile with .NET 2.0 and above (no support for .NET 1.0 or 1.1 &#8211; sorry)

I have [mentioned to Atif](http://twitter.com/raboof/status/2076357031) about the possibility of including MySql support to the ELMAH core &#8211; to which he is willing to do, only if I support it. Which I will be happy to do &#8211; but only if there is a need for it.  So my suggestion would be, if you would like to see MySql support in the ELMAH core &#8211; then [raise a feature request on the ELMAH Google Code site](http://code.google.com/p/elmah/issues/list). Once it gains momentum, we&#8217;ll take it from there.