---
id: 270
title: Converting CSV to XML
date: 2008-04-14T16:07:34+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=21
permalink: /2008/04/14/converting-csv-to-xml/
tagazine-media:
  - 'a:7:{s:7:"primary";s:0:"";s:6:"images";a:0:{}s:6:"videos";a:0:{}s:11:"image_count";s:1:"0";s:6:"author";s:5:"51466";s:7:"blog_id";s:7:"2580820";s:9:"mod_stamp";s:19:"2008-04-14 16:22:10";}'
dsq_thread_id:
  - 1053360020
tags:
  - code
  - CSV
  - Excel
  - webdev
  - XML
---
There&#8217;s a bit a functionality on one of the projects that I&#8217;m working on where I need to do a lookup. The data I&#8217;ve been given is in an Excel spreadsheet &#8211; which I needed to convert to XML (as ultimately the data will be stored in a CMS that handles XML better).

I&#8217;ve done a lot of projects where I need to convert XML to Excel (via CSV), but not many where I need to convert the other way.

I first saved the Excel as an &#8220;XML Spreadsheet&#8221; &#8211; which spat out all sorts of extra MS Office namespaces, styles, etc. Which is fine if I want to re-open the data in Excel. But I wanted the data to be cleaner (and more semantic).

I exported the Excel out as a CSV; then looked for a way to convert it to XML.

Then I found this very useful web-app tool: [**CSV to XML Converter** by Creativyst](http://www.creativyst.com/Prod/15/)

It did exactly what I needed! The tool has a 100Kb limit &#8211; which was great, because my CSV was 96Kb!

The outputted XML was around 450Kb &#8211; which got me thinking&#8230; if a lot of developers use that tool the way I did &#8211; then that&#8217;s a lot of load on their web-server! Maybe that&#8217;s where the new [Google App Engine](http://code.google.com/appengine/) could come in handy?! They have the processing power and bandwidth to handle high usage!

I&#8217;d love to see other online text conversion utilities &#8230; you never know, maybe they could be all centralised on Google Apps?