<?php
	header('Content-Type: application/rss+xml; charset=utf-8');

	$date = new DateTime();
	$years = scandir('..', SCANDIR_SORT_DESCENDING);
	
	$title = 'Lee Kelleher\'s #weeknotes';
	$url = 'https://leekelleher.com/weeknotes/';
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title><?=$title?></title>
		<link><?=$url?></link>
		<atom:link href="<?=$url?>feed/" rel="self" type="application/rss+xml" />
		<description>Weekly notes and updates from Lee Kelleher</description>
		<language>en-GB</language>
		<lastBuildDate><?=date('r')?></lastBuildDate>
		<generator>leekelleher.com</generator>
		<image>
			<url>https://leekelleher.com/assets/img/nxnw_300x300.jpg</url>
			<title><?=$title?></title>
			<link><?=$url?></link>
		</image><?="\r\n"?>
<?php foreach($years as $year) :
		if (is_numeric($year) == true) :
			for ($week = 53; $week >= 1; $week--):
				$date->setISODate($year, $week);
				$date->setTime(23, 59, 59);
				$date->setTimezone(new DateTimeZone('UTC'));
				$filename = '../'.$year.'/'.$date->format('o-W').'.html';
				if(file_exists($filename)) : 
					$permalink = $url.$year.'/W'.$date->format('W').'/'; ?>
		<item>
			<guid isPermaLink="true"><?=$permalink?></guid>
			<link><?=$permalink?></link>
			<title><?=$year?> Week <?=$date->format('W')?></title>
			<description><![CDATA[<?php include_once($filename); ?>]]></description>
			<pubDate><?=$date->modify('+6 days')->format('r')?></pubDate>
		</item>
<?php endif; endfor; endif; endforeach; ?>
	</channel>
</rss>   