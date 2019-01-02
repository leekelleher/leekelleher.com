---
id: 287
title: 'Hindsight&#8230; It&#8217;s is a wonderful thing!'
date: 2008-07-18T23:02:58+00:00
author: leekelleher
layout: post
guid: http://leekelleher.wordpress.com/?p=57
permalink: /2008/07/18/hindsight-its-is-a-wonderful-thing/
dsq_thread_id:
  - 1054584108
tags:
  - Hacked
  - Travelblog
  - Upgrade
  - WordPress
---
A couple of hours ago I received an automated email from our [Travelblog](http://www.lee-and-lucy.com/) site, saying that we had a new user registration; which was strange, since we disabled that feature a long time ago!  Great! **We&#8217;ve just been hacked!**

I put my hands up in the air, I&#8217;d been running an old version of WordPress ([2.2](http://wordpress.org/development/2007/05/wordpress-22/)) &#8230; which I&#8217;ve been meaning to upgrade for a long time; but hey, [I&#8217;ve bought a house](http://www.lee-and-lucy.com/travelblog/2007/10/24/we-got-the-keys/), [had a baby](http://www.lee-and-lucy.com/travelblog/2008/02/18/katelyn-mary-kelleher/) and [build my business](http://bodenko.com/) during that time! It&#8217;s not been at the top of my priories.  So yes, I&#8217;m aware of the security holes/risks, etc.

Needless to say, [WordPress 2.2 has an ugly security hole](http://kev.coolcavemen.com/2007/06/wordpress-22-security-hole-identity-theft/) which allows hackers to remotely inject SQL statements into the database.  _I&#8217;d heard about this at the time, but thought I was covered because it relied on the hacker having a valid username/password ([see the trac ticket](http://trac.wordpress.org/ticket/4357#comment:5))._ **Well it seems they don&#8217;t!**

Within a minute of receiving the new user registration email, I deleted the user account, changed our passwords and upgraded to [WordPress 2.6](http://wordpress.org/development/2008/07/wordpress-26-tyner/) &#8211; which came with it&#8217;s own set of problems (i.e. [all the category names disappeared](http://blog.cumps.be/wordpress-26-upgrade-fix-missing-categories/)).

Here are the details of the would-be hacker, so others know about him:

> Username: sidon
  
> E-mail: Dimka@hotmail.com