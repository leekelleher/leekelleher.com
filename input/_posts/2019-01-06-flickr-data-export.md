---
title: Exporting my Flickr Data
date: 2019-01-06T10:05:00+00:00
layout: post
permalink: /2019/01/flickr-data-export/
tags:
  - Flickr
image: /assets/media/flickr.png
excerpt: Flickr have announced they are limiting free accounts to 1,000 photos. Meaning my older photos would be deleted. Given my travelblog links to many of my old photos, I'd have to either upgrade to a Pro account, or find a way to export all my Flickr data.
---

Flickr, recently acquired again, (this time by SmugMug), announced there would be [changes to their account tiers](https://www.flickr.com/lookingahead).

In a nutshell, free accounts would be limited to 1,000 photos. The footnote on this is that if you have an existing account that goes over the limit, from February 5th 2019, they will systematically deleted photos over this limit, starting from oldest to newest.

> Side-note, I later learned there's an extra condition on this... [photos licensed under Creative Commons are protected from this restriction](http://blog.flickr.net/2018/11/07/the-commons-the-past-is-100-part-of-our-future/).

I'm totally fine with the photo limit, I understand the business reasons, it's a more sustainable approach. Unfortunately, it's the deletion of existing old photos that bothers me.

As far as I recall, the original (independently owned) Flickr free tier limit of 250 photos would never deleted any photos that went over the limit. Instead, they'd be hidden from the photostream, so not discoverable, but still available for direct links - I guess for anyone wanting to upgrade their account to the Pro tier to unlock the restriction, or idealistically for the sake of archival and preservation?

I signed up to Flickr in 2005, upgrading to a Pro account when I needed to, (primarily to share photos from [my "world tour" travelblog](https://www.lee-and-lucy.com/travelblog/category/world-tour-200203/)). I used to really enjoy using the platform, I got involved with the community aspects, even attended a few local Flickrmeets!

Over the years, Flickr's user experience deteriorated, I didn't enjoy using it as much, it became obvious that the original team had left the building. Around the same time there was a rise in Facebook usage, e.g. when your parents actively start using it, it made sense to use Facebook than Flickr. _(Although using Facebook today raises its own set of ethical dilemmas!)_

At the time of writing, I have [2,855 photos on my free account](https://www.flickr.com/photos/leekelleher). Most of those have direct links from my travelblog. Meaning after February 5th, they'll be broken images & links.

Since I no longer use Flickr as my primary photo storage, I'm reluctant to upgrade back to the Pro account. I'll be looking at other options to display photos on my (old) travelblog.

Of course to do this I'd need to get all my Flickr data. I wasn't so much concerned about the photos themselves, I already had those backed up, the gold for me was **all the metadata!** Specifically the albums and tags. I looked at various ways to retrieve this using their API, but it turns out that I was over-thinking it, as I discovered that Flickr offer a simple Data Export tool.

On [my account page](https://www.flickr.com/account), there's a panel called "Your Flickr Data", along with a button saying "Request your data". I pressed it, then within 24-hours I had an email with links to download all my data.

In total there were 7 zip files available to download. The first contained all my data in JSON format: profile info, contacts, favourites, followers, groups, albums, flickrmail, and metadata for each individual photo (including comments and tags)! The remaining 6 zip files were all the photo and video files. Everything I wanted.

Now that I have all the JSON data locally, I'll look to getting it into a relational database of some kind, then use that on my travelblog. I haven't developed anything yet, but at least I'm happier now that I have my data available.

In terms of my future usage of Flickr, I'm happy to keep my free account, I'll still like to comment on & fav friend's photos, etc. I wish SmugMug all the best with Flickr, the revised tiers should be a more sustainable model for them. I only wonder if mass deletion of legacy data is a blow for Internet preservation?
