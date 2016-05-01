---
id: 1376
title: 'uComponents: Days of Future Past'
date: 2014-03-25T23:31:58+00:00
author: leekelleher
layout: post
guid: http://leekelleher.com/?p=1376
permalink: /2014/03/25/ucomponents-futures-umbraco-7/
dsq_thread_id:
  - 2509993078
categories:
  - blog
tags:
  - AngularJS
  - Belle
  - uComponents
  - Umbraco
---
For a long time I have remained silent on the future of the uComponents project; please don&#8217;t mistake this for ignorance, it was not intentional. The truth is that it has been a struggle to lead the project through the transition from Umbraco v6 to v7 &#8230; and I&#8217;ve probably failed to do.

The ongoing dilemma of the uComponents project is two-fold: **where are we right now?** and **where are we heading?**

If you look at the history of Umbraco and uComponents, you can understand why the project became so important to the community. It was developed during a time when the Umbraco core team&#8217;s time, focus and energy were on v5.0 &#8211; leaving v4.7 in stalemate.  The community continued to use v4.7 and supported itself with a vibrant package ecosystem.  Enhancements and features that felt lacking from the v4.7 were cultivated in packages &#8211; from [MNTP](http://our.umbraco.org/projects/backoffice-extensions/ucomponents), to [DAMP](http://our.umbraco.org/projects/backoffice-extensions/digibiz-advanced-media-picker), [301 URL Tracker](http://our.umbraco.org/projects/developer-tools/301-url-tracker), to [Desktop Media Uploader](http://our.umbraco.org/projects/website-utilities/desktop-media-uploader) &#8211; looking back, that time felt like the **Golden Age of Umbraco Package Development**.

Upon the decision of putting [v5 to sleep](http://umbraco.com/follow-us/blog-archive/2012/6/13/v5-rip.aspx), the focus was back on the v4.x core and giving it more love &#8211; with this we moved several of the most popular features from uComponents into the Umbraco core (in v4.8). It was an exciting time in the project, as it spurred us to explore ideas and develop better data-types.

During the evolution of Umbraco v4.x to v6.x &#8211; we followed by example &#8211; using the new APIs where possible, exploring even more ideas &#8230; uComponents was in full flow.

In early 2013, it was announced that in v7, the back-office UI, (aka project **Belle**), would be redeveloped using the AngularJs framework.  The downside of this decision was that any (now legacy) data-types/property-editors (that used WebForms) would not be supported and backwards-compatibility broken.  (It&#8217;s not all doom and gloom &#8211; the new UI is much better).

This raised the question&#8230; what shall we do?  The knee-jerk reaction was to shout &#8220;_ANGULARJS-ify ALL THE UCOMPONENTS!_&#8220;, but this didn&#8217;t feel quite right.  Since the aim of the Belle UI project was to make a better content editing experience, the last thing I wanted us to do was carelessly rehash the same data-types for v7. I wanted us to have much more consideration, more craftsmanship.

I posted an open question on the Umbraco community forum &#8211; [What would you expect from uComponents in Umbraco 7?](http://our.umbraco.org/projects/backoffice-extensions/ucomponents/questionssuggestions/46392-uComponents-v7-Expectations)

A lot of the responses were saying that they wanted Multi-Node Tree Picker, Multi-Node Tree Picker and, oh, Multi-Node Tree Picker. Despite pointing out a few times that MNTP had been in the core since v4.8 and already had an equivalent property-editor in v7 core. Many of the other replies were words of encouragement and valuable feedback &#8211; which was great and very much appreciated, but I felt still no closer to _**what**_ uComponents should become.

The troublesome part of this indecision is that it has put uComponents into its own stalemate.  Our [last release](https://ucomponents.codeplex.com/releases/view/97718) was nearly 6 months ago &#8211; which is our longest period of inactivity &#8211; _this sucks!_

At this point in time, I feel that the viable options for uComponents future are:

  1. Release an Umbraco v7 compatible version of uComponents &#8211; this means all non-data-type components will work; but no new features/property-editors;
  2. Start a spin-off project (aka &#8220;nuComponents&#8221;) that only contains new (AngularJS) property-editors; also means would be a v1.0;
  3. Start to (slowly) add new (AngularJS) property-editors to the existing uComponents project/codebase; raises many questions of missing equivalent data-types/property-editors.

One of the beautiful parts of the original uComponents was that everything was available within a single assembly/DLL. This made deployments and upgrades very simple.  I&#8217;m not sure how this would work within the brave new AngularJS world?

I&#8217;m still very hopefully that uComponents will exist and flourish in future, but it needs your help.  If you want to get involved with the next version of uComponents, feel free to [get in touch](http://leekelleher.com/contact/), [tweet me](https://twitter.com/leekelleher), [check the Trello board](https://trello.com/b/drlQKsCF/v7-development), or [send a PR on GitHub](https://github.com/uComponents/uComponents/tree/dev-7.0.0).