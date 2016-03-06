title: "How to convert NameValueCollection to a (Query) String"
link: "http://leekelleher.com/2008/06/06/how-to-convert-namevaluecollection-to-a-query-string/"
pubDate: "Fri, 06 Jun 2008 13:22:17 +0000"
guid: "http://leekelleher.wordpress.com/?p=36"
dc_creator: "leekelleher"
wp_post_id: 281
wp_post_date: "2008-06-06 13:22:17"
wp_post_date_gmt: "2008-06-06 13:22:17"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "how-to-convert-namevaluecollection-to-a-query-string"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1053590679'
categories:
  - aspnet: "ASP.NET"
  - blog: "blog"
  - c: "C#"
  - code: "code"
  - querystring: "QueryString"
  - snippet: "snippet"

---

# How to convert NameValueCollection to a (Query) String

Most ASP.NET developers know that you can get a key/value pair string from the <code>Request.QueryString</code> object (via the <code>.ToString()</code> method).  However that functionality isn't the same for a generic <code>NameValueCollection</code> object (of which <code>Request.QueryString</code> is derived from).

So how do you take a <code>NameValueCollection</code> object and get a nicely formatted key/value pair string? (i.e. "<code>key1=value1&amp;key2=value2</code>") ... Here's a method I wrote a while ago:

[sourcecode language='csharp']/// <summary>
/// Constructs a QueryString (string).
/// Consider this method to be the opposite of "System.Web.HttpUtility.ParseQueryString"
/// </summary>
/// <param name="nvc">NameValueCollection</param>
/// <returns>String</returns>
public static String ConstructQueryString(NameValueCollection parameters)
{
	List<String> items = new List<String>();

	foreach (String name in parameters)
		items.Add(String.Concat(name, "=", System.Web.HttpUtility.UrlEncode(parameters[name])));

	return String.Join("&", items.ToArray());
}[/sourcecode]

Just in case you didn't know about the <code>System.Web.HttpUtility.ParseQueryString</code> method, it's a quick way of converting a query (key/value pairs) string back into a <code>NameValueCollection</code>.