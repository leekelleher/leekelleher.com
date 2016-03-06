title: "Making Request.QueryString writable (by clone/copy)"
link: "http://leekelleher.com/2008/06/06/making-requestquerystring-writable-by-clonecopy/"
pubDate: "Fri, 06 Jun 2008 13:09:31 +0000"
guid: "http://leekelleher.wordpress.com/?p=35"
dc_creator: "leekelleher"
wp_post_id: 280
wp_post_date: "2008-06-06 13:09:31"
wp_post_date_gmt: "2008-06-06 13:09:31"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "making-requestquerystring-writable-by-clonecopy"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1056051575'
categories:
  - aspnet: "ASP.NET"
  - blog: "blog"
  - c: "C#"
  - code: "code"
  - querystring: "QueryString"
  - snippet: "snippet"

---

# Making Request.QueryString writable (by clone/copy)

Every now and then I completely forget that the <code>Request.QueryString</code> (and <code>Request.Form</code>) object is read-only.  Today I had a bit of functionality where I needed to remove a key/value from the collection - but the <code>Remove()</code> method (of the <code>NameValueCollection</code> object) throws an exception.

Unfortunately, the <code>Request.QueryString</code>'s <code>CopyTo</code> method assigns the values to an <code>ARRAY</code>, not a <code>NameValueCollection</code> - losing functionality and flexibility.

You need to copy the <code>Request.QueryString</code> object to a new <code>NameValueCollection</code> instance, here's how:

[sourcecode language='csharp']NameValueCollection qs = new NameValueCollection(Request.QueryString);[/sourcecode]

Now you can add/remove the key/values to your hearts content!

Oh, yeah, remember to import the <code>System.Collections.Specialized</code> namespace too!