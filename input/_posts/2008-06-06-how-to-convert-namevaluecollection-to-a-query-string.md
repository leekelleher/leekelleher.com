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
categories:
  - blog
tags:
  - ASP.NET
  - 'C#'
  - code
  - QueryString
  - snippet
---
Most ASP.NET developers know that you can get a key/value pair string from the `Request.QueryString` object (via the `.ToString()` method). However that functionality isn&#8217;t the same for a generic `NameValueCollection` object (of which `Request.QueryString` is derived from).

So how do you take a `NameValueCollection` object and get a nicely formatted key/value pair string? (i.e. &#8220;`key1=value1&key2=value2`&#8220;) &#8230; Here&#8217;s a method I wrote a while ago:

<pre class="brush: csharp; title: ; notranslate" title="">/// &lt;summary&gt;
/// Constructs a QueryString (string).
/// Consider this method to be the opposite of "System.Web.HttpUtility.ParseQueryString"
/// &lt;/summary&gt;
/// &lt;param name="nvc"&gt;NameValueCollection&lt;/param&gt;
/// &lt;returns&gt;String&lt;/returns&gt;
public static String ConstructQueryString(NameValueCollection parameters)
{
	List&lt;String&gt; items = new List&lt;String&gt;();

	foreach (String name in parameters)
		items.Add(String.Concat(name, "=", System.Web.HttpUtility.UrlEncode(parameters[name])));

	return String.Join("&", items.ToArray());
}</pre>

Just in case you didn&#8217;t know about the `System.Web.HttpUtility.ParseQueryString` method, it&#8217;s a quick way of converting a query (key/value pairs) string back into a `NameValueCollection`.