title: "Vista SP1 Hibernation problems"
link: "http://leekelleher.com/2008/03/22/vista-sp1-hibernation-problems/"
pubDate: "Sat, 22 Mar 2008 08:18:57 +0000"
guid: "http://leekelleher.wordpress.com/?p=19"
dc_creator: "leekelleher"
wp_post_id: 269
wp_post_date: "2008-03-22 08:18:57"
wp_post_date_gmt: "2008-03-22 08:18:57"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "vista-sp1-hibernation-problems"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
tagazine-media: 'a:7:{s:7:"primary";s:0:"";s:6:"images";a:0:{}s:6:"videos";a:0:{}s:11:"image_count";s:1:"0";s:6:"author";s:5:"51466";s:7:"blog_id";s:7:"2580820";s:9:"mod_stamp";s:19:"2008-03-22 08:18:57";}'
dsq_thread_id: '1054584125'
categories:
  - bcd: "BCD"
  - blog: "blog"
  - hibernation: "hibernation"
  - installation: "installation"
  - microsoft: "microsoft"
  - problem: "problem"
  - technet: "technet"
  - trouble-shooting: "trouble-shooting"
  - vista: "vista"
  - windows: "windows"

---

# Vista SP1 Hibernation problems

After a couple of unsuccessfully attempted to install <a href="http://technet.microsoft.com/en-us/windowsvista/bb738089.aspx">Windows Vista Service Pack 1</a>; it seems that I "forgot" to disable my anti-virus software! Then it installed fine.

Vista does seem to perform better/quicker since SP1, but, for me, it introduced a major show-stopper!

<b>Hibernation stopped working!</b>

I google'd the problem to see if anyone else had the same issue -- and knew how to resolve it.  It took me a while, probably because Vista SP1 is still "new" (officially), then I found the answer! [<a href="http://forums.microsoft.com/TechNet/ShowPost.aspx?PostID=2897541&amp;SiteID=17">direct link</a>]

Seems that there was an issue with the <a href="http://en.wikipedia.org/wiki/Boot_Configuration_Data">BCD</a> - this doesn't surprise me, as I do dual-boot with Ubuntu.

Here is the solution from the <a href="http://forums.microsoft.com/TechNet/ShowPost.aspx?PostID=2897541&amp;SiteID=17">TechNet Vista SP1 forum</a>:
<blockquote> 1. Run <code>CMD.EXE</code> as administrator

2. Run the following command: <code>bcdedit -enum all</code>

Look for "Resume from Hibernate" in the output from the command above(example below):

<code>Resume from Hibernate</code>

<code>---------------------</code>

<b><code>identifier {3d8d3081-33ac-11dc-9a41-806e6f6e6963}</code></b>

<code>device partition=C:</code>

<code>path Windowssystem32winresume.exe</code>

<code>description Windows Vista (TM) Enterprise (recovered)</code>

<b><code>inherit {resumeloadersettings}</code></b>

<code>filedevice partition=C:</code>

<code>filepath hiberfil.sys</code>

<code>pae Yes</code>

<code>debugoptionenabled No</code>

3. Once you have found it, copy the value for identifier (in this example - <code>{3d8d3081-33ac-11dc-9a41-806e6f6e6963}</code>)

4. Run the following command: <code>bcdedit /deletevalue {3d8d3081-33ac-11dc-9a41-806e6f6e6963} inherit</code>

5. Test hibernation.</blockquote>
This worked for me!  Good luck with your Vista SP1 installation!