---
title: "Bulk Photo Resizing with ImageProcessor"
date: 2016-07-26T14:36:00+05:30
layout: post
permalink: /2016/07/bulk-photo-resizing-with-imageprocessors/
tags:
  - ImageProcessor
  - C#
  - code
---

I'm currently on a month long holiday in Sri Lanka, taking a nice overdue break from work, (much respect to Rich for holding the Umbrella fort!).

During my travels, I've been keeping [a family blog](https://2016.lee-and-lucy.com) - journal updates, add a few photos, etc. However the WiFi upload speeds at the various hotels we've been staying at have been painful slow; uploading a single photo (around 3Mb) to our blog or even Facebook is taking an age!

I needed a way to resize the photos (and/or reduce the filesize). My first port of call was Photoshop, which is fine, but it was taking some time do manually resize each photo manually, (and I couldn't remember the way to bulk automate it). Given my limited bandwidth - and pressing travel itinerary, I didn't have the time to search for a decent solution.

> Since I posted a call for help on Facebook about this, [Image Resizer for Windows](http://imageresizer.codeplex.com/) has been recommended a few times.

Alas, the next stop on our itinerary was some eco-friendly place with no WiFi access... I just didn't have time or chance to download it.

Whilst on the drive, I kept thinking about alternative solutions to this problem - **how could I bulk resize my photos with the tools I've got to hand?** Then I realised, I have [ImageProcessor](http://imageprocessor.org/) on my laptop, (since it ships with Umbraco)!

15 minutes later, I had this...

```csharp
using System;
using System.Diagnostics;
using System.Drawing;
using System.IO;
using ImageProcessor;

namespace MyBulkPhotoResizer
{
    class Program
    {
        const int EXITCODE_ERROR = 2;

        static void Main(string[] args)
        {
            var stopwatch = new Stopwatch();
            stopwatch.Start();

            using(var factory = new ImageFactory(true))
            {
                var path = Directory.GetCurrentDirectory();
                var pattern = "*.JPG";

                var dir = new DirectoryInfo(path);
                var files = dir.GetFiles(pattern);

                if (files.Length == 0)
                {
                    Console.WriteLine("This directory does not contain any photos.");
                    Environment.Exit(EXITCODE_ERROR);
                }

                var resizedDir = Path.Combine(dir.FullName, "resized");

                if (!Directory.Exists(resizedDir))
                    Directory.CreateDirectory(resizedDir);

                foreach (var file in files)
                {
                    var savedPath = Path.Combine(resizedDir, file.Name);

                    if (File.Exists(savedPath))
                    {
                        Console.WriteLine("This photo has already been resized: {0}", file.Name);
                        continue;
                    }

                    factory
                        .Load(file.FullName)
                        .Resize(new Size(1024, 768))
                        .Save(savedPath);

                    Console.WriteLine("Resized photo: {0}", file.Name);
                }
            }

            stopwatch.Stop();

            Console.WriteLine();
            Console.WriteLine("It took {0} minutes, {1} seconds to resize all the photos.", stopwatch.Elapsed.Minutes, stopwatch.Elapsed.Seconds);
            Console.ReadLine();
        }
    }
}
```

**Awesome**, and developed at the backseat of a minibus, with no internet access!

The beautiful part about using ImageProcessor is that it automatically detects the orientation and resizes accordingly, so the portrait photos are never squashed &amp; mangled.

![Bulk Photo Resizer with ImageProcessor](/assets/media/bulk-photo-resizer-imageprocessor.jpg)

I think the best part of this is that you can achieve simple tasks with a little bit of code; even when you are in the middle of Sri Lanka!
