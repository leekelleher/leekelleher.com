---
id: 281
title: How to convert NameValueCollection to a (Query) String
date: 2008-06-06T13:22:17+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=36
permalink: /2008/06/06/how-to-convert-namevaluecollection-to-a-query-string/
dsq_thread_id:
  - 1053590679
tags:
  - ASP.NET
  - 'C#'
  - code
  - QueryString
  - snippet
---

Most ASP.NET developers know that you can get a key/value pair string from the `Request.QueryString` object (via the `.ToString()` method). However that functionality isn't the same for a generic `NameValueCollection` object (of which `Request.QueryString` is derived from).

So how do you take a `NameValueCollection` object and get a nicely formatted key/value pair string? (i.e. "`key1=value1&key2=value2`") ... Here's a method I wrote a while ago:

```csharp
/// <summary>
/// Constructs a QueryString (string).
/// Consider this method to be the opposite of "System.Web.HttpUtility.ParseQueryString"
/// </summary>
public static string ConstructQueryString(NameValueCollection parameters)
{
	List<string> items = new List<string>();

	foreach (string name in parameters)
		items.Add(string.Concat(name, "=", System.Web.HttpUtility.UrlEncode(parameters[name])));

	return string.Join("&", items.ToArray());
}
```

Just in case you didn't know about the `System.Web.HttpUtility.ParseQueryString` method, it's a quick way of converting a query (key/value pairs) string back into a `NameValueCollection`.