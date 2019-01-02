---
id: 748
title: 'uComponents: Moved to GitHub'
date: 2013-12-08T22:38:17+00:00
author: leekelleher
layout: post
guid: http://leekelleher.com/?p=748
permalink: /2013/12/08/ucomponents-moved-to-github/
dsq_thread_id:
  - 2036344333
tags:
  - CodePlex
  - GitHub
  - Hg
  - Mercurial
  - uComponents
  - Umbraco
---
Hey uComponents fans, a little status update on our version control repository move from CodePlex over to GitHub. We&#8217;d been talking about moving over to GitHub for a long time, (even before Umbraco core moved over), but the timing was never right &#8211; either we were in the middle of a major release or our day-job workloads were in high demand.  Luckily since our own v6.0.0 release, we have found the time to make the move!

The new repository is currently hosted on my personal account &#8211; <https://github.com/leekelleher/uComponents> &#8211; but once this has been stabilised, I will relocated it the main [uComponents organisation](https://github.com/uComponents) account.

**<span style="text-decoration: underline;">Update:</span> The repository has now been moved to the organisation account: <https://github.com/uComponents/uComponents>**

For those who are interested in how I migrated from our Mercurial (Hg) repository on CodePlex over to Git; we used [the Hg-Git mercurial plugin](http://hg-git.github.io/) to handle the main bulk of the conversion. The initial set-up had some tricky parts, mostly around installing a specific version of Python (v2.6.6) and the Dulwich library (v0.8.0+). But once configured, it all works very well.

The biggest issue I had was trying to map the commit authors with their corresponding GitHub accounts. There are various blog posts on how to generate an &#8220;[AUTHORS.TXT](https://github.com/schacon/hg-git#gitauthors)&#8221; file that will map users/emails, but I ended up using the following Hg command to get a list of the authors from all the commits/changesets.

<pre class="brush: bash; gutter: false">hg log --template "{author} = {author} rn" &gt; AUTHORS.TXT</pre>

The output from this gave me a huge list of usernames/email addresses.  I used a feature in Notepad++&#8217;s TextFX Tools to sort and de-duplicate the lines.  From there I found the corresponding GitHub email addresses (this wasn&#8217;t pretty either &#8211; you&#8217;re on your own here).  Then I wired up hg-git&#8217;s [**git.author**](https://github.com/schacon/hg-git#gitauthors) option to use the AUTHORS.TXT for the mapping.

The rest of the move to GitHub has gone successfully.  We still need to agree on a better branching structure/workflow, as the one we&#8217;ve been using for the past few years has worked well, we feel that it is off-putting to newcomers.  We are currently looking at using [git-flow](http://nvie.com/posts/a-successful-git-branching-model/), but are still open to any other suggestions.