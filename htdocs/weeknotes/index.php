<?php
	if (isset($_GET['year']) == false) {
		header('Location: /weeknotes/2021/');
		exit();
	}

	$year = intval($_GET['year']);
	$selectedWeek = isset($_GET['week']) == true ? intval($_GET['week']) : 0;
	
	$date = new DateTime();
	
	$title = 'Lee Kelleher\'s #weeknotes for '.$year.($selectedWeek > 0 ? ' Week '.$selectedWeek : '');
?><!doctype html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>    
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title?></title>
	<meta name="description" content="Weekly notes and updates from Lee Kelleher">
	<meta name="keywords" content="leekelleher,kelleher,weeknotes,notes,weekly,<?=$year?>">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@leekelleher">
	<meta name="twitter:url" property="og:url" content="https://leekelleher.com/">
	<meta name="twitter:title" property="og:title" content="<?=$title?>">
	<meta name="twitter:description" property="og:description" content="Weekly notes and updates from Lee Kelleher">
	<meta name="twitter:image" property="og:image" content="https://leekelleher.com/assets/img/nxnw_300x300.jpg">
	<link rel="alternate" href="https://leekelleher.com/weeknotes/feed/" type="application/rss+xml">
	<link rel="canonical" href="https://leekelleher.com/weeknotes/<?=$year.($selectedWeek > 0 ? '/W'.$selectedWeek : '')?>/">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,400;0,700;1,400&display=swap">
    <link rel="stylesheet" href="/weeknotes/style.css">
</head>
<body>
    <div class="wrap">
        <div class="page-header-wrap">
            <header class="page-header" role="banner">
                <h1 class="page-header-title">Lee Kelleher</h1>
                <h2 class="page-header-subtitle">#weeknotes for <?=$year?></h2>
				<p>Personal, family, work and any other interests.</p>
            </header>       
        </div>
        <section role="main" class="main">
		<?php if ($selectedWeek > 0): $date->setISODate($year, $selectedWeek); ?>
			<header>
				<p><a href="../">&#8592; Back to <?=$year?></a></p>
			</header>
			<article class="entry entry-latest">
				<h1 class="entry-title">Week <?=$date->format('W')?></h1>
				<p class="entry-date"><?=$date->format('F j, Y')?> to <?=$date->modify('+6 days')->format('F j, Y')?></p>
				<?php $filename = $year.'/'.$date->format('o-W').'.html'; if(file_exists($filename)) include_once $filename; ?>
			</article>
		<?php else: $currentWeek = 52; $lastWeek = $currentWeek - 0; ?>
		<?php for ($week = $currentWeek; $week >= 1; $week--): $date->setISODate($year, $week); ?>
			<article id="W<?=$date->format('W')?>" class="entry <?php if ($week > $lastWeek) { echo 'entry-future'; } else if ($week == $lastWeek) { echo 'entry-latest'; } ?>">
				<h1 class="entry-title"><a href="W<?=$date->format('W')?>/" rel="bookmark">Week <?=$date->format('W')?></a></h1>
				<p class="entry-date"><?=$date->format('F j, Y')?> to <?=$date->modify('+6 days')->format('F j, Y')?></p>
				<?php $filename = $year.'/'.$date->format('o-W').'.html'; if(file_exists($filename)) include_once $filename; ?>
			</article>
		<?php endfor; ?>
		<?php endif; ?>
        </section>
    </div>
	<script>document.addEventListener("DOMContentLoaded", function() {for(var c = document.getElementsByTagName("a"), a = 0;a < c.length; a++) {var b = c[a];b.getAttribute("href") && b.hostname !== location.hostname && (b.target = "_blank")}});</script>
</body>
</html>