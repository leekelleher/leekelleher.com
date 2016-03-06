title: "rel-tag-spaces dilemma"
link: "http://leekelleher.com/2008/05/10/rel-tag-spaces-dilemma/"
pubDate: "Sat, 10 May 2008 12:08:05 +0000"
guid: "http://leekelleher.wordpress.com/?p=32"
dc_creator: "leekelleher"
wp_post_id: 278
wp_post_date: "2008-05-10 12:08:05"
wp_post_date_gmt: "2008-05-10 12:08:05"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "rel-tag-spaces-dilemma"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0_edit_last: 2
dsq_thread_id: 1054583715
categories:
  - aspnet: "ASP.NET"
  - blog: "blog"
  - firefox: "firefox"
  - iis: "IIS"
  - link: "link"
  - microformats: "microformats"
  - operator: "Operator"
  - readysteadybook: "readysteadybook"
  - rel-tag: "rel-tag"
  - rel-tag-spaces: "rel-tag-spaces"
  - tag: "tag"
  - tagspace: "tagspace"

---

# rel-tag-spaces dilemma

Since I started using the <a href="https://addons.mozilla.org/firefox/addon/4106">Operator</a> Firefox extension a couple of week ago, I've found it to be a useful tool - to quickly access microformatted content; such as Contact details and Tagspaces.

Whilst I was testing it out on <a href="http://www.readysteadybook.com/">ReadySteadyBook</a>, I noticed that the only tagspace was "<code>Blog.aspx</code>", which seemed a bit weird.  When I found the same problem on other websites, such as Amazon (<a href="http://www.amazon.com/gp/product/B000FI73MA/">example here</a>) where the tagspace was "<code>ref=tag_dpp_cust_itdp_t</code>".  I thought this was a bug, so <a href="https://bugzilla.mozilla.org/show_bug.cgi?id=431708">I raised a ticket on Bugzilla</a>.

... however, <a href="https://bugzilla.mozilla.org/show_bug.cgi?id=431708#c1">I was wrong!</a> <a href="http://www.kaply.com/">Michael Kaply</a> (the Operator developer) pointed me towards <a href="http://microformats.org/wiki/rel-tag#Tag_Spaces">the Tagspaces spec</a>.

It seems that for a <a href="http://microformats.org/wiki/rel-tag">rel-tag</a> to be recognised as a tagspace it needs to have a specific URI structure:
<blockquote>Tags are embedded in HTTP URIs in a well-defined manner so that the tag embedded in an HTTP URI can be mechanically extracted from that URI. Specifically, the last segment of the path portion of the URI (after the final "/" character) contains the tag value. For example, the URI: http://www.example.com/tags/foo contains the tag "foo".</blockquote>
This causes an issue for me.  On <a href="http://www.readysteadybook.com/">ReadySteadyBook</a>, the site is built using ASP.NET (1.1) on a shared web hosting environment.  This means that I have no control over how the web-server (IIS) handles the page requests.  For legacy reasons, IIS is configured to only map URI that have ASP.NET extensions (e.g. <strong>.aspx</strong>, <strong>.ascx</strong>, <strong>.ashx</strong>, <strong>.asmx</strong>, etc) to handled by the .NET Framework.  So any "fancy permalinks" that I want to use must have one of those extensions.

At present, an example of a tagspace on ReadySteadyBook is: <code>http://www.readysteadybook.com/Blog.aspx?tag=poetry</code>

(The "Blog.aspx" page is quite complex, it can take all sorts of parameter to filter out it's content - hence my reason to use the querystring)

Even if I did pretty up the URI structure to not use the querystring, at most I could get it to this: <code>http://www.readysteadybook.com/blog/tag/poetry.aspx</code>

Unfortunately, that still wouldn't pass the grade with the "Masters of the Microformats"! As the tag would be defined as "<code>poetry.aspx</code>", rather than "<code>poetry</code>".  See my dilemma?

Should I keep the rel-tag attribute on my tag links? or remove them because it conflicts with the current version of the rel-tag specification? (<a href="http://microformats.org/wiki/rel-tag-issues">For other issues with the rel-tag spec, go here.</a>)

Alternatively, I could link them to an external tagspace, such as Technorati? &lt;snarky&gt;<em>oooh, they'd like that wouldn't they!?!</em>&lt;/snarky&gt;  <a href="http://microformats.org/wiki/rel-tag-spaces">A list of external tagspaces can be found here.</a>