---
id: 1038
title: Deploying complex Property Editors (Archetype) with Umbraco Courier on UaaS
date: 2014-03-20T22:41:45+00:00
author: leekelleher
layout: post
guid: http://leekelleher.com/?p=1038
permalink: /2014/03/20/deploying-complex-property-editors-archetype-with-umbraco-courier-on-uaas/
dsq_thread_id:
  - 2472408903
categories:
  - blog
tags:
  - Archetype
  - Courier
  - DataResolvers
  - UaaS
  - uComponents
  - uHangout
  - Umbraco
  - Umbrella
---
_TL;DR;_ I wrote a Courier DataResolver for the Archetype property-editor. The code is currently only [available on GitHub](https://github.com/leekelleher/Archetype.Courier) and has only been tested against Umbraco-as-a-Service.

<!--more-->

* * *

We&#8217;re very fortunate that with our latest project at [Umbrella](http://www.umbrellainc.co.uk/) we are getting to develop with cutting-edge Umbraco technologies: [Umbraco v7](http://our.umbraco.org/download), [Umbraco as a Service](https://www.umbraco.io) (UaaS) and the [Archetype property-editor](http://imulus.github.io/Archetype/).

If you haven&#8217;t yet heard about UaaS yet, then be sure to catch-up with the recent [uHangout episode where Niels Hartvig explains all](https://plus.google.com/u/0/events/cqfvk55ami6fio1norg3apjgs58).

Initially starting development with v7 was quite daunting, as with my past experience of v4/v6 I had a wealth of data-types and packages at my disposal; the most vital one being [uComponents](http://ucomponents.org)! What would I do without the Multi-UrlPicker?! _Enter Archetype!_

In a nutshell, [Archetype](http://our.umbraco.org/projects/backoffice-extensions/archetype) is a new v7 property-editor that wraps around other data-types. This can either be as a single fieldset or grouped into multiple fieldsets. If you&#8217;re familiar with [DataType Grid](http://ucomponents.org/data-types/datatype-grid/), or Embedded Content &#8211; it&#8217;s like those, but made with tiger blood!  Check out [Kevin Giszewski&#8217;s video demo showcasing Archetype&#8217;s features](http://www.youtube.com/watch?v=R7l-QKSDZgM).<a dir="ltr" href="https://www.youtube.com/user/gizmogeekstv" data-sessionlink="feature=watch&ei=XFgrU-P-MMjI0QXoo4DQAw" data-ytid="UChlB-wD_eeXZkDkCUjcn1pw" data-name="watch"><br /> </a>

Here&#8217;s an example of how we&#8217;re using Archetype as a pseudo Multi-UrlPicker on our Umbraco website:

<p style="text-align: center;">
  <a href="http://leekelleher.com/wordpress/wp-content/uploads/2014/03/archetype-multi-urlpicker.png"><img class="aligncenter  wp-image-1327" src="http://leekelleher.com/wordpress/wp-content/uploads/2014/03/archetype-multi-urlpicker.png" alt="archetype-multi-urlpicker" width="100%" srcset="http://leekelleher.com/wordpress/wp-content/uploads/2014/03/archetype-multi-urlpicker-300x105.png 300w, http://leekelleher.com/wordpress/wp-content/uploads/2014/03/archetype-multi-urlpicker-1024x360.png 1024w, http://leekelleher.com/wordpress/wp-content/uploads/2014/03/archetype-multi-urlpicker.png 1199w" sizes="(max-width: 1199px) 100vw, 1199px" /></a>
</p>

We found this works well and our content editors are happy with the interface.

All was well and good in our local development environment, then when we pushed our content changes up to our UaaS environment &#8212; we hit major issues with the node Id values inside our Archetype&#8217;s nested Content Pickers!

For those of you who have done team-development and multi-environment deployments with Umbraco may have experienced a similar situation; this usually leads to a lot of swearing and tearing out hair!

_&#8220;Now! Have no fear. Have no fear!&#8221; said the cat.&#8221;_  There is a solution and it&#8217;s name **Courier**!

At this point, I have to admit that my past experience with Courier had been pretty hit & miss &#8212; sometimes it worked, sometimes it failed. Looking back I think maybe I&#8217;d expected too much from it.

Since Courier is one of the underpinning features of UaaS, I thought it wise to wipe the slate clean, let&#8217;s put the past behind us!

I read up about [Courier&#8217;s DataResolvers](https://github.com/umbraco/Courier/blob/master/Documentation/Developer%20Documentation/Data%20Resolvers.md) and how to develop one for your own property-editor &#8212; from packing up a data-type&#8217;s prevalue options to extracting a content node&#8217;s property value.

The key point to remember, is that whenever you have a custom property-editor that can store a node Id (of any type &#8211; Content, Media, etc), you should consider developing a Courier DataResolver for it.  _I wish that someone had told me this during our main uComponents development!_

Due to the complex nature of Archetype, the DataResolver needed to handle both the prevalue options and the node&#8217;s property values.  The prevalue options were easy to resolve, as I knew these only referenced other data-type Ids.  The node&#8217;s property values were much more trickier, as these could potentially reference **_**any**_\*\* node type (e.g. Content, Media, etc) and use \*\*_**any**_** type of data structure (e.g. JSON, XML, etc).

I had to think of a smart solution.

OK, so here&#8217;s the part where I moan about Courier being closed-source and not being able to dig into the API _&#8230; yadda, yadda, yadda &#8230;_ ultimately I said hello to my old friend .NET Reflector and cracked open the assemblies. (_I probably broke a license agreement in doing this &#8211; apologies! My motive was knowledge, not profit._)

From the assemblies I investigated how the `ResolutionManager` worked &#8211; this was key as I wanted to use it to pass the inner/nested values from an Archetype to it &#8211; meaning that Courier itself would attempt to resolve any node Ids!  _Happy days!_   (This even applied to any Archetypes that were nested within an Archetype &#8230; _think about that for a minute._)

* * *

If you are interested in seeing [the full source-code for the Archetype DataResolver, it is available on my GitHub repository](https://github.com/imulus/Archetype/blob/master/app/Umbraco/Archetype.Courier/DataResolvers/ArchetypeDataResolver.cs).

For other [examples of DataResolvers, there are examples on Umbraco&#8217;s Courier repository](https://github.com/umbraco/Courier/tree/master/Providers/Umbraco.Courier.DataResolvers) &#8211; yup, it&#8217;s not all closed-source! ;-)