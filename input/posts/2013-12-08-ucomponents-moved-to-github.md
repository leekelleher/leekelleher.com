title: "uComponents: Moved to GitHub"
link: "http://leekelleher.com/2013/12/08/ucomponents-moved-to-github/"
pubDate: "Sun, 08 Dec 2013 22:38:17 +0000"
guid: "http://leekelleher.com/?p=748"
dc_creator: "leekelleher"
wp_post_id: 748
wp_post_date: "2013-12-08 22:38:17"
wp_post_date_gmt: "2013-12-08 22:38:17"
wp_comment_status: "open"
wp_ping_status: "closed"
wp_post_name: "ucomponents-moved-to-github"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '2036344333'
categories:
  - blog: "blog"
  - codeplex: "CodePlex"
  - github: "GitHub"
  - hg: "Hg"
  - mercurial: "Mercurial"
  - ucomponents: "uComponents"
  - umbraco: "Umbraco"

---

# uComponents: Moved to GitHub

Hey uComponents fans, a little status update on our version control repository move from CodePlex over to GitHub. We'd been talking about moving over to GitHub for a long time, (even before Umbraco core moved over), but the timing was never right - either we were in the middle of a major release or our day-job workloads were in high demand.  Luckily since our own v6.0.0 release, we have found the time to make the move!

The new repository is currently hosted on my personal account - <a href="https://github.com/leekelleher/uComponents">https://github.com/leekelleher/uComponents</a> - but once this has been stabilised, I will relocated it the main <a href="https://github.com/uComponents">uComponents organisation</a> account.

<strong><span style="text-decoration: underline;">Update:</span> The repository has now been moved to the organisation account: <a href="https://github.com/uComponents/uComponents">https://github.com/uComponents/uComponents</a></strong>

For those who are interested in how I migrated from our Mercurial (Hg) repository on CodePlex over to Git; we used <a href="http://hg-git.github.io/">the Hg-Git mercurial plugin</a> to handle the main bulk of the conversion. The initial set-up had some tricky parts, mostly around installing a specific version of Python (v2.6.6) and the Dulwich library (v0.8.0+). But once configured, it all works very well.

The biggest issue I had was trying to map the commit authors with their corresponding GitHub accounts. There are various blog posts on how to generate an "<a href="https://github.com/schacon/hg-git#gitauthors">AUTHORS.TXT</a>" file that will map users/emails, but I ended up using the following Hg command to get a list of the authors from all the commits/changesets.
<pre class="brush: bash; gutter: false">hg log --template &quot;{author} = {author} rn&quot; &gt; AUTHORS.TXT</pre>
The output from this gave me a huge list of usernames/email addresses.  I used a feature in Notepad++'s TextFX Tools to sort and de-duplicate the lines.  From there I found the corresponding GitHub email addresses (this wasn't pretty either - you're on your own here).  Then I wired up hg-git's <a href="https://github.com/schacon/hg-git#gitauthors"><strong>git.author</strong></a> option to use the AUTHORS.TXT for the mapping.

The rest of the move to GitHub has gone successfully.  We still need to agree on a better branching structure/workflow, as the one we've been using for the past few years has worked well, we feel that it is off-putting to newcomers.  We are currently looking at using <a href="http://nvie.com/posts/a-successful-git-branching-model/">git-flow</a>, but are still open to any other suggestions.