<?php
	$rootPath = $_SERVER['DOCUMENT_ROOT'];

	$page = (object)['meta' => (object)[], 'header' => (object)[], 'footer' => (object)[]];
	
	$page->meta->title = 'Contentment for Umbraco';
	$page->meta->description = 'Contentment package for Umbraco.';
	$page->meta->image = 'https://leekelleher.com/assets/img/nxnw_300x300.jpg';
	$page->meta->twitter = '@leekelleher';
	$page->meta->styles = ':root{--nc-ac-1: #FF8A89;}';
	
	$page->header->logo = (object)['url' => 'logo.png', 'name' => 'Contentment for Umbraco logo'];
	$page->header->title = 'Contentment for Umbraco';
	$page->header->nav = [
		(object)['name' => 'Umbraco package', 'url' => 'https://our.umbraco.com/packages/backoffice-extensions/contentment/'],
		(object)['name' => 'Source code', 'url' => 'https://github.com/leekelleher/umbraco-contentment'],
		(object)['name' => 'NuGet', 'url' => 'https://www.nuget.org/packages/Our.Umbraco.Community.Contentment'],
		(object)['name' => 'Telemetry', 'url' => './telemetry/'],
	];
	
	$page->footer = '<p class="h-card">All content by <a rel="me" class="p-name u-url" href="https://leekelleher.com">Lee Kelleher</a> (<span>&copy; 2020</span>) and licensed under <a rel="license" href="https://creativecommons.org/licenses/by-sa/4.0/deed.en_GB" title="Creative Commons Attribution-ShareAlike 4.0 International ">Creative Commons</a>. All code snippets are licensed under the <a rel="license" href="https://opensource.org/licenses/MIT">MIT license</a>.</p>';

	include_once("$rootPath/.code/_header.php");
?>

	<main>
		<article>
		</article>
	</main>

	<?php include_once("$rootPath/.code/_footer.php"); ?>
