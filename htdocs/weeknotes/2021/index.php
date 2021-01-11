<?php
	$currentYear = 2021;
	$currentWeek = intval(date('W'));
	$lastWeek = $currentWeek - 1;
	$date = new DateTime();
	$editable = isset($_GET["edit"]);
?><!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>    
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lee Kelleher's #weeknotes for 2021</title>
	<meta name="description" content="Weekly notes and updates from Lee Kelleher">
	<meta name="keywords" content="leekelleher,kelleher,weeknotes,notes,weekly,2021">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@leekelleher">
	<meta name="twitter:url" property="og:url" content="https://leekelleher.com/">
	<meta name="twitter:title" property="og:title" content="Lee Kelleher's #weeknotes for 2021">
	<meta name="twitter:description" property="og:description" content="Weekly notes and updates from Lee Kelleher">
	<meta name="twitter:image" property="og:image" content="https://leekelleher.com/assets/img/nxnw_300x300.jpg">
	<link rel="canonical" href="https://leekelleher.com/weeknotes/2021/">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,400&display=swap">
    <link rel="stylesheet" href="weeknotes.css">
</head>
<body>
    <div class="wrap">
        <div class="page-header-wrap">
            <header class="page-header" role="banner">
                <h1 class="page-header-title">Lee Kelleher</h1>
                <h2 class="page-header-subtitle">#weeknotes for 2021</h2>
				<p>Personal, family, work and any other interests.</p>
            </header>       
        </div>
        <section role="main" class="main">
		<?php for ($week = $currentWeek; $week >= 1; $week--): $date->setISODate($currentYear, $week); ?>
			<article class="entry <?php if ($week > $lastWeek) { echo 'entry-future'; } else if ($week == $lastWeek) { echo 'entry-latest'; } ?>">
				<h1 class="entry-title">Week <?=$date->format('W')?></h1>
				<p class="entry-date"><?=$date->format('F j, Y')?> to <?=$date->modify('+6 days')->format('F j, Y')?></p>
				<?php if ($editable): ?><div contenteditable><?php endif; ?>
				<?php $filename = $date->format('o-W').'.html'; if(file_exists($filename)) include $filename; ?>
				<?php if ($editable): ?></div><?php endif; ?>
			</article>
		<?php endfor; ?>
        </section>
    </div>
	<script>document.addEventListener("DOMContentLoaded", function() {for(var c = document.getElementsByTagName("a"), a = 0;a < c.length; a++) {var b = c[a];b.getAttribute("href") && b.hostname !== location.hostname && (b.target = "_blank")}});</script>
</body>
</html>

    