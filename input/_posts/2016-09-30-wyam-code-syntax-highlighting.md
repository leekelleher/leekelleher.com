---
title: "Code Syntax Highlighting in Wyam"
date: 2016-09-30T00:46:00+01:00
layout: post
permalink: /2016/09/wyam-code-syntax-highlighting/
tags:
  - Wyam
  - Code
---

I'd been going back and forth on how I should handle the syntax highlighting of my blog's code snippets. A popular choice would be to use a JavaScript library, (such as [Prettify](https://github.com/google/code-prettify) or [Prism](http://prismjs.com/)). I have nothing against those libraries, but in the pursuit of making my website fast and lightweight, I wanted a non-JavaScript option.  My idea was to use a .NET library to convert my source-code snippets into colourised markup.

The only library that I knew of (in .NET land) was [ColorCode](https://colorcode.codeplex.com/). CodePlex use for their source-code highlighting, _so it should be stable_, but it hasn't been updated in a few years, _so fingers crossed!_

My next step was to figure out how to make this happen in [Wyam](http://wyam.io).  Now, Wyam is a very versatile generator, there are many ways this problem could be tackled... it should be a simple search & replace, right? Alas, after a couple of hours hacking around, I wasn't getting anywhere, _I was stumpted!_

Heading over to the [Wyam chat room on Gitter](https://gitter.im/Wyamio/Wyam), I wanted to see if anyone had any ideas for this. There was a suggestion of treating my code snippets as assets, cross-referencing and pulling them in at build-time. But that would require making structural changes to my blog, which I'd rather not at this juncture.

Then [Dave Glick](http://daveaglick.com/) had an idea... _he claims to have been [Nerd Snippered](https://xkcd.com/356/)_ ... and he was away, updating code, released a new version of Wyam, and wrote a blog post. *I was presented with a solution!* _Thanks again Dave!_

If you want to know more about it, read about all the ways you can do [Syntax Highlighting in Wyam](http://daveaglick.com/posts/syntax-highlighting-in-wyam).
