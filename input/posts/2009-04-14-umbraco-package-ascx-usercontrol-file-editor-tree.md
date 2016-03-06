title: "Umbraco Package - User Control File Tree"
link: "http://leekelleher.com/2009/04/14/umbraco-package-ascx-usercontrol-file-editor-tree/"
pubDate: "Tue, 14 Apr 2009 23:46:09 +0000"
guid: "http://blog.leekelleher.com/?p=112"
dc_creator: "leekelleher"
wp_post_id: 295
wp_post_date: "2009-04-14 23:46:09"
wp_post_date_gmt: "2009-04-14 23:46:09"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "umbraco-package-ascx-usercontrol-file-editor-tree"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0_edit_last: 2
dsq_thread_id: 1054583982
categories:
  - ascx: "ASCX"
  - aspnet: "ASP.NET"
  - blog: "blog"
  - developer: "Developer"
  - umbraco: "Umbraco"
  - user-controls: "User Controls"

---

# Umbraco Package - User Control File Tree

A few months ago, Tim Geyssens (aka <a href="http://www.nibble.be/">Umbraco rockstar</a>) released a package that gave you <a href="http://www.nibble.be/?p=53">access to the *.config files in the /config/ folder</a>.  This has been a lifesaver in those few times where I have only had web-access to an Umbraco install and needed to tweak some config settings.

Recently I found myself in the same situation, but this time I needed to quickly update a few text changes to an ASCX user-control. Due to the nature of the .NET user-controls in <a href="http://umbraco.org/">Umbraco</a>, there is no native way of accessing/editing those files via the admin back-end.

... well, not until now ...

Following on from Tim's lead with the Config Tree package, I have developed a "User Control File Tree" for the developer section.

This package displays all the user-control files (from the /usercontrols/ folder), allowing you to edit the front-end ASCX code/mark-up.  (There is no way to edit the code-behind using this package).  If the user-control contains any inline code (C#/VB.NET), then you will be able to edit it.  Keep in mind that there is no validation when editing the user-controls - so please be careful!

<a href="http://code.leekelleher.com/umbraco/User_Control_Files_Tree_1.0.zip">You can download the <strong>User Control File Tree</strong> package from here.</a>

I created the package using Umbraco 4's built-in Create Package Wizard. Please note that this package has been designed to work with <strong><span style="text-decoration:underline;">v4</span> (and above)</strong>, apologies to v3 users.

To install the package, go to the Developer section of your Umbraco back-end, expand the "Packages" folder, click on "Install local package", select the "User_Control_Files_Tree_1.0.zip" (from wherever you saved it) and press the "Load Package" button.  Follow a few more on-screen steps and you'll be done in no time!

If you have any problems with it, please do let me know - either by leaving a comment here or posting a thread on the <a href="http://forum.umbraco.org/">Umbraco forum</a>.