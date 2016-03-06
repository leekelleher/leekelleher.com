title: "Downgrading uComponents"
link: "http://leekelleher.com/2013/09/13/downgrading-ucomponents/"
pubDate: "Fri, 13 Sep 2013 15:45:39 +0000"
guid: "http://leekelleher.com/?p=530"
dc_creator: "leekelleher"
wp_post_id: 530
wp_post_date: "2013-09-13 16:45:39"
wp_post_date_gmt: "2013-09-13 15:45:39"
wp_comment_status: "open"
wp_ping_status: "closed"
wp_post_name: "downgrading-ucomponents"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0_edit_last: 2
dsq_thread_id: 1756255433
categories:
  - blog: "blog"
  - ucomponents: "uComponents"
  - umbraco: "Umbraco"

---

# Downgrading uComponents

A question was asked on the Our Umbraco forum about how to downgrade a version of uComponents (<a href="http://our.umbraco.org/projects/backoffice-extensions/ucomponents/questionssuggestions/44702-uninstalling-when-2-versions-installed">from v5.4.0 to v4.1.0 - as they were using Umbraco v4.7.2</a>).

There may well be other reasons that you would want to downgrade uComponents to a previous version - whether that be for Umbraco compatibility or maybe even you don't use the package any more and just want to uninstall it.

Firstly, <strong>DO NOT</strong> uninstall the package from within the back-office, as that will start to remove any data-types you have created (that use a uComponents editor/control), which subsequently will remove any content that used those data-types. So unless you want that to happen, don't "uninstall the package"!

Here are the steps that you should take to downgrade from v5.x to v4.x (this can also apply to earlier version too):

<ol>
	<li>Make a back-up of your "/bin" folder (specifically all the "uComponents.*.dll" files) - just in case it all goes wrong</li>
	<li>Delete all the "uComponents.*.dll"s <strong>EXCEPT</strong> for "uComponents.Core.dll" file.</li>
	<li>Within the back-office, reinstall uComponents v4.x</li>
	<li>Ta-dah! All is good in the world again</li>
</ol>

Now, there is one outstanding problem, that is the back-office will still list multiple versions of uComponents as installed. However that is just for display purposes; in reality you will only have v4.x installed. To fix this, you will have to manually edit the "/App_Data/packages/installed/installedPackages.config" XML file and remove the entry for "uComponents 5.x".  Save the file, check the back-office and the only the correctly installed version (v4.x) should appear.



