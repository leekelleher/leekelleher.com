title: "Convert XmlReader to String"
link: "http://leekelleher.com/2009/02/23/convert-xmlreader-to-string/"
pubDate: "Mon, 23 Feb 2009 12:56:59 +0000"
guid: "http://blog.leekelleher.com/?p=109"
dc_creator: "leekelleher"
wp_post_id: 294
wp_post_date: "2009-02-23 12:56:59"
wp_post_date_gmt: "2009-02-23 12:56:59"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "convert-xmlreader-to-string"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0_edit_last: 2
dsq_thread_id: 1053808840
categories:
  - aspnet: "ASP.NET"
  - blog: "blog"
  - c: "C#"
  - microsoft-data-access-application-blocks: "Microsoft Data Access Application Blocks"
  - sql: "sql"
  - stringbuilder: "StringBuilder"
  - umbraco: "Umbraco"
  - xml: "xml"
  - xmlreader: "XmlReader"

---

# Convert XmlReader to String

I was in the middle of developing a member look-up AJAX function for an <a href="http://umbraco.org/">Umbraco</a> project, when I ran into a slight problem, (confusion rather), about how to pull the XML back from SQL Server and return it to the browser (AJAX).

The SQL statement was straight-forward, very simple, does a LIKE query against the members table, no problem there.  Added "FOR XML AUTO" to return the result-set back as an XML data-type ... all going well so far.

Umbraco makes use of <a href="http://msdn.microsoft.com/en-us/library/cc309504.aspx">Microsoft Data Access Application Block</a>'s <a href="http://forums.asp.net/t/941983.aspx">SqlHelper</a> class, so I followed the same pattern.

[sourcecode language='csharp']XmlReader reader = SqlHelper.ExecuteXmlReader(connection, CommandType.Text, "SELECT n.id, n.text, m.Email, m.LoginName FROM cmsMember AS m INNER JOIN umbracoNode AS n ON m.nodeId = n.id WHERE n.text LIKE '%' + @query + '%' FOR XML AUTO", new SqlParameter[] { new SqlParameter("@query", query) })[/sourcecode]

At first I tried to return the XML as a String by calling <code>XmlReader</code>'s <code>GetOuterXml()</code> method. But it returned nothing.  After a lot of googling, (of <a href="http://www.velocityreviews.com/forums/t118219-read-or-convert-xml-file-to-a-string.html">converting an XmlReader to a String</a>), I found a suggestion of iterating through the <code>XmlReader</code>, appending the current node to a <code>StringBuilder</code>.

Here's what I ended up with...

[sourcecode language='csharp']using (SqlConnection connection = new SqlConnection(umbraco.GlobalSettings.DbDSN))
{
	using (XmlReader reader = SqlHelper.ExecuteXmlReader(connection, CommandType.Text, "SELECT n.id, n.text, m.Email, m.LoginName FROM cmsMember AS m INNER JOIN umbracoNode AS n ON m.nodeId = n.id WHERE n.text LIKE '%' + @query + '%' FOR XML AUTO", new SqlParameter[] { new SqlParameter("@query", query) }))
	{
		if (reader != null)
		{
			StringBuilder sb = new StringBuilder();

			while (reader.Read())
				sb.AppendLine(reader.ReadOuterXml());

			return sb.ToString();
		}
	}
}

return String.Empty;[/sourcecode]

I hope it helps... any improvements and suggestions are welcome!
