title: "Accessing the jQuery DOM in an Ajax callback"
link: "http://leekelleher.com/2008/03/08/accessing-the-jquery-dom-in-an-ajax-callback/"
pubDate: "Sat, 08 Mar 2008 14:13:36 +0000"
guid: "http://leekelleher.wordpress.com/?p=14"
dc_creator: "leekelleher"
wp_post_id: 264
wp_post_date: "2008-03-08 14:13:36"
wp_post_date_gmt: "2008-03-08 14:13:36"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "accessing-the-jquery-dom-in-an-ajax-callback"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1056092774'
categories:
  - ajax: "ajax"
  - blog: "blog"
  - dom: "dom"
  - javascript: "javascript"
  - jquery: "jquery"
  - pez: "pez"

---

# Accessing the jQuery DOM in an Ajax callback

Whilst developing the admin pages for <a href="http://code.google.com/p/pez/">Pez</a>, I wanted to add some nice features to the UI.  My first choice for a JavaScript framework is <a href="http://jquery.com/">jQuery</a>.  I've used other frameworks before, (like <a href="http://mootools.net/">mootools</a>, <a href="http://script.aculo.us/">script.aculo.us</a> and <a href="http://developer.yahoo.com/yui/">YUI</a>), but I just seem to get on better with jQuery, (although mootools is a very close second).

Last night I was playing around with the <a href="http://docs.jquery.com/Ajax/jQuery.get">Ajax/jQuery.get()</a> method - it was the first time I'd used it, and was having some difficulty understanding how access the jQuery DOM object in the callback function.

At first I was taking the wrong approach, I was trying to do this all in the onClick event of an anchor link:
[sourcecode language='jscript']onclick="javascript:$.get('index.php', { key: $('#source-input-id').val() }, function(data){ $('#target-input-id').val(data); });"[/sourcecode]
But that didn't work ... and I'm not fully sure why ... but anyway, I carry on ...

I started to look at the <a href="http://remysharp.com/2007/04/12/jquerys-this-demystified/"><strong>this</strong></a> keyword to see if that would help. <a href="http://www.learningjquery.com/2007/08/what-is-this">Learning jQuery's <em>What is this?</em></a> post clarified a lot of my confusions, (in that with the Ajax callbacks, the <strong>this</strong> keyword/object is outside the jQuery DOM, but contains details of the call itself), however I was still no closer to the solution I wanted.

At this point I changed how I was using the <code><strong>$.get()</strong></code> method. I created a wrapper function for jQuery calls:
[sourcecode language='jscript']function get_value()
{
    $.get('index.php', { key: $('#source-input-id').val() }, function(data){
        $('#target-input-id').val(data);
    });
}[/sourcecode]
This approach meant that I could reference the jQuery DOM object from within the Ajax callback function.

There is probably a hundred other ways of doing this using jQuery - or could be even simpler with another JS framework - but I got it working nicely in the end... Happy Days!