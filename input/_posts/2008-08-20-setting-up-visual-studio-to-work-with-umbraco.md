---
id: 289
title: Setting up Visual Studio to work with Umbraco
date: 2008-08-20T18:17:26+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=81
permalink: /2008/08/20/setting-up-visual-studio-to-work-with-umbraco/
dsq_thread_id:
  - 1053483457
categories:
  - blog
tags:
  - ASP.NET
  - CMS
  - Umbraco
  - Visual Studio
  - VS.NET 2008
---
Over the last 12 months I have been involved with developing several [Umbraco](http://umbraco.org/)-powered websites. During that time I&#8217;ve experienced many development frustrations; specifically with debugging and version control.

A while back I read Paul Sterling&#8217;s blog post on &#8220;[Working with Umbraco in Visual Studio](http://www.motusconnect.com/blog/2007/12/10/working%20with%20umbraco%20in%20visual%20studio.aspx)&#8221; &#8211; I used this as my basis.  I have added to his orignal suggestions:

  1. Have a clean, working copy of Umbraco &#8211; using the installer &#8211; on your machine.  I am using: `C:inetpubwwwrootumbraco` for my working copy of the site.
  2. My Visual Studio solution/project will be kept under version-control.  Since I use Subversion, (with [TortoiseSVN](http://tortoisesvn.net/) and [VisualSVN](http://www.visualsvn.com/visualsvn/)), I prefer to keep all my code under: `C:SVN`
  3. In the Visual Studio project, I create the following folders: 
      1. `/_templates`
      2. `/css`
      3. `/scripts`
      4. `/usercontrols`
      5. `/xslt`
    
    These folders reflect the files that will be used in my Umbraco site.  The &#8220;`/_templates`&#8221; folder is used to store a text-based version of Umbraco templates, so that I can keep them under version-control; as I&#8217;ve had a situation in the past where someone copied over the wrong template &#8211; not very pretty.</li> 
    
      * In Visual Studio, create a post-build event [from Project > Properties > Build Events] to copy all your working files across to your Umbraco installation. <pre class="brush: jscript; title: ; notranslate" title="">XCOPY "$(ProjectDir)bin$(ProjectName)*.*" "C:Inetpubwwwrootumbracobin" /y
XCOPY "$(ProjectDir)usercontrols*.ascx" "C:Inetpubwwwrootumbracousercontrols" /y
XCOPY "$(ProjectDir)xslt*.xslt" "C:Inetpubwwwrootumbracoxslt" /y
XCOPY "$(ProjectDir)scripts*.js" "C:Inetpubwwwrootumbracoscripts" /y</pre>
        
        You may notice that I am not copying across the `*.css` stylesheet files across to Umbraco.  The reason for this is that the current version of Umbraco (v3.0.3) stores the contents of the CSS files in the database, and not on the file-system.
        
        You can either set the &#8220;Run the post-build event&#8221; whichever option you prefer.</li> 
        
          * Once your files have been copied across to Umbraco, you can debug your code in Visual Studio: 
              1. Open the site (usually http://localhost/) in your web-browser.
              2. In Visual Studio select the Debug > Attach to Process menu.
              3. Select the ASP.NET worker process from the list &#8211; this is usually called &#8220;`aspnet_wp.exe`&#8221; or &#8220;`w3wp.exe`&#8221; &#8211; then press OK.</ol> 
        
        It&#8217;s important to note that I am developing on Visual Studio 2008; but the same prinicple should apply to VS.NET 2005. (**<span style="text-decoration:underline;">Update</span>**: It isn&#8217;t so straight-forward in VS.NET 2005, [see Brad&#8217;s comment for further details](http://blog.leekelleher.com/2008/08/20/setting-up-visual-studio-to-work-with-umbraco/#comment-110).)
        
        I&#8217;m still looking at ways to improve my development set-up with Umbraco/Visual Studio, so if anyone has any tips &#8211; please pass them my way!  I&#8217;m especially interested in ways of dynamically updating the stylesheets/templates via the Umbraco API.
        
        _**<span style="text-decoration:underline;">Update:</span>** I originally wrote this post for use with Umbraco v3. If you are looking for a v4 post,_ [_check out the CG09 session write-up over at Our Umbraco_](http://our.umbraco.org/wiki/codegarden-2009/open-space-minutes/working-in-visual-studio-when-developing-umbraco-solutions)_. The main difference is that you wont need the **/_templates/** folder, just replace it with the **/masterpages/** folder, and add it to the post-build events._