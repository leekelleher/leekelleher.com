---
id: 269
title: Vista SP1 Hibernation problems
date: 2008-03-22T08:18:57+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=19
permalink: /2008/03/22/vista-sp1-hibernation-problems/
tagazine-media:
  - 'a:7:{s:7:"primary";s:0:"";s:6:"images";a:0:{}s:6:"videos";a:0:{}s:11:"image_count";s:1:"0";s:6:"author";s:5:"51466";s:7:"blog_id";s:7:"2580820";s:9:"mod_stamp";s:19:"2008-03-22 08:18:57";}'
dsq_thread_id:
  - 1054584125
tags:
  - BCD
  - hibernation
  - installation
  - microsoft
  - problem
  - technet
  - trouble-shooting
  - vista
  - windows
---
After a couple of unsuccessfully attempted to install [Windows Vista Service Pack 1](http://technet.microsoft.com/en-us/windowsvista/bb738089.aspx); it seems that I &#8220;forgot&#8221; to disable my anti-virus software! Then it installed fine.

Vista does seem to perform better/quicker since SP1, but, for me, it introduced a major show-stopper!

**Hibernation stopped working!**

I google&#8217;d the problem to see if anyone else had the same issue &#8212; and knew how to resolve it. It took me a while, probably because Vista SP1 is still &#8220;new&#8221; (officially), then I found the answer! [[direct link](http://forums.microsoft.com/TechNet/ShowPost.aspx?PostID=2897541&SiteID=17)]

Seems that there was an issue with the [BCD](http://en.wikipedia.org/wiki/Boot_Configuration_Data) &#8211; this doesn&#8217;t surprise me, as I do dual-boot with Ubuntu.

Here is the solution from the [TechNet Vista SP1 forum](http://forums.microsoft.com/TechNet/ShowPost.aspx?PostID=2897541&SiteID=17):

> 1. Run `CMD.EXE` as administrator
> 
> 2. Run the following command: `bcdedit -enum all`
> 
> Look for &#8220;Resume from Hibernate&#8221; in the output from the command above(example below):
> 
> `Resume from Hibernate`
> 
> `---------------------`
> 
> **`identifier {3d8d3081-33ac-11dc-9a41-806e6f6e6963}`**
> 
> `device partition=C:`
> 
> `path Windowssystem32winresume.exe`
> 
> `description Windows Vista (TM) Enterprise (recovered)`
> 
> **`inherit {resumeloadersettings}`**
> 
> `filedevice partition=C:`
> 
> `filepath hiberfil.sys`
> 
> `pae Yes`
> 
> `debugoptionenabled No`
> 
> 3. Once you have found it, copy the value for identifier (in this example &#8211; `{3d8d3081-33ac-11dc-9a41-806e6f6e6963}`)
> 
> 4. Run the following command: `bcdedit /deletevalue {3d8d3081-33ac-11dc-9a41-806e6f6e6963} inherit`
> 
> 5. Test hibernation.

This worked for me! Good luck with your Vista SP1 installation!