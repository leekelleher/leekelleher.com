title: "Manipulate XSLTsearch"
link: "http://leekelleher.com/2012/02/21/manipulate-xsltsearch/"
pubDate: "Tue, 21 Feb 2012 22:25:48 +0000"
guid: "http://leekelleher.com/?p=355"
dc_creator: "leekelleher"
wp_post_id: 355
wp_post_date: "2012-02-21 22:25:48"
wp_post_date_gmt: "2012-02-21 22:25:48"
wp_comment_status: "open"
wp_ping_status: "closed"
wp_post_name: "manipulate-xsltsearch"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1053301475'
categories:
  - blog: "blog"
  - template: "Template"
  - umbraco: "Umbraco"
  - xslt-2: "XSLT"
  - xsltsearch: "XSLTsearch"

---

# Manipulate XSLTsearch

When developing websites with <a href="http://umbraco.codeplex.com">Umbraco</a>, I always use the <a href="http://our.umbraco.org/projects/website-utilities/xsltsearch">XSLTsearch</a> package to handle the search solution. As well as being easy and quick to install, it is <a href="http://blog.percipientstudios.com/2009/4/7/customizing-xsltsearch.aspx">customisable</a> and very fast in searching content nodes.

As much as I love XSLTsearch, the one dilemma I always face is having to modify the HTML output that is generated.  Given the way I work; with a much better front-end developer providing the mark-up; I am faced with shoehorning my HTML into the XSLTsearch template.

In many cases this is fine and acceptable. However how to handle bugfixes and overall improvements to XSLTsearch when they may be released? Having to retro-fit these into my forked/modified/hacked version is an unwanted headache. (Also having learnt from past experiences in open-source development, you <span style="text-decoration: underline;"><strong><a href="http://drupal.org/best-practices/do-not-hack-core">do not hack the core</a></strong></span>!)

So how can we separate our desired mark-up from the logic/core of XSLTsearch? (without modifying XSLTsearch itself!)

<hr />

Now we all know that the beauty of XSLT is in its ability to transform one flavour of XML into another flavour of XML; whether this be XHTML, RSS, etc. The XML is processed and returned. With this in mind, we can alter our perception of the output from XSLTsearch as a data-source, rather than HTML output.

Reviewing the XSLTsearch source, skipping over all the variable declarations, the root template runs a couple of conditions on the <strong>$search</strong> and <strong>$source</strong> parameters, then ultimately calls a template named "<strong>search</strong>" - passing through a parameter called "<strong>items</strong>" containing an XPath for the selected node-set.

Using a separate XSLT file, we can import "<em>XSLTsearch.xslt</em>" and override its templates with our own - this is done by using the "<strong><a href="http://www.edankert.com/transforms/xslt.template-priority.html">priority</a></strong>" attribute on our <em>xsl:template</em>. From here we can make our own call to the "search" template and pass through any XPath we desire in the "items" parameter.

