---
title: History of "Our.Umbraco.*" package names
date: 2018-11-27T10:50:00+00:00
layout: post
permalink: /2018/11/history-of-our-umbraco-package-names/
tags:
  - Umbraco
  - Community
  - Package
  - Open Source
image: /assets/media/umb-collab.jpg
excerpt: Have you ever looked in your /bin folder and wondered why a bunch of Umbraco package assemblies are prefixed with "Our.Umbraco."? Let's find out about the history of that naming convention!
---

Earlier this year, [Callum asked the question](https://twitter.com/callumbwhyte/status/820641163334053889)&hellip;

> Can someone explain the history behind the "Our.Umbraco.X" naming convention for packages? It seems it's used by only a few now #umbraco

I [replied at the time](https://twitter.com/leekelleher/status/820727834536767488) - but felt an explanation longer than a couple of tweets would be nice, (and findable for future reference). I have a draft of this post sitting around for a while now, thought best to publish it!

<a href="https://www.flickr.com/photos/rikhelsen/6269167834/in/album-72157627950157764/" title="Umbraco community hacking"><img src="/assets/media/umb-collab.jpg" alt="IMG_4590"></a>

When I started to work with Umbraco, back in late 2007, my company was called **Bodenko**. When we developed any back-office features, they all ended up being bundled into a single project called **"Bodenko.Umbraco"** - this quickly became a dumping ground for all our extensions.

After getting more involved with the community, asking a lot of questions on the forum - and starting to answer some of them, I thought that I should really open-source the packages we'd developed at Bodenko. Our first was the [**Robots.txt Editor**](https://our.umbraco.com/packages/developer-tools/robotstxt-editor/) (which is surprisingly still popular today - and with very little updates to the original codebase) &hellip; I named the assembly **"Bodenko.Umbraco.RobotsTxtEditor"**.

In 2009, I'd parted ways with Bodenko to go as a solo freelancer, we dissolved the company. Around this time, I'd attended my first CodeGarden - where they'd launched the new forum&hellip; **Our Umbraco** - it was a very exciting time within the community. The Robots.txt Editor project was due a patch release (roll up of bug fixes), but when I reviewed the code, I felt that my old company name held little relevance to the package itself. There wasn't much point in using the package to "advertise" our old company and services. So, I looked to change it.

My company name for my freelance work was called **Vertino**, I could have swapped it with that, but that didn't feel quite right either. Around the same time, I'd noticed there were a few other newly released packages that contained a name/reference to the company that developed them, and it somewhat felt a little _anti-community_.

Rather than trying to come up with a new base part for my code's namespaces, I did a swap of **"Bodenko"** with **"Our"**. I still can't decide if that was a clever idea or I was being lazy - _probably the latter_.

I never envisaged this as trying to start a convention, then as I got involved with other established Umbraco packages, e.g. [Config Tree](https://our.umbraco.com/packages/developer-tools/config-tree/) and [Google Maps DataType](https://our.umbraco.com/packages/backoffice-extensions/google-maps-datatype/), with the agreement of their developers, we renamed the namespaces and assemblies over time.

Ironically, we never changed the [uComponents](https://our.umbraco.com/packages/backoffice-extensions/ucomponents/) namespace or assemblies - considering that at the time, that project was considered to be the _de facto_ Umbraco community project.

The idea was that these packages were **made by the Umbraco community, for the Umbraco community**.

Interestingly, I didn't push this naming convention much, but started to notice that some other package developers started to use it. It had become an unspoken guideline.

More recently, the packages that I've collaborated on with Matt Brailsford have generally come from working together at my company **Umbrella** (where Matt has freelanced with us). However, when we start coding and setting up namespaces, if we used **"Umbrella.Umbraco.*"** it didn't feel quite right. We knew from the start that certain back-office extensions have the potential to be released as fully-fledged Umbraco packages - we always start out with that mindset&hellip; **"for the community"**.

So, if you ever look in your website's `/bin` folder and see a bunch of "Our.Umbraco.*" assemblies, then you now know they were developed with the community in mind and are a sign of thoughtful, well-crafted Umbraco packages.
