<?php
	$rootPath = $_SERVER['DOCUMENT_ROOT'];

	$page = (object)['meta' => (object)[], 'header' => (object)[]];
	
	$page->meta->title = 'About Me | Lee Kelleher';
	$page->meta->description = 'The personal website of Lee Kelleher';
	$page->meta->keywords = 'leekelleher,kelleher';
	$page->meta->rss = true;
	
	$page->header->logo = (object)['url' => '/assets/img/nxnw_80x80.png', 'name' => 'logo'];
	$page->header->title = 'Lee Kelleher';
	$page->header->nav = [
		(object)[ 'name' => 'Home', 'url' => '/' ],
		(object)[ 'name' => 'About', 'url' => '/about/' ],
		(object)[ 'name' => 'Weeknotes', 'url' => '/weeknotes/' ],
		(object)[ 'name' => 'Contact', 'url' => '/contact/' ],
	];
	
	include_once("$rootPath/.code/_header.php");
?>
	<main>
		<article class="h-entry">
			<h2 class="p-name">About Me</h1>
			<div class="e-content">
				<p>Hello, I'm Lee Kelleher, welcome to my website.</p>
				<p>Quick bio: born in Liverpool, raised around north-west England. Lived abroad, in Sri Lanka and Spain. Current hobbies are <a href="https://github.com/leekelleher">writing code</a> and <a href="https://thedysfunctions.uk">playing bass guitar in a band</a>. Before kids, I did a bit of <a href="https://www.lee-and-lucy.com">travelling around</a>, made a few <a href="https://www.youtube.com/user/vertino">short films</a>, and even dabbled in writing a <a href="http://www.lulu.com/spotlight/vertino">comic book</a>.</p>
				<p>Professionally, I build websites using Umbraco CMS. I co-founded <a href="https://umbrellainc.co.uk">Umbrella, an Umbraco consultancy agency</a>, I've been awarded an <a href="https://umbraco.com">Umbraco</a> MVP a few times, (between 2010 through to 2021. x11), and I've developed <a href="https://our.umbraco.com/members/leekelleher/#created">numerous Umbraco packages/projects</a>.</p>
			</div>
		</article>
	</main>
	
<?php include_once("$rootPath/.code/_footer.php"); ?>