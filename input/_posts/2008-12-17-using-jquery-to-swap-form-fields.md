---
id: 292
title: Using jQuery to swap form fields
date: 2008-12-17T19:47:48+00:00
author: leekelleher
layout: post
guid: http://blog.leekelleher.com/?p=93
permalink: /2008/12/17/using-jquery-to-swap-form-fields/
dsq_thread_id:
  - 1062356226
categories:
  - blog
tags:
  - code
  - HTML
  - javascript
  - jquery
---
Due to an technical decision early on in my project, the date-of-birth field on a profile edit page in a single text-input element.  My client would now like the date-of-birth to be 3 dropdown lists, (day, month and year).  The amount of work involved making changes to both the back and front ends would take at least a day. (It sounds a lot, but you know it would).

Here&#8217;s where a front-end developer&#8217;s best friend comes in&#8230; use [jQuery](http://jquery.com/) to:

  1. create the 3 dropdown lists
  2. hide the original text-input field
  3. update any changes [to the dropdown lists] back to the original text-input.

After 15 mins of building up the HTML output string in JavaScript, here&#8217;s the code:

<pre class="brush: jscript; title: ; notranslate" title="">$(document).ready(function()
{
	var $dob = $('input#ProfileEdit_DateOfBirth');
	if ($dob.length &gt; 0) {
		var dob = $dob.val().split('-', 3);
		var html = '&lt;select name="dob-day" id="dob-day" class="dob-date"&gt;';
		for(var i = 1; i &lt;= 31; i++){
			html += '&lt;option value="' + i + '"';
			if (dob&#91;2&#93; == i)
				html += ' selected="selected"';
			html += '&gt;' + i + '&lt;/option&gt;';
		}
		html += '&lt;/select&gt; ';

		var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
		html += '&lt;select name="dob-month" id="dob-month" class="dob-date"&gt;';
		for(var i = 1; i &lt;= 12; i++){
			html += '&lt;option value="' + i + '"';
			if (dob&#91;1&#93; == i)
				html += ' selected="selected"';
			html += '&gt;' + months[i - 1] + '&lt;/option&gt;';
		}
		html += '&lt;/select&gt; ';

		var thisYear = new Date().getFullYear();
		html += '&lt;select name="dob-year" id="dob-year" class="dob-date"&gt;';
		for(var i = (thisYear - 16); i &gt;= (thisYear - 90); i--){
			html += '&lt;option value="' + i + '"';
			if (dob&#91;0&#93; == i)
				html += ' selected="selected"';
			html += '&gt;' + i + '&lt;/option&gt;';
		}
		html += '&lt;/select&gt; ';

		$dob.after(html).css('display','none');

		$('select.dob-date').change(function(){
			$dob.val($('select#dob-year').val() + '-' + $('select#dob-month').val() + '-' + $('select#dob-day').val())
		});
	}
});</pre>

Any changes to the <select> elements trigger the jQuery .change() event, which are then updated back in the original text-input field.  The server-side code (in this case ASP.NET) is non the wiser.

So there you go, that&#8217;s my quick-n-dirty approach to using jQuery to swap form fields.