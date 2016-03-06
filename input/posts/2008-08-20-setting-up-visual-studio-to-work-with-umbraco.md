title: "Setting up Visual Studio to work with Umbraco"
link: "http://leekelleher.com/2008/08/20/setting-up-visual-studio-to-work-with-umbraco/"
pubDate: "Wed, 20 Aug 2008 18:17:26 +0000"
guid: "http://leekelleher.wordpress.com/?p=81"
dc_creator: "leekelleher"
wp_post_id: 289
wp_post_date: "2008-08-20 18:17:26"
wp_post_date_gmt: "2008-08-20 18:17:26"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "setting-up-visual-studio-to-work-with-umbraco"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1053483457'
categories:
  - aspnet: "ASP.NET"
  - blog: "blog"
  - cms: "CMS"
  - umbraco: "Umbraco"
  - visual-studio: "Visual Studio"
  - vsnet-2008: "VS.NET 2008"

---

# Setting up Visual Studio to work with Umbraco

Over the last 12 months I have been involved with developing several <a href="http://umbraco.org/">Umbraco</a>-powered websites. During that time I've experienced many development frustrations; specifically with debugging and version control.

A while back I read Paul Sterling's blog post on "<a href="http://www.motusconnect.com/blog/2007/12/10/working%20with%20umbraco%20in%20visual%20studio.aspx">Working with Umbraco in Visual Studio</a>" - I used this as my basis.  I have added to his orignal suggestions:
<ol>
	<li>Have a clean, working copy of Umbraco - using the installer - on your machine.  I am using: <code>C:inetpubwwwrootumbraco</code> for my working copy of the site.</li>
	<li>My Visual Studio solution/project will be kept under version-control.  Since I use Subversion, (with <a href="http://tortoisesvn.net/">TortoiseSVN</a> and <a href="http://www.visualsvn.com/visualsvn/">VisualSVN</a>), I prefer to keep all my code under: <code>C:SVN</code></li>
	<li>In the Visual Studio project, I create the following folders:
<ol>
	<li><code>/_templates</code></li>
	<li><code>/css</code></li>
	<li><code>/scripts</code></li>
	<li><code>/usercontrols</code></li>
	<li><code>/xslt</code></li>
</ol>
These folders reflect the files that will be used in my Umbraco site.  The "<code>/_templates</code>" folder is used to store a text-based version of Umbraco templates, so that I can keep them under version-control; as I've had a situation in the past where someone copied over the wrong template - not very pretty.</li>
	<li>In Visual Studio, create a post-build event [from Project &gt; Properties &gt; Build Events] to copy all your working files across to your Umbraco installation. [sourcecode language='jscript']XCOPY "$(ProjectDir)bin$(ProjectName)*.*" "C:Inetpubwwwrootumbracobin" /y
XCOPY "$(ProjectDir)usercontrols*.ascx" "C:Inetpubwwwrootumbracousercontrols" /y
XCOPY "$(ProjectDir)xslt*.xslt" "C:Inetpubwwwrootumbracoxslt" /y
XCOPY "$(ProjectDir)scripts*.js" "C:Inetpubwwwrootumbracoscripts" /y[/sourcecode]

You may notice that I am not copying across the <code>*.css</code> stylesheet files across to Umbraco.  The reason for this is that the current version of Umbraco (v3.0.3) stores the contents of the CSS files in the database, and not on the file-system.

You can either set the "Run the post-build event" whichever option you prefer.</li>
	<li>Once your files have been copied across to Umbraco, you can debug your code in Visual Studio:
<ol>
	<li> Open the site (usually http://localhost/) in your web-browser.</li>
	<li> In Visual Studio select the Debug &gt; Attach to Process menu.</li>
	<li> Select the ASP.NET worker process from the list - this is usually called "<code>aspnet_wp.exe</code>" or "<code>w3wp.exe</code>" - then press OK.</li>
</ol>
</li>
</ol>
It's important to note that I am developing on Visual Studio 2008; but the same prinicple should apply to VS.NET 2005. (<strong><span style="text-decoration:underline;">Update</span></strong>: It isn't so straight-forward in VS.NET 2005, <a href="http://blog.leekelleher.com/2008/08/20/setting-up-visual-studio-to-work-with-umbraco/#comment-110">see Brad's comment for further details</a>.)

I'm still looking at ways to improve my development set-up with Umbraco/Visual Studio, so if anyone has any tips - please pass them my way!  I'm especially interested in ways of dynamically updating the stylesheets/templates via the Umbraco API.

<em><strong><span style="text-decoration:underline;">Update:</span></strong> I originally wrote this post for use with Umbraco v3. If you are looking for a v4 post, </em><a href="http://our.umbraco.org/wiki/codegarden-2009/open-space-minutes/working-in-visual-studio-when-developing-umbraco-solutions"><em>check out the CG09 session write-up over at Our Umbraco</em></a><em>. The main difference is that you wont need the <strong>/_templates/</strong> folder, just replace it with the <strong>/masterpages/</strong> folder, and add it to the post-build events.</em>