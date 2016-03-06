title: "Populating multiple DropDownList controls with generic ListItem array"
link: "http://leekelleher.com/2008/11/24/populating-multiple-dropdownlist-controls-with-generic-listitem-array/"
pubDate: "Mon, 24 Nov 2008 12:19:24 +0000"
guid: "http://leekelleher.wordpress.com/?p=90"
dc_creator: "leekelleher"
wp_post_id: 291
wp_post_date: "2008-11-24 12:19:24"
wp_post_date_gmt: "2008-11-24 12:19:24"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "populating-multiple-dropdownlist-controls-with-generic-listitem-array"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1054583733'
categories:
  - array: "array"
  - aspnet: "ASP.NET"
  - blog: "blog"
  - c: "C#"
  - calendar: "calendar"
  - code: "code"
  - dates: "dates"
  - dropdownlist: "DropDownList"
  - generics: "generics"
  - listitem: "ListItem"

---

# Populating multiple DropDownList controls with generic ListItem array

I've just had some fun spending the last half-an-hour trying to figure out why when I used the <code>SelectedValue</code> property of a <code>DropDownList</code>, it also set the value of another <code>DropDownList</code> control.

Here's some background to the problem.  On my web-form, I have 2 fieldsets, one for a "Start Date", the other for an "End Date".  For each fieldset there are 3 <code>DropDownList</code>; Day, Month and Year.

Now rather than populating the values declaratively, using <code>&lt;asp:ListItem&gt;</code>; since the year values will need to be incremented annually. I opted to do this programmatically in the code-behind.

Here was my code (for the Day <code>DropDownList</code>):

[sourcecode language='csharp']List<ListItem> days = new List<ListItem>(32);
days.Add(new ListItem("Day", "-1"));
for (int i = 1; i <= 31; i++)
	days.Add(new ListItem(i.ToString(), i.ToString()));

// start date
ddlStartDateDay.Items.Clear();
ddlStartDateDay.Items.AddRange(days.ToArray());

// end date
ddlEndDateDay.Items.Clear();
ddlEndDateDay.Items.AddRange(days.ToArray());[/sourcecode]

So, whenever I tried to set the value of <code>ddlStartDateDay.SelectedValue</code>, the value of <code>ddlEndDateDay</code> would also change. <em>So frustrated!</em>

What I soon realised that when I was adding new <code>ListItem</code> objects to the <code>List&lt;ListItem&gt;</code>, it was creating a unique (internal) <code>ID</code> for each <code>ListItem</code>. Therefore when I was selecting the value for one <code>DropDownList</code>, it was selecting it across all <code>DropDownList</code> controls that contained that <code>ListItem</code>!

I've refactored my code to the following:

[sourcecode language='csharp']ddlStartDateDay.Items.Clear();
ddlEndDateDay.Items.Clear();

ddlStartDateDay.Items.Add(new ListItem("Day", "-1"));
ddlEndDateDay.Items.Add(new ListItem("Day", "-1"));

for (int i = 1; i <= 31; i++)
{
	ddlStartDateDay.Items.Add(new ListItem(i.ToString(), i.ToString()));
	ddlEndDateDay.Items.Add(new ListItem(i.ToString(), i.ToString()));
}[/sourcecode]

I'm not sure if there is any performance difference with this approach, I was just trying to use a single generic array (of <code>ListItem</code>) to populate multiple <code>DropDownList</code> controls.  Obviously, this has it's own drawbacks.