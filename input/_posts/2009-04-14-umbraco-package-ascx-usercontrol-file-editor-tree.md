---
id: 295
title: 'Umbraco Package &#8211; User Control File Tree'
date: 2009-04-14T23:46:09+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=112
permalink: /2009/04/14/umbraco-package-ascx-usercontrol-file-editor-tree/
dsq_thread_id:
  - 1054583982
tags:
  - ASCX
  - ASP.NET
  - Developer
  - Umbraco
  - User Controls
---
A few months ago, Tim Geyssens (aka [Umbraco rockstar](http://www.nibble.be/)) released a package that gave you [access to the *.config files in the /config/ folder](http://www.nibble.be/?p=53). This has been a lifesaver in those few times where I have only had web-access to an Umbraco install and needed to tweak some config settings.

Recently I found myself in the same situation, but this time I needed to quickly update a few text changes to an ASCX user-control. Due to the nature of the .NET user-controls in [Umbraco](http://umbraco.org/), there is no native way of accessing/editing those files via the admin back-end.

&#8230; well, not until now &#8230;

Following on from Tim&#8217;s lead with the Config Tree package, I have developed a &#8220;User Control File Tree&#8221; for the developer section.

This package displays all the user-control files (from the /usercontrols/ folder), allowing you to edit the front-end ASCX code/mark-up.  (There is no way to edit the code-behind using this package).  If the user-control contains any inline code (C#/VB.NET), then you will be able to edit it.  Keep in mind that there is no validation when editing the user-controls &#8211; so please be careful!

[You can download the **User Control File Tree** package from here.](http://code.leekelleher.com/umbraco/User_Control_Files_Tree_1.0.zip)

I created the package using Umbraco 4&#8217;s built-in Create Package Wizard. Please note that this package has been designed to work with **<span style="text-decoration:underline;">v4</span> (and above)**, apologies to v3 users.

To install the package, go to the Developer section of your Umbraco back-end, expand the &#8220;Packages&#8221; folder, click on &#8220;Install local package&#8221;, select the &#8220;User\_Control\_Files\_Tree\_1.0.zip&#8221; (from wherever you saved it) and press the &#8220;Load Package&#8221; button.  Follow a few more on-screen steps and you&#8217;ll be done in no time!

If you have any problems with it, please do let me know &#8211; either by leaving a comment here or posting a thread on the [Umbraco forum](http://forum.umbraco.org/).