To do this...
<ol>
	<li>Create a new XSLT file called "<em>SearchResults.xslt</em>" - you can do this either from your Umbraco back-office or on directly on the file-system (in the <em>/xslt</em> directory).</li>
	<li>Find the macro for XSLTsearch, (via the Umbraco back-office), change the "Use XSLT file" to "<em>SearchResults.xslt</em>" (e.g. the one you've just created).</li>
	<li>Copy-n-paste the following snippet, (or get <a href="https://gist.github.com/1879072">the full XSLT from my gist</a>):</li>
</ol>
[sourcecode language="xslt"]&lt;?xml version=&quot;1.0&quot; encoding=&quot;UTF-8&quot;?&gt;
&lt;!DOCTYPE xsl:stylesheet [
	&lt;!ENTITY nbsp &quot;&amp;#x00A0;&quot;&gt;
]&gt;
&lt;xsl:stylesheet
	version=&quot;1.0&quot;
	xmlns:xsl=&quot;http://www.w3.org/1999/XSL/Transform&quot;
	xmlns:msxml=&quot;urn:schemas-microsoft-com:xslt&quot;
	xmlns:umbraco.library=&quot;urn:umbraco.library&quot;
	xmlns:PS.XSLTsearch=&quot;urn:PS.XSLTsearch&quot;
	exclude-result-prefixes=&quot;msxml umbraco.library PS.XSLTsearch&quot;&gt;
	&lt;xsl:import href=&quot;XSLTsearch.xslt&quot;/&gt;

	&lt;xsl:template match=&quot;/&quot; priority=&quot;2&quot;&gt;
		&lt;xsl:variable name=&quot;searchResults&quot;&gt;
			&lt;xsl:call-template name=&quot;search&quot;&gt;
				&lt;xsl:with-param name=&quot;items&quot; select=&quot;$currentPage/ancestor-or-self::*[@level = 1]&quot;/&gt;
			&lt;/xsl:call-template&gt;
		&lt;/xsl:variable&gt;
		&lt;xsl:variable name=&quot;results&quot; select=&quot;msxml:node-set($searchResults)&quot;/&gt;

		&lt;xmp&gt;
			&lt;xsl:copy-of select=&quot;$results&quot;/&gt;
		&lt;/xmp&gt;

	&lt;/xsl:template&gt;

&lt;/xsl:stylesheet&gt;[/sourcecode]
<em>This is a snippet for my blog post, to get my full customised XSLT example, see here:</em> <a href="https://gist.github.com/1879072">https://gist.github.com/1879072</a>

So, what has just happened?

We've included an import reference for the unmodified XSLTsearch file. Our root template (match="/") is given a priority of 2; this tells the XSLT processor that our template takes a higher priority that XSLTsearch's original template.

Inside our template we declare a variable named "searchResults" (you can call this whatever you like), the value of this will be the output from XSLTsearch's template named "search", passing in the "items" parameter.

It is important to point out that the value of the "searchResults" variable will be a <strong>result tree fragment</strong>, meaning we can't use it as we would a regular XML node-set. This usually causes headaches for developers - it's generally at the point when they want to throw their laptop out of the window and pledge allegiance to the <a href="http://razorempire.com/">Razor Empire</a>. So to resolve this, we need the follow-up variable called "result" - this uses a native extension method to convert the fragment back into a proper node-set.

Once we have our "$results" variable, we can manipulate this however we like.  On a side note, do read the Pimp My XSLT article on "<a href="http://pimpmyxslt.com/articles/wysiwyg/">Transforming WYSIWYG output with XSLT</a>".

My use of the &lt;<a href="http://www.w3.org/TR/REC-html32#xmp">xmp</a>&gt; tag is for debug purposes only ... <em>yes, yes, I know it has been deprecated since HTML 3.2, but as long as browsers support it, I'll use it ... and no, I've never ever used it on a production website.</em>

From here you can do an xsl:apply-templates on the $result node-set and manipulate the search results however you desire.
[sourcecode language="xslt"]&lt;xsl:apply-templates select=&quot;$results/div&quot; /&gt;[/sourcecode]

<hr />

Another advantage of taking this approach is to be able to manipulate the XPath expression of the "items" parameter.

Let's say that you only wanted to search against your news articles; we could modify the XPath expression to something like this...
[sourcecode language="xslt"]&lt;xsl:with-param name=&quot;items&quot; select=&quot;$currentPage/ancestor-or-self::*[@level = 1]/descendant::NewsArticle[@isDoc]&quot;/&gt;[/sourcecode]
<em>This XPath navigates all the way up the tree to the homepage node (level 1), then back down collecting <span style="text-decoration: underline;">all</span> the 'NewsArticle' nodes.</em>

Or how's about  something more advanced? We would like only news articles published in the last 30 days.
[sourcecode language="xslt"]&lt;xsl:with-param name=&quot;items&quot; select=&quot;$currentPage/ancestor-or-self::*[@level = 1]/descendant::NewsArticle[@isDoc and umbraco.library:DateGreaterThanOrEqualToday(umbraco.library:DateAdd(@createDate, 'd', 30))]&quot;/&gt;[/sourcecode]

<hr />

In summary, once you are able to change your perspective that the output from an XSLT is still XML, which you can manipulate and transform further - you have complete control over your desired mark-up.