title: "uComponents: Days of Future Past"
link: "http://leekelleher.com/2014/03/25/ucomponents-futures-umbraco-7/"
pubDate: "Tue, 25 Mar 2014 23:31:58 +0000"
guid: "http://leekelleher.com/?p=1376"
dc_creator: "leekelleher"
wp_post_id: 1376
wp_post_date: "2014-03-25 23:31:58"
wp_post_date_gmt: "2014-03-25 23:31:58"
wp_comment_status: "open"
wp_ping_status: "closed"
wp_post_name: "ucomponents-futures-umbraco-7"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0dsq_thread_id: 2509993078
_edit_last: 2
categories:
  - angularjs: "AngularJS"
  - belle: "Belle"
  - blog: "blog"
  - ucomponents: "uComponents"
  - umbraco: "Umbraco"

---

# uComponents: Days of Future Past

For a long time I have remained silent on the future of the uComponents project; please don't mistake this for ignorance, it was not intentional. The truth is that it has been a struggle to lead the project through the transition from Umbraco v6 to v7 ... and I've probably failed to do.

The ongoing dilemma of the uComponents project is two-fold: <strong>where are we right now?</strong> and <strong>where are we heading?</strong>

If you look at the history of Umbraco and uComponents, you can understand why the project became so important to the community. It was developed during a time when the Umbraco core team's time, focus and energy were on v5.0 - leaving v4.7 in stalemate.  The community continued to use v4.7 and supported itself with a vibrant package ecosystem.  Enhancements and features that felt lacking from the v4.7 were cultivated in packages - from <a href="http://our.umbraco.org/projects/backoffice-extensions/ucomponents">MNTP</a>, to <a href="http://our.umbraco.org/projects/backoffice-extensions/digibiz-advanced-media-picker">DAMP</a>, <a href="http://our.umbraco.org/projects/developer-tools/301-url-tracker">301 URL Tracker</a>, to <a href="http://our.umbraco.org/projects/website-utilities/desktop-media-uploader">Desktop Media Uploader</a> - looking back, that time felt like the <strong>Golden Age of Umbraco Package Development</strong>.

Upon the decision of putting <a href="http://umbraco.com/follow-us/blog-archive/2012/6/13/v5-rip.aspx">v5 to sleep</a>, the focus was back on the v4.x core and giving it more love - with this we moved several of the most popular features from uComponents into the Umbraco core (in v4.8). It was an exciting time in the project, as it spurred us to explore ideas and develop better data-types.

During the evolution of Umbraco v4.x to v6.x - we followed by example - using the new APIs where possible, exploring even more ideas ... uComponents was in full flow.

In early 2013, it was announced that in v7, the back-office UI, (aka project <strong>Belle</strong>), would be redeveloped using the AngularJs framework.  The downside of this decision was that any (now legacy) data-types/property-editors (that used WebForms) would not be supported and backwards-compatibility broken.  (It's not all doom and gloom - the new UI is much better).

This raised the question... what shall we do?  The knee-jerk reaction was to shout "<em>ANGULARJS-ify ALL THE UCOMPONENTS!</em>", but this didn't feel quite right.  Since the aim of the Belle UI project was to make a better content editing experience, the last thing I wanted us to do was carelessly rehash the same data-types for v7. I wanted us to have much more consideration, more craftsmanship.

I posted an open question on the Umbraco community forum - <a href="http://our.umbraco.org/projects/backoffice-extensions/ucomponents/questionssuggestions/46392-uComponents-v7-Expectations">What would you expect from uComponents in Umbraco 7?</a>

A lot of the responses were saying that they wanted Multi-Node Tree Picker, Multi-Node Tree Picker and, oh, Multi-Node Tree Picker. Despite pointing out a few times that MNTP had been in the core since v4.8 and already had an equivalent property-editor in v7 core. Many of the other replies were words of encouragement and valuable feedback - which was great and very much appreciated, but I felt still no closer to <em><strong>what</strong></em> uComponents should become.

The troublesome part of this indecision is that it has put uComponents into its own stalemate.  Our <a href="https://ucomponents.codeplex.com/releases/view/97718">last release</a> was nearly 6 months ago - which is our longest period of inactivity - <em>this sucks!</em>

At this point in time, I feel that the viable options for uComponents future are:
<ol>
	<li>Release an Umbraco v7 compatible version of uComponents - this means all non-data-type components will work; but no new features/property-editors;</li>
	<li>Start a spin-off project (aka "nuComponents") that only contains new (AngularJS) property-editors; also means would be a v1.0;</li>
	<li>Start to (slowly) add new (AngularJS) property-editors to the existing uComponents project/codebase; raises many questions of missing equivalent data-types/property-editors.</li>
</ol>
One of the beautiful parts of the original uComponents was that everything was available within a single assembly/DLL. This made deployments and upgrades very simple.  I'm not sure how this would work within the brave new AngularJS world?

I'm still very hopefully that uComponents will exist and flourish in future, but it needs your help.  If you want to get involved with the next version of uComponents, feel free to <a href="http://leekelleher.com/contact/">get in touch</a>, <a href="https://twitter.com/leekelleher">tweet me</a>, <a href="https://trello.com/b/drlQKsCF/v7-development">check the Trello board</a>, or <a href="https://github.com/uComponents/uComponents/tree/dev-7.0.0">send a PR on GitHub</a>.