---
id: 273
title: Posting source code on WordPress.com
date: 2008-04-23T09:55:07+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=26
permalink: /2008/04/23/posting-source-code-on-wordpresscom/
dsq_thread_id:
  - 1055344502
categories:
  - blog
tags:
  - code
  - short code
  - snippet
  - source
  - WordPress
---
I feel like a complete n00b &#8230; I&#8217;ve only just found out how to mark-up source-code snippets on WordPress.com

It&#8217;s in their FAQs: [**How do I post source code?**](http://faq.wordpress.com/2007/09/03/how-do-i-post-source-code/)

Essentially you use the short-code: `<strong>[</strong><strong>sourcecode language='css']...[/sourcecode</strong><strong>]</strong>`

Here&#8217;s an example:

<pre class="brush: csharp; title: ; notranslate" title="">// A "Hello World!" program in C#
class Hello
{
   static void Main()
   {
      System.Console.WriteLine("Hello World!");
   }
}</pre>

I knew about WP.org plugins that did this, but I&#8217;ve been scratching my head on how do this on WP.com for ages now!