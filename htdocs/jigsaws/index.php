<?php
	$rootPath = $_SERVER['DOCUMENT_ROOT'];
	
	$page = (object)['meta' => (object)[], 'header' => (object)[]];
	
	$page->meta->title = 'Jigsaws | Lee Kelleher';
	$page->meta->description = 'Jigsaws done by Lee Kelleher';
	$page->meta->keywords = 'jigsaws,leekelleher,kelleher';
	$page->meta->styles = "
body {
	background-image: url(bg-x.png);
	background-position: 0 -40px;
	background-repeat: repeat-x;
}
header, footer {
	background-color: rgba(246, 248, 250, 0.9);
}
figure {
	border-bottom: solid 1px #c0c0c0;
	margin: 10px 0 30px 0;
	max-width: 800px;
	padding: 0 0 30px 0;
	text-align: center;
}
figcaption {
	font-size: small;
}
img {
	max-width: 100%;
}
@media screen and (min-width: 1024px) {
	body {
		background-image: url(bg-y.png);
		background-position: -160px 0;
		background-repeat: repeat-y;
	}
}";
	
	$page->header->logo = (object)['url' => '/assets/img/nxnw_80x80.png', 'name' => 'logo'];
	$page->header->title = 'Lee Kelleher';
	$page->header->nav = [
		(object)[ 'name' => 'Home', 'url' => '/' ],
		(object)[ 'name' => 'About', 'url' => '/about/' ],
		(object)[ 'name' => 'Contact', 'url' => '/contact/' ],
	];
	
	$page->footer = '<p class="h-card">All content by <a rel="me" class="p-name u-url" href="https://leekelleher.com">Lee Kelleher</a> (<span>&copy; 2021</span>) and licensed under <a rel="license" href="https://creativecommons.org/licenses/by-sa/4.0/deed.en_GB" title="Creative Commons Attribution-ShareAlike 4.0 International ">Creative Commons</a>.</p>';

	$jigsaws = json_decode(file_get_contents('jigsaws.json'), true);

	include_once("$rootPath/.code/_header.php");
?>
	<main>
		<article>
			<h1>Jigsaws</h1>
			<p>I enjoy jigsaws, in recent years I've taken a photo of the completed jigsaw.</p>
			<p>Here are a selection:</p>
<?php foreach($jigsaws as $jigsaw): ?>
			<figure id="<?=$jigsaw['id']?>">
				<a href="<?=$jigsaw['img']?>"><img src="<?=$jigsaw['img']?>" alt="<?=$jigsaw['name']?>"></a>
				<figcaption><?=$jigsaw['name']?> <?=$jigsaw['pieces']?> pieces. <?=$jigsaw['notes'] != '' ? $jigsaw['notes'] : $jigsaw['brand']?></figcaption>
			</figure>
<?php endforeach; ?>
		</article>
	</main>

<?php include_once("$rootPath/.code/_footer.php"); ?>