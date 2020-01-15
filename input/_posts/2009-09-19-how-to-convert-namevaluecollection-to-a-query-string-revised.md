---
id: 303
title: 'How to convert NameValueCollection to a (Query) String [Revised]'
date: 2009-09-19T23:08:34+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=171
permalink: /2009/09/19/how-to-convert-namevaluecollection-to-a-query-string-revised/
dsq_thread_id:
  - 1053988440
tags:
  - ASP.NET
  - 'C#'
  - code
  - QueryString
  - revised
  - snippet
---
Following on from a comment on my previous post about [converting a NameValueCollection to a (query) string](http://blog.leekelleher.com/2008/06/06/how-to-convert-namevaluecollection-to-a-query-string/#comment-148) &#8211; I have finally got around to revising my code snippet.  Now the method will handle same key multiple values, (it no longer comma-separates them).

I have also added extra parameters so that you can define your own delimiter (since the [HTTP specification](http://en.wikipedia.org/wiki/Query_string#Structure) says that you can use both ampersands `&` and semicolons `;`) and there is an option for omitting keys with empty values.

```csharp
/// <summary>
/// Constructs a NameValueCollection into a query string.
/// </summary>
/// <remarks>Consider this method to be the opposite of "System.Web.HttpUtility.ParseQueryString"</remarks>
/// <param name="parameters">The NameValueCollection</param>
/// <param name="delimiter">The String to delimit the key/value pairs</param>
/// <returns>A key/value structured query string, delimited by the specified String</returns>
public static String ConstructQueryString(NameValueCollection parameters, String delimiter, Boolean omitEmpty)
{
	if (String.IsNullOrEmpty(delimiter))
		delimiter = "&";

	Char equals = '=';
	List<String> items = new List<String>();

	for (int i = 0; i < parameters.Count; i++)
	{
		foreach (String value in parameters.GetValues(i))
		{
			Boolean addValue = (omitEmpty) ? !String.IsNullOrEmpty(value) : true;
			if (addValue)
				items.Add(String.Concat(parameters.GetKey(i), equals, HttpUtility.UrlEncode(value)));
		}
	}

	return String.Join(delimiter, items.ToArray());
}
```