<?php
	$jigsaws = json_decode(file_get_contents('jigsaws.json'), true);
?><!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Jigsaws | Lee Kelleher</title>
	<link rel="stylesheet" href="jigsaws.css?v=2">
</head>
<body>
	<div class="container">
		<h1>Jigsaws</h1>
		<p>I enjoy jigsaws, in recent years I've taken a photo of the completed jigsaw.</p>
		<p>Here are a selection:</p>
<?php foreach($jigsaws as $jigsaw): ?>
		<figure>
			<img src="<?=$jigsaw['img']?>" alt="<?=$jigsaw['name']?>">
			<figcaption><?=$jigsaw['name']?> <?=$jigsaw['pieces']?> pieces. <?=$jigsaw['notes'] != '' ? $jigsaw['notes'] : $jigsaw['brand']?></figcaption>
		</figure>
<?php endforeach; ?>
	</div>
</body>
</html>