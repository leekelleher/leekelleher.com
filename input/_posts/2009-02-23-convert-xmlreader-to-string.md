---
id: 294
title: Convert XmlReader to String
date: 2009-02-23T12:56:59+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=109
permalink: /2009/02/23/convert-xmlreader-to-string/
dsq_thread_id:
  - 1053808840
categories:
  - blog
tags:
  - ASP.NET
  - 'C#'
  - Microsoft Data Access Application Blocks
  - sql
  - StringBuilder
  - Umbraco
  - xml
  - XmlReader
---

I was in the middle of developing a member look-up AJAX function for an [Umbraco](http://umbraco.org/) project, when I ran into a slight problem, (confusion rather), about how to pull the XML back from SQL Server and return it to the browser (AJAX).

The SQL statement was straight-forward, very simple, does a LIKE query against the members table, no problem there. Added &#8220;FOR XML AUTO&#8221; to return the result-set back as an XML data-type ... all going well so far.

Umbraco makes use of [Microsoft Data Access Application Block](http://msdn.microsoft.com/en-us/library/cc309504.aspx)'s [SqlHelper](http://forums.asp.net/t/941983.aspx) class, so I followed the same pattern.

```csharp
string sql = "SELECT n.id, n.text, m.Email, m.LoginName FROM cmsMember AS m INNER JOIN umbracoNode AS n ON m.nodeId = n.id WHERE n.text LIKE '%' + @query + '%' FOR XML AUTO";
XmlReader reader = SqlHelper.ExecuteXmlReader(connection, CommandType.Text, sql, new SqlParameter[] { new SqlParameter("@query", query) })
```

At first I tried to return the XML as a String by calling `XmlReader`'s `GetOuterXml()` method. But it returned nothing. After a lot of googling, (of [converting an XmlReader to a String](http://www.velocityreviews.com/forums/t118219-read-or-convert-xml-file-to-a-string.html)), I found a suggestion of iterating through the `XmlReader`, appending the current node to a `StringBuilder`.

Here's what I ended up with...

```csharp
using (SqlConnection connection = new SqlConnection(umbraco.GlobalSettings.DbDSN))
{
	string sql = "SELECT n.id, n.text, m.Email, m.LoginName FROM cmsMember AS m INNER JOIN umbracoNode AS n ON m.nodeId = n.id WHERE n.text LIKE '%' + @query + '%' FOR XML AUTO";
	using (XmlReader reader = SqlHelper.ExecuteXmlReader(connection, CommandType.Text, sql, new SqlParameter[] { new SqlParameter("@query", query) }))
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

return string.Empty;
```

I hope it helps... any improvements and suggestions are welcome!