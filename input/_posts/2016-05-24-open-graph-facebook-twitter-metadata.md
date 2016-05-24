---
title: "Open Graph: Facebook and Twitter Cards metadata"
date: 2016-05-24T22:35:00+00:00
layout: post
permalink: /2016/05/open-graph-facebook-twitter-metadata/
tags:
  - Metadata
  - Open Graph
  - Facebook
  - Twitter
---

One of the motivators for going "[back to basics](/2016/03/back-to-basics/)" on my blog was to focus on the markup semantics and laying a solid foundation.

Given one of the main powers of the Open Web is the ability to link and share content, I wanted to get my metadata in a workable state.

I've known about Open Graph for a few years, professionally I make sure that my client's websites leverage it - but the funny part is that I never implemented it on my own blog.... _until now!_

I followed the various implementation guides for the various "standards", ala [Open Graph Protocal](http://ogp.me/) and [Twitter Cards](https://dev.twitter.com/cards/overview), etc. But I ended up with a whole lot of metadata in my `<head>`, (or as it is more affectionately known, [**metacrap**](http://www.well.com/~doctorow/metacrap.htm)).

Luckily I'd spotted a post by Jeremy Keith that tackles the [Metadata markup](https://adactio.com/journal/9881) bloat, by merging and combining the `<meta>` tags with the various "standards" using different attributes.

Here's an example of this post...

```html
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@leekelleher">
<meta name="twitter:url" property="og:url" content="http://leekelleher.com/2016/05/open-graph-facebook-twitter-metadata/">
<meta name="twitter:title" property="og:title" content="Open Graph: Facebook and Twitter Cards metadata">
<meta name="twitter:description" property="og:description" content="One of the motivators for going ...">
<meta name="twitter:image" property="og:image" content="http://leekelleher.com/assets/img/northbynorthwest_300x300.jpg">
```

> _Whoah, metadata about a post about metadata!_