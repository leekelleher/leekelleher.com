---
title: "Elegant Objects by Yegor Bugayenko"
date: 2016-10-06T19:23:27+01:00
layout: post
permalink: /2016/10/book-review-elegant-objects-vol1/
tags:
  - Books
  - Code
image: /assets/media/elegant-objects.jpg
---

At last month's [Code Cabin](http://codecab.in), I was chatting with [Steve Temple](https://twitter.com/Steve_Gibe) about [Ditto](https://github.com/leekelleher/umbraco-ditto) and best coding practices, he suggested that I read [Elegant Objects by Yegor Bugayenko](http://amzn.to/2cNuLHF), as it made him think totally differently about object-oriented programming.

![Lee with Elegant Objects book](/assets/media/elegant-objects.jpg)

Looking around [Yegor's blog](http://www.yegor256.com/), I liked his ideas, so I ordered the book ... I even noticed a small CSS bug on his blog and [submitted a fix](https://github.com/yegor256/blog/pull/133) for it. **I do love open-source!**

A day or so later the book arrived and I couldn't put it down. The blurb on the cover says it all...

> TL;DR There are 23 practical recommendations for object-oriented programmers. Most of them are completely against everything you've read in other books. For example, static methods, NULL references, getters, setters, and mutable classes are called evil.

I started coding with BASIC (on a Spectrum 48K) as a kid, then "professionally" as a web-developer since 2000 doing Classic ASP/VBScript. The vast majority of my coding comes from a procedural background, I knew I had bad habits when doing OOP, but _oh boy_, whilst reading the book I had no idea how much I was "doing it wrong".

The book has many principles that I agreed with in theory, but I wasn't sure how I would practically apply them. The majority of the development I do is with C#/.NET and Umbraco CMS implementations, where most of the anti-patterns (as outlined in the book - such as returning `null` object values) are a common occurrence.

Given the insight into how to develop clean, maintainable object-oriented code, I feel that I can at least improve on my own application and library code.

If you are an open-minded developer, who is looking for new and thought provoking ideas, I would definitely recommend this book.

---

Volume 2 of Elegant Objects is due out at the end of the year, [see Yegor's website for updates](http://www.yegor256.com/elegant-objects.html).

[![Elegant Objects book cover](https://ws-eu.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=1519166915&Format=_SL250_&ID=AsinImage&MarketPlace=GB&ServiceVersion=20070822&WS=1&tag=leekelleher-21)](http://amzn.to/2cNuLHF)
