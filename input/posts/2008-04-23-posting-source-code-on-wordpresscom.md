title: "Posting source code on WordPress.com"
link: "http://leekelleher.com/2008/04/23/posting-source-code-on-wordpresscom/"
pubDate: "Wed, 23 Apr 2008 09:55:07 +0000"
guid: "http://leekelleher.wordpress.com/?p=26"
dc_creator: "leekelleher"
wp_post_id: 273
wp_post_date: "2008-04-23 09:55:07"
wp_post_date_gmt: "2008-04-23 09:55:07"
wp_comment_status: "open"
wp_ping_status: "open"
wp_post_name: "posting-source-code-on-wordpresscom"
wp_status: "publish"
wp_post_parent: 0
wp_menu_order: 0
wp_post_type: "post"
wp_post_password: ""
wp_is_sticky: 0
dsq_thread_id: '1055344502'
categories:
  - blog: "blog"
  - code: "code"
  - short-code: "short code"
  - snippet: "snippet"
  - source: "source"
  - wordpress-2: "WordPress"

---

# Posting source code on WordPress.com

I feel like a complete n00b ... I've only just found out how to mark-up source-code snippets on WordPress.com

It's in their FAQs: <a href="http://faq.wordpress.com/2007/09/03/how-do-i-post-source-code/"><strong>How do I post source code?</strong></a>

Essentially you use the short-code: <code><strong>[</strong><strong>sourcecode language='css']...[/sourcecode</strong><strong>]</strong></code>

Here's an example:

[sourcecode language='csharp']// A "Hello World!" program in C#
class Hello
{
   static void Main()
   {
      System.Console.WriteLine("Hello World!");
   }
}[/sourcecode]

I knew about WP.org plugins that did this, but I've been scratching my head on how do this on WP.com for ages now!