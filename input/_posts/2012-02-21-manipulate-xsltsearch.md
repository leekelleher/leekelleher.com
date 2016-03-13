---
id: 355
title: Manipulate XSLTsearch
date: 2012-02-21T22:25:48+00:00
author: leekelleher
layout: post
guid: http://leekelleher.com/?p=355
permalink: /2012/02/21/manipulate-xsltsearch/
dsq_thread_id:
  - 1053301475
categories:
  - blog
tags:
  - Template
  - Umbraco
  - XSLT
  - XSLTsearch
---
When developing websites with [Umbraco](http://umbraco.codeplex.com), I always use the [XSLTsearch](http://our.umbraco.org/projects/website-utilities/xsltsearch) package to handle the search solution. As well as being easy and quick to install, it is [customisable](http://blog.percipientstudios.com/2009/4/7/customizing-xsltsearch.aspx) and very fast in searching content nodes.

As much as I love XSLTsearch, the one dilemma I always face is having to modify the HTML output that is generated.  Given the way I work; with a much better front-end developer providing the mark-up; I am faced with shoehorning my HTML into the XSLTsearch template.

In many cases this is fine and acceptable. However how to handle bugfixes and overall improvements to XSLTsearch when they may be released? Having to retro-fit these into my forked/modified/hacked version is an unwanted headache. (Also having learnt from past experiences in open-source development, you <span style="text-decoration: underline;"><strong><a href="http://drupal.org/best-practices/do-not-hack-core">do not hack the core</a></strong></span>!)

So how can we separate our desired mark-up from the logic/core of XSLTsearch? (without modifying XSLTsearch itself!)

* * *

Now we all know that the beauty of XSLT is in its ability to transform one flavour of XML into another flavour of XML; whether this be XHTML, RSS, etc. The XML is processed and returned. With this in mind, we can alter our perception of the output from XSLTsearch as a data-source, rather than HTML output.

Reviewing the XSLTsearch source, skipping over all the variable declarations, the root template runs a couple of conditions on the **$search** and **$source** parameters, then ultimately calls a template named &#8220;**search**&#8221; &#8211; passing through a parameter called &#8220;**items**&#8221; containing an XPath for the selected node-set.

Using a separate XSLT file, we can import &#8220;_XSLTsearch.xslt_&#8221; and override its templates with our own &#8211; this is done by using the &#8220;**[priority](http://www.edankert.com/transforms/xslt.template-priority.html)**&#8221; attribute on our _xsl:template_. From here we can make our own call to the &#8220;search&#8221; template and pass through any XPath we desire in the &#8220;items&#8221; parameter.

To do this&#8230;

  1. Create a new XSLT file called &#8220;_SearchResults.xslt_&#8221; &#8211; you can do this either from your Umbraco back-office or on directly on the file-system (in the _/xslt_ directory).
  2. Find the macro for XSLTsearch, (via the Umbraco back-office), change the &#8220;Use XSLT file&#8221; to &#8220;_SearchResults.xslt_&#8221; (e.g. the one you&#8217;ve just created).
  3. Copy-n-paste the following snippet, (or get [the full XSLT from my gist](https://gist.github.com/1879072)):

<pre class="brush: xml; title: ; notranslate" title="">&lt;?xml version="1.0" encoding="UTF-8"?&gt;
&lt;!DOCTYPE xsl:stylesheet [
	&lt;!ENTITY nbsp "&#x00A0;"&gt;
]&gt;
&lt;xsl:stylesheet
	version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:msxml="urn:schemas-microsoft-com:xslt"
	xmlns:umbraco.library="urn:umbraco.library"
	xmlns:PS.XSLTsearch="urn:PS.XSLTsearch"
	exclude-result-prefixes="msxml umbraco.library PS.XSLTsearch"&gt;
	&lt;xsl:import href="XSLTsearch.xslt"/&gt;

	&lt;xsl:template match="/" priority="2"&gt;
		&lt;xsl:variable name="searchResults"&gt;
			&lt;xsl:call-template name="search"&gt;
				&lt;xsl:with-param name="items" select="$currentPage/ancestor-or-self::*[@level = 1]"/&gt;
			&lt;/xsl:call-template&gt;
		&lt;/xsl:variable&gt;
		&lt;xsl:variable name="results" select="msxml:node-set($searchResults)"/&gt;

		&lt;xmp&gt;
			&lt;xsl:copy-of select="$results"/&gt;
		&lt;/xmp&gt;

	&lt;/xsl:template&gt;

&lt;/xsl:stylesheet&gt;</pre>

_This is a snippet for my blog post, to get my full customised XSLT example, see here:_ <https://gist.github.com/1879072>

So, what has just happened?

We&#8217;ve included an import reference for the unmodified XSLTsearch file. Our root template (match=&#8221;/&#8221;) is given a priority of 2; this tells the XSLT processor that our template takes a higher priority that XSLTsearch&#8217;s original template.

Inside our template we declare a variable named &#8220;searchResults&#8221; (you can call this whatever you like), the value of this will be the output from XSLTsearch&#8217;s template named &#8220;search&#8221;, passing in the &#8220;items&#8221; parameter.

It is important to point out that the value of the &#8220;searchResults&#8221; variable will be a **result tree fragment**, meaning we can&#8217;t use it as we would a regular XML node-set. This usually causes headaches for developers &#8211; it&#8217;s generally at the point when they want to throw their laptop out of the window and pledge allegiance to the [Razor Empire](http://razorempire.com/). So to resolve this, we need the follow-up variable called &#8220;result&#8221; &#8211; this uses a native extension method to convert the fragment back into a proper node-set.

Once we have our &#8220;$results&#8221; variable, we can manipulate this however we like.  On a side note, do read the Pimp My XSLT article on &#8220;[Transforming WYSIWYG output with XSLT](http://pimpmyxslt.com/articles/wysiwyg/)&#8220;.

My use of the <[xmp](http://www.w3.org/TR/REC-html32#xmp)> tag is for debug purposes only &#8230; _yes, yes, I know it has been deprecated since HTML 3.2, but as long as browsers support it, I&#8217;ll use it &#8230; and no, I&#8217;ve never ever used it on a production website._

From here you can do an xsl:apply-templates on the $result node-set and manipulate the search results however you desire.

<pre class="brush: xml; title: ; notranslate" title="">&lt;xsl:apply-templates select="$results/div" /&gt;</pre>

* * *

Another advantage of taking this approach is to be able to manipulate the XPath expression of the &#8220;items&#8221; parameter.

Let&#8217;s say that you only wanted to search against your news articles; we could modify the XPath expression to something like this&#8230;

<pre class="brush: xml; title: ; notranslate" title="">&lt;xsl:with-param name="items" select="$currentPage/ancestor-or-self::*[@level = 1]/descendant::NewsArticle[@isDoc]"/&gt;</pre>

_This XPath navigates all the way up the tree to the homepage node (level 1), then back down collecting <span style="text-decoration: underline;">all</span> the &#8216;NewsArticle&#8217; nodes._

Or how&#8217;s about  something more advanced? We would like only news articles published in the last 30 days.

<pre class="brush: xml; title: ; notranslate" title="">&lt;xsl:with-param name="items" select="$currentPage/ancestor-or-self::*[@level = 1]/descendant::NewsArticle[@isDoc and umbraco.library:DateGreaterThanOrEqualToday(umbraco.library:DateAdd(@createDate, 'd', 30))]"/&gt;</pre>

* * *

In summary, once you are able to change your perspective that the output from an XSLT is still XML, which you can manipulate and transform further &#8211; you have complete control over your desired mark-up.