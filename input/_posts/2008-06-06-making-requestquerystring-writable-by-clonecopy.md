---
id: 280
title: Making Request.QueryString writable (by clone/copy)
date: 2008-06-06T13:09:31+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=35
permalink: /2008/06/06/making-requestquerystring-writable-by-clonecopy/
dsq_thread_id:
  - 1056051575
categories:
  - blog
tags:
  - ASP.NET
  - 'C#'
  - code
  - QueryString
  - snippet
---
Every now and then I completely forget that the `Request.QueryString` (and `Request.Form`) object is read-only. Today I had a bit of functionality where I needed to remove a key/value from the collection &#8211; but the `Remove()` method (of the `NameValueCollection` object) throws an exception.

Unfortunately, the `Request.QueryString`&#8216;s `CopyTo` method assigns the values to an `ARRAY`, not a `NameValueCollection` &#8211; losing functionality and flexibility.

You need to copy the `Request.QueryString` object to a new `NameValueCollection` instance, here&#8217;s how:

<pre class="brush: csharp; title: ; notranslate" title="">NameValueCollection qs = new NameValueCollection(Request.QueryString);</pre>

Now you can add/remove the key/values to your hearts content!

Oh, yeah, remember to import the `System.Collections.Specialized` namespace too!