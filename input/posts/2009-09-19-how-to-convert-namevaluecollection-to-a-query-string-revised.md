title: "How to convert NameValueCollection to a (Query) String [Revised]"
link: "http://leekelleher.com/2009/09/19/how-to-convert-namevaluecollection-to-a-query-string-revised/"
pubDate: "Sat, 19 Sep 2009 23:08:34 +0000"
guid: "http://blog.leekelleher.com/?p=171"
dc_creator: "leekelleher"
wp_post_id: 303
wp_post_date: "2009-09-19 23:08:34"
wp_post_date_gmt: "2009-09-19 23:08:34"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "how-to-convert-namevaluecollection-to-a-query-string-revised"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0_edit_last: 2
dsq_thread_id: 1053988440
_syntaxhighlighter_encoded: 1
categories:
  - aspnet: "ASP.NET"
  - blog: "blog"
  - c: "C#"
  - code: "code"
  - querystring: "QueryString"
  - revised: "revised"
  - snippet: "snippet"

---

# How to convert NameValueCollection to a (Query) String [Revised]

Following on from a comment on my previous post about <a href="http://blog.leekelleher.com/2008/06/06/how-to-convert-namevaluecollection-to-a-query-string/#comment-148">converting a NameValueCollection to a (query) string</a> - I have finally got around to revising my code snippet.  Now the method will handle same key multiple values, (it no longer comma-separates them).

I have also added extra parameters so that you can define your own delimiter (since the <a href="http://en.wikipedia.org/wiki/Query_string#Structure">HTTP specification</a> says that you can use both ampersands <code>&amp;</code> and semicolons <code>;</code>) and there is an option for omitting keys with empty values.

[sourcecode language="csharp"]/// &lt;summary&gt;
/// Constructs a NameValueCollection into a query string.
/// &lt;/summary&gt;
/// &lt;remarks&gt;Consider this method to be the opposite of &quot;System.Web.HttpUtility.ParseQueryString&quot;&lt;/remarks&gt;
/// &lt;param name=&quot;parameters&quot;&gt;The NameValueCollection&lt;/param&gt;
/// &lt;param name=&quot;delimiter&quot;&gt;The String to delimit the key/value pairs&lt;/param&gt;
/// &lt;returns&gt;A key/value structured query string, delimited by the specified String&lt;/returns&gt;
public static String ConstructQueryString(NameValueCollection parameters, String delimiter, Boolean omitEmpty)
{
	if (String.IsNullOrEmpty(delimiter))
		delimiter = &quot;&amp;&quot;;

	Char equals = '=';
	List&lt;String&gt; items = new List&lt;String&gt;();

	for (int i = 0; i &lt; parameters.Count; i++)
	{
		foreach (String value in parameters.GetValues(i))
		{
			Boolean addValue = (omitEmpty) ? !String.IsNullOrEmpty(value) : true;
			if (addValue)
				items.Add(String.Concat(parameters.GetKey(i), equals, HttpUtility.UrlEncode(value)));
		}
	}

	return String.Join(delimiter, items.ToArray());
}[/sourcecode] 