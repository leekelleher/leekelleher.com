---
id: 530
title: Downgrading uComponents
date: 2013-09-13T16:45:39+00:00
author: leekelleher
layout: post
guid: http://leekelleher.com/?p=530
permalink: /2013/09/13/downgrading-ucomponents/
dsq_thread_id:
  - 1756255433
tags:
  - uComponents
  - Umbraco
---
A question was asked on the Our Umbraco forum about how to downgrade a version of uComponents ([from v5.4.0 to v4.1.0 &#8211; as they were using Umbraco v4.7.2](http://our.umbraco.org/projects/backoffice-extensions/ucomponents/questionssuggestions/44702-uninstalling-when-2-versions-installed)).

There may well be other reasons that you would want to downgrade uComponents to a previous version &#8211; whether that be for Umbraco compatibility or maybe even you don&#8217;t use the package any more and just want to uninstall it.

Firstly, **DO NOT** uninstall the package from within the back-office, as that will start to remove any data-types you have created (that use a uComponents editor/control), which subsequently will remove any content that used those data-types. So unless you want that to happen, don&#8217;t &#8220;uninstall the package&#8221;!

Here are the steps that you should take to downgrade from v5.x to v4.x (this can also apply to earlier version too):

  1. Make a back-up of your &#8220;/bin&#8221; folder (specifically all the &#8220;uComponents.*.dll&#8221; files) &#8211; just in case it all goes wrong
  2. Delete all the &#8220;uComponents.*.dll&#8221;s **EXCEPT** for &#8220;uComponents.Core.dll&#8221; file.
  3. Within the back-office, reinstall uComponents v4.x
  4. Ta-dah! All is good in the world again

Now, there is one outstanding problem, that is the back-office will still list multiple versions of uComponents as installed. However that is just for display purposes; in reality you will only have v4.x installed. To fix this, you will have to manually edit the &#8220;/App_Data/packages/installed/installedPackages.config&#8221; XML file and remove the entry for &#8220;uComponents 5.x&#8221;. Save the file, check the back-office and the only the correctly installed version (v4.x) should appear.