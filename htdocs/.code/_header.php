<?php
	$host = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
	$current_path = getenv('REQUEST_URI');
	$current_url = $host . strtok($current_path, '?');

	if (empty($page->meta->title) === true) {
		$page->meta->title = implode(' &raquo; ', explode('/', substr($current_path, 1))) . ' &laquo; leekelleher.com';
	}

	if (empty($page->meta->image) === true) {
		$page->meta->image = "$host/assets/img/nxnw_300x300.jpg";
	}

	if (empty($page->meta->twitter) === true) {
		$page->meta->twitter = '@leekelleher';
	}
?><!doctype html>
<html lang="en">
<head prefix="og: http://ogp.me/ns#">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$page->meta->title?></title>
	<?php if (empty($page->meta->description) === false) : ?><meta name="description" content="<?=$page->meta->description?>"><?php endif; ?>
	<?php if (empty($page->meta->keywords) === false) : ?><meta name="keywords" content="<?=$page->meta->keywords?>"><?php endif; ?>
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="<?=$page->meta->twitter?>">
	<meta name="twitter:url" property="og:url" content="<?=$current_url?>">
	<meta name="twitter:title" property="og:title" content="<?=$page->meta->title?>">
	<?php if (empty($page->meta->description) === false) : ?><meta name="twitter:description" property="og:description" content="<?=$page->meta->description?>"><?php endif; ?>
	<meta name="twitter:image" property="og:image" content="<?=$page->meta->image?>">
	<?php if (empty($page->meta->rss) === false) : ?><link rel="alternate" href="<?=$host?>/feed/" type="application/rss+xml"><?php endif; ?>
	<link rel="canonical" href="<?=$current_url?>">
	<link rel="pingback" href="https://webmention.io/leekelleher.com/xmlrpc">
	<link rel="webmention" href="https://webmention.io/leekelleher.com/webmention">
	<link rel="stylesheet" href="/assets/css/_.css">
	<?php if (empty($page->meta->styles) === false) : ?><style><?=$page->meta->styles?></style><?php endif; ?>
</head>
<body>
	<?php if (empty($page->header) === false) : ?>
	<header role="banner">
		<?php if (empty($page->header->logo) === false) : ?><img src="<?=$page->header->logo->url?>" alt="<?=$page->header->logo->name?>"><?php endif; ?>
		<h1><?=$page->header->title?></h1>
		<?php if (empty($page->header->nav) === false) : ?>
		<nav>
			<ul>
			<?php foreach ($page->header->nav as $link) : ?>
				<li><a href="<?=$link->url?>"<?=$link->url === $current_path ? 'class="active"' : null?>><?=$link->name?></a></li>
			<?php endforeach; ?>
			</ul>
		</nav>
		<?php endif; ?>
    </header>
	<?php endif; ?>
