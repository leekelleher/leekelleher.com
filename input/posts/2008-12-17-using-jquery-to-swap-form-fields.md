title: "Using jQuery to swap form fields"
link: "http://leekelleher.com/2008/12/17/using-jquery-to-swap-form-fields/"
pubDate: "Wed, 17 Dec 2008 19:47:48 +0000"
guid: "http://blog.leekelleher.com/?p=93"
dc_creator: "leekelleher"
wp_post_id: 292
wp_post_date: "2008-12-17 19:47:48"
wp_post_date_gmt: "2008-12-17 19:47:48"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "using-jquery-to-swap-form-fields"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1062356226'
categories:
  - blog: "blog"
  - code: "code"
  - html-2: "HTML"
  - javascript: "javascript"
  - jquery: "jquery"

---

# Using jQuery to swap form fields

Due to an technical decision early on in my project, the date-of-birth field on a profile edit page in a single text-input element.  My client would now like the date-of-birth to be 3 dropdown lists, (day, month and year).  The amount of work involved making changes to both the back and front ends would take at least a day. (It sounds a lot, but you know it would).

Here's where a front-end developer's best friend comes in... use <a href="http://jquery.com/">jQuery</a> to:
<ol>
	<li>create the 3 dropdown lists</li>
	<li>hide the original text-input field</li>
	<li>update any changes [to the dropdown lists] back to the original text-input.</li>
</ol>
After 15 mins of building up the HTML output string in JavaScript, here's the code:

[sourcecode language='jscript']$(document).ready(function()
{
	var $dob = $('input#ProfileEdit_DateOfBirth');
	if ($dob.length > 0) {
		var dob = $dob.val().split('-', 3);
		var html = '<select name="dob-day" id="dob-day" class="dob-date">';
		for(var i = 1; i <= 31; i++){
			html += '<option value="' + i + '"';
			if (dob[2] == i)
				html += ' selected="selected"';
			html += '>' + i + '</option>';
		}
		html += '</select> ';

		var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
		html += '<select name="dob-month" id="dob-month" class="dob-date">';
		for(var i = 1; i <= 12; i++){
			html += '<option value="' + i + '"';
			if (dob[1] == i)
				html += ' selected="selected"';
			html += '>' + months[i - 1] + '</option>';
		}
		html += '</select> ';

		var thisYear = new Date().getFullYear();
		html += '<select name="dob-year" id="dob-year" class="dob-date">';
		for(var i = (thisYear - 16); i >= (thisYear - 90); i--){
			html += '<option value="' + i + '"';
			if (dob[0] == i)
				html += ' selected="selected"';
			html += '>' + i + '</option>';
		}
		html += '</select> ';

		$dob.after(html).css('display','none');

		$('select.dob-date').change(function(){
			$dob.val($('select#dob-year').val() + '-' + $('select#dob-month').val() + '-' + $('select#dob-day').val())
		});
	}
});[/sourcecode]

Any changes to the &lt;select&gt; elements trigger the jQuery .change() event, which are then updated back in the original text-input field.  The server-side code (in this case ASP.NET) is non the wiser.

So there you go, that's my quick-n-dirty approach to using jQuery to swap form fields.