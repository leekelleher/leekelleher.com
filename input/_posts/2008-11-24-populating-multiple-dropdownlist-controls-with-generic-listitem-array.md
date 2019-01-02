---
id: 291
title: Populating multiple DropDownList controls with generic ListItem array
date: 2008-11-24T12:19:24+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=90
permalink: /2008/11/24/populating-multiple-dropdownlist-controls-with-generic-listitem-array/
dsq_thread_id:
  - 1054583733
tags:
  - array
  - ASP.NET
  - 'C#'
  - calendar
  - code
  - dates
  - DropDownList
  - generics
  - ListItem
---
I&#8217;ve just had some fun spending the last half-an-hour trying to figure out why when I used the `SelectedValue` property of a `DropDownList`, it also set the value of another `DropDownList` control.

Here&#8217;s some background to the problem.  On my web-form, I have 2 fieldsets, one for a "Start Date", the other for an "End Date".  For each fieldset there are 3 `DropDownList`; Day, Month and Year.

Now rather than populating the values declaratively, using `<asp:ListItem>`; since the year values will need to be incremented annually. I opted to do this programmatically in the code-behind.

Here was my code (for the Day `DropDownList`):

```csharp
List<ListItem> days = new List<ListItem>(32);
  
days.Add(new ListItem("Day", "-1"));
  
for (int i = 1; i <= 31; i++)
	days.Add(new ListItem(i.ToString(), i.ToString()));

// start date
ddlStartDateDay.Items.Clear();
ddlStartDateDay.Items.AddRange(days.ToArray());

// end date
ddlEndDateDay.Items.Clear();
ddlEndDateDay.Items.AddRange(days.ToArray());
```

So, whenever I tried to set the value of `ddlStartDateDay.SelectedValue`, the value of `ddlEndDateDay` would also change. _So frustrated!_

What I soon realised that when I was adding new `ListItem` objects to the `List<ListItem>`, it was creating a unique (internal) `ID` for each `ListItem`. Therefore when I was selecting the value for one `DropDownList`, it was selecting it across all `DropDownList` controls that contained that `ListItem`!

I&#8217;ve refactored my code to the following:

```csharp
ddlStartDateDay.Items.Clear();
ddlStartDateDay.Items.Add(new ListItem("Day", "-1"));

ddlEndDateDay.Items.Clear();
ddlEndDateDay.Items.Add(new ListItem("Day", "-1"));

for (int i = 1; i <= 31; i++)
{
	ddlStartDateDay.Items.Add(new ListItem(i.ToString(), i.ToString()));
	ddlEndDateDay.Items.Add(new ListItem(i.ToString(), i.ToString()));
}
```

I'm not sure if there is any performance difference with this approach, I was just trying to use a single generic array (of `ListItem`) to populate multiple `DropDownList` controls. Obviously, this has it&#8217;s own drawbacks.