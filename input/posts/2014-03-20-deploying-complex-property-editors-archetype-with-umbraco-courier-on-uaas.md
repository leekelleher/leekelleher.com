title: "Deploying complex Property Editors (Archetype) with Umbraco Courier on UaaS"
link: "http://leekelleher.com/2014/03/20/deploying-complex-property-editors-archetype-with-umbraco-courier-on-uaas/"
pubDate: "Thu, 20 Mar 2014 22:41:45 +0000"
guid: "http://leekelleher.com/?p=1038"
dc_creator: "leekelleher"
wp_post_id: 1038
wp_post_date: "2014-03-20 22:41:45"
wp_post_date_gmt: "2014-03-20 22:41:45"
wp_comment_status: "open"
wp_ping_status: "closed"
wp_post_name: "deploying-complex-property-editors-archetype-with-umbraco-courier-on-uaas"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '2472408903'
categories:
  - archetype: "Archetype"
  - blog: "blog"
  - courier: "Courier"
  - dataresolvers: "DataResolvers"
  - uaas: "UaaS"
  - ucomponents: "uComponents"
  - uhangout: "uHangout"
  - umbraco: "Umbraco"
  - umbrella: "Umbrella"

---

# Deploying complex Property Editors (Archetype) with Umbraco Courier on UaaS

<em>TL;DR;</em> I wrote a Courier DataResolver for the Archetype property-editor. The code is currently only <a href="https://github.com/leekelleher/Archetype.Courier">available on GitHub</a> and has only been tested against Umbraco-as-a-Service.

<!--more-->

<hr />

We're very fortunate that with our latest project at <a href="http://www.umbrellainc.co.uk/">Umbrella</a> we are getting to develop with cutting-edge Umbraco technologies: <a href="http://our.umbraco.org/download">Umbraco v7</a>, <a href="https://www.umbraco.io">Umbraco as a Service</a> (UaaS) and the <a href="http://imulus.github.io/Archetype/">Archetype property-editor</a>.

If you haven't yet heard about UaaS yet, then be sure to catch-up with the recent <a href="https://plus.google.com/u/0/events/cqfvk55ami6fio1norg3apjgs58">uHangout episode where Niels Hartvig explains all</a>.

Initially starting development with v7 was quite daunting, as with my past experience of v4/v6 I had a wealth of data-types and packages at my disposal; the most vital one being <a href="http://ucomponents.org">uComponents</a>! What would I do without the Multi-UrlPicker?! <em>Enter Archetype!</em>

In a nutshell, <a href="http://our.umbraco.org/projects/backoffice-extensions/archetype">Archetype</a> is a new v7 property-editor that wraps around other data-types. This can either be as a single fieldset or grouped into multiple fieldsets. If you're familiar with <a href="http://ucomponents.org/data-types/datatype-grid/">DataType Grid</a>, or Embedded Content - it's like those, but made with tiger blood!  Check out <a href="http://www.youtube.com/watch?v=R7l-QKSDZgM">Kevin Giszewski's video demo showcasing Archetype's features</a>.<a dir="ltr" href="https://www.youtube.com/user/gizmogeekstv" data-sessionlink="feature=watch&amp;ei=XFgrU-P-MMjI0QXoo4DQAw" data-ytid="UChlB-wD_eeXZkDkCUjcn1pw" data-name="watch">
</a>

Here's an example of how we're using Archetype as a pseudo Multi-UrlPicker on our Umbraco website:
<p style="text-align: center;"><a href="http://leekelleher.com/wordpress/wp-content/uploads/2014/03/archetype-multi-urlpicker.png"><img class="aligncenter  wp-image-1327" src="http://leekelleher.com/wordpress/wp-content/uploads/2014/03/archetype-multi-urlpicker.png" alt="archetype-multi-urlpicker" width="100%" /></a></p>
We found this works well and our content editors are happy with the interface.

All was well and good in our local development environment, then when we pushed our content changes up to our UaaS environment -- we hit major issues with the node Id values inside our Archetype's nested Content Pickers!

For those of you who have done team-development and multi-environment deployments with Umbraco may have experienced a similar situation; this usually leads to a lot of swearing and tearing out hair!

<em>"Now! Have no fear. Have no fear!" said the cat."</em>  There is a solution and it's name <strong>Courier</strong>!

At this point, I have to admit that my past experience with Courier had been pretty hit &amp; miss -- sometimes it worked, sometimes it failed. Looking back I think maybe I'd expected too much from it.

Since Courier is one of the underpinning features of UaaS, I thought it wise to wipe the slate clean, let's put the past behind us!

I read up about <a href="https://github.com/umbraco/Courier/blob/master/Documentation/Developer%20Documentation/Data%20Resolvers.md">Courier's DataResolvers</a> and how to develop one for your own property-editor -- from packing up a data-type's prevalue options to extracting a content node's property value.

The key point to remember, is that whenever you have a custom property-editor that can store a node Id (of any type - Content, Media, etc), you should consider developing a Courier DataResolver for it.  <em>I wish that someone had told me this during our main uComponents development!</em>

Due to the complex nature of Archetype, the DataResolver needed to handle both the prevalue options and the node's property values.  The prevalue options were easy to resolve, as I knew these only referenced other data-type Ids.  The node's property values were much more trickier, as these could potentially reference **<em><strong>any</strong></em>** node type (e.g. Content, Media, etc) and use **<em><strong>any</strong></em>** type of data structure (e.g. JSON, XML, etc).

I had to think of a smart solution.

OK, so here's the part where I moan about Courier being closed-source and not being able to dig into the API <em>... yadda, yadda, yadda ...</em> ultimately I said hello to my old friend .NET Reflector and cracked open the assemblies. (<em>I probably broke a license agreement in doing this - apologies! My motive was knowledge, not profit.</em>)

From the assemblies I investigated how the <code>ResolutionManager</code> worked - this was key as I wanted to use it to pass the inner/nested values from an Archetype to it - meaning that Courier itself would attempt to resolve any node Ids!  <em>Happy days!</em>   (This even applied to any Archetypes that were nested within an Archetype ... <em>think about that for a minute.</em>)

<hr />

If you are interested in seeing <a href="https://github.com/imulus/Archetype/blob/master/app/Umbraco/Archetype.Courier/DataResolvers/ArchetypeDataResolver.cs">the full source-code for the Archetype DataResolver, it is available on my GitHub repository</a>.

For other <a href="https://github.com/umbraco/Courier/tree/master/Providers/Umbraco.Courier.DataResolvers">examples of DataResolvers, there are examples on Umbraco's Courier repository</a> - yup, it's not all closed-source! ;-)