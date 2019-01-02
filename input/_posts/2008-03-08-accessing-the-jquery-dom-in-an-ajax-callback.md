---
id: 264
title: Accessing the jQuery DOM in an Ajax callback
date: 2008-03-08T14:13:36+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=14
permalink: /2008/03/08/accessing-the-jquery-dom-in-an-ajax-callback/
dsq_thread_id:
  - 1056092774
tags:
  - ajax
  - dom
  - javascript
  - jquery
  - pez
---
Whilst developing the admin pages for [Pez](http://code.google.com/p/pez/), I wanted to add some nice features to the UI. My first choice for a JavaScript framework is [jQuery](http://jquery.com/). I&#8217;ve used other frameworks before, (like [mootools](http://mootools.net/), [script.aculo.us](http://script.aculo.us/) and [YUI](http://developer.yahoo.com/yui/)), but I just seem to get on better with jQuery, (although mootools is a very close second).

Last night I was playing around with the [Ajax/jQuery.get()](http://docs.jquery.com/Ajax/jQuery.get) method &#8211; it was the first time I&#8217;d used it, and was having some difficulty understanding how access the jQuery DOM object in the callback function.

At first I was taking the wrong approach, I was trying to do this all in the onClick event of an anchor link:

<pre class="brush: jscript; title: ; notranslate" title="">onclick="javascript:$.get('index.php', { key: $('#source-input-id').val() }, function(data){ $('#target-input-id').val(data); });"</pre>

But that didn&#8217;t work &#8230; and I&#8217;m not fully sure why &#8230; but anyway, I carry on &#8230;

I started to look at the [**this**](http://remysharp.com/2007/04/12/jquerys-this-demystified/) keyword to see if that would help. [Learning jQuery&#8217;s _What is this?_](http://www.learningjquery.com/2007/08/what-is-this) post clarified a lot of my confusions, (in that with the Ajax callbacks, the **this** keyword/object is outside the jQuery DOM, but contains details of the call itself), however I was still no closer to the solution I wanted.

At this point I changed how I was using the `<strong>$.get()</strong>` method. I created a wrapper function for jQuery calls:

<pre class="brush: jscript; title: ; notranslate" title="">function get_value()
{
    $.get('index.php', { key: $('#source-input-id').val() }, function(data){
        $('#target-input-id').val(data);
    });
}</pre>

This approach meant that I could reference the jQuery DOM object from within the Ajax callback function.

There is probably a hundred other ways of doing this using jQuery &#8211; or could be even simpler with another JS framework &#8211; but I got it working nicely in the end&#8230; Happy Days!