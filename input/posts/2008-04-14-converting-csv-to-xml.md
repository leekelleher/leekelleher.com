title: "Converting CSV to XML"
link: "http://leekelleher.com/2008/04/14/converting-csv-to-xml/"
pubDate: "Mon, 14 Apr 2008 16:07:34 +0000"
guid: "http://leekelleher.wordpress.com/?p=21"
dc_creator: "leekelleher"
wp_post_id: 270
wp_post_date: "2008-04-14 16:07:34"
wp_post_date_gmt: "2008-04-14 16:07:34"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "converting-csv-to-xml"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0_edit_last: 2
tagazine-media: a:7:{s:7:"primary";s:0:"";s:6:"images";a:0:{}s:6:"videos";a:0:{}s:11:"image_count";s:1:"0";s:6:"author";s:5:"51466";s:7:"blog_id";s:7:"2580820";s:9:"mod_stamp";s:19:"2008-04-14 16:22:10";}
dsq_thread_id: 1053360020
categories:
  - blog: "blog"
  - csv: "csv"
  - data: "data"
  - excel: "excel"
  - google: "google"
  - microsoft: "microsoft"
  - office: "office"
  - online: "online"
  - text: "text"
  - web: "web"
  - web-application: "web-application"
  - work: "work"
  - xml: "xml"

---

# Converting CSV to XML

There's a bit a functionality on one of the projects that I'm working on where I need to do a lookup.  The data I've been given is in an Excel spreadsheet - which I needed to convert to XML (as ultimately the data will be stored in a CMS that handles XML better).

I've done a lot of projects where I need to convert XML to Excel (via CSV), but not many where I need to convert the other way.

I first saved the Excel as an "XML Spreadsheet" - which spat out all sorts of extra MS Office namespaces, styles, etc.  Which is fine if I want to re-open the data in Excel.  But I wanted the data to be cleaner (and more semantic).

I exported the Excel out as a CSV; then looked for a way to convert it to XML.

Then I found this very useful web-app tool: <a href="http://www.creativyst.com/Prod/15/"><strong>CSV to XML Converter</strong> by Creativyst</a>

It did exactly what I needed!  The tool has a 100Kb limit - which was great, because my CSV was 96Kb!

The outputted XML was around 450Kb - which got me thinking... if a lot of developers use that tool the way I did - then that's a lot of load on their web-server!   Maybe that's where the new <a href="http://code.google.com/appengine/">Google App Engine</a> could come in handy?!  They have the processing power and bandwidth to handle high usage!

I'd love to see other online text conversion utilities ... you never know, maybe they could be all centralised on Google Apps?