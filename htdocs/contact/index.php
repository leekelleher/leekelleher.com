<?php
	$rootPath = $_SERVER['DOCUMENT_ROOT'];

	$page = (object)['meta' => (object)[], 'header' => (object)[]];
	
	$page->meta->title = 'Contact | Lee Kelleher';
	$page->meta->description = 'The personal website of Lee Kelleher';
	$page->meta->keywords = 'leekelleher,kelleher';
	$page->meta->rss = true;
	
	$page->header->logo = (object)['url' => '/assets/img/nxnw_80x80.png', 'name' => 'logo'];
	$page->header->title = 'Lee Kelleher';
	$page->header->nav = [
		(object)[ 'name' => 'Home', 'url' => '/' ],
		(object)[ 'name' => 'About', 'url' => '/about/' ],
		(object)[ 'name' => 'Contact', 'url' => '/contact/' ],
	];
	
	include_once("$rootPath/.code/_header.php");
?>
	<main>
		<article>
			<h2>Contact me</h2>
			<p>Hello! If you are planning on getting in touch about Umbraco package support, please keep in mind that I maintain those projects in my free time.</p>
			<!--<p>For professional Umbraco services, my company, <a href="https://umbrellainc.co.uk/">Umbrella</a>, is an <a href="https://umbraco.com/partners/partnerlist/umbrella">Umbraco Gold Partner</a>. We would love to <a href="https://umbrellainc.co.uk/contact-us/">chat about your projects</a>.</p> -->
			<p>For anything else, email is the best way to get in touch: <a href="mailto:leekelleher@gmail.com">leekelleher@gmail.com</a>.</p>
			<p>If we're connected on <a href="https://twitter.com/leekelleher" rel="me">Twitter</a>, Facebook, or LinkedIn, I'm happy to be contacted using the direct message features of those services.<br><em>(Less so on Facebook, as I no longer have the Messenger app installed.)</em></p>
			<p>If you do have my mobile number, please don't cold call me, I generally avoid answering unexpected calls. Either text or WhatsApp me.</p>
			<p>I used to have a contact form on this page, but it was continually abused by spammers, so the simpler option to battling with with them was to remove it and offer folk the alternative methods to contact me.</p>
		</article>
	</main>

<?php include_once("$rootPath/.code/_footer.php"); ?>