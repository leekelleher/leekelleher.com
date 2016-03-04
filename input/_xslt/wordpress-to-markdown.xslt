<xsl:stylesheet version="1.0"
  xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
  xmlns:excerpt="http://wordpress.org/export/1.2/excerpt/"
  xmlns:content="http://purl.org/rss/1.0/modules/content/"
  xmlns:wfw="http://wellformedweb.org/CommentAPI/"
  xmlns:dc="http://purl.org/dc/elements/1.1/"
  xmlns:wp="http://wordpress.org/export/1.2/"
  exclude-result-prefixes="excerpt content wfw dc wp">

  <xsl:template match="item">title: "<xsl:value-of select="translate(title, '&quot;', '')" />"
link: <xsl:value-of select="link" />
pubDate: <xsl:value-of select="pubDate" />
guid: <xsl:value-of select="guid" />

dc_creator: <xsl:value-of select="dc:creator" />

wp_post_id: <xsl:value-of select="wp:post_id" />
wp_post_date: "<xsl:value-of select="wp:post_date" />"
wp_post_date_gmt: "<xsl:value-of select="wp:post_date_gmt" />"
wp_comment_status: "<xsl:value-of select="wp:comment_status" />"
wp_ping_status: "<xsl:value-of select="wp:ping_status" />"
wp_post_name: "<xsl:value-of select="wp:post_name" />"
wp_status: "<xsl:value-of select="wp:status" />"
wp_post_parent: <xsl:value-of select="wp:post_parent" />
wp_menu_order: <xsl:value-of select="wp:menu_order" />
wp_post_type: "<xsl:value-of select="wp:post_type" />"
wp_post_password: "<xsl:value-of select="wp:post_password" />"
wp_is_sticky: <xsl:value-of select="wp:is_sticky" />
---
# <xsl:value-of select="title" />

<xsl:text>&#xa;&#xa;</xsl:text>

<xsl:value-of select="content:encoded" disable-output-escaping="yes" />

</xsl:template>

</xsl:stylesheet>