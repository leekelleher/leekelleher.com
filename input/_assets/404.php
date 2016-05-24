<?php
// Gather visitor information
$ip          = getenv("REMOTE_ADDR");      // IP Address
$server_name = getenv("SERVER_NAME");      // Server Name
$request_uri = getenv("REQUEST_URI");      // Requested URI
$http_ref    = getenv("HTTP_REFERER");     // HTTP Referer
$http_agent  = getenv("HTTP_USER_AGENT");  // User Agent
$error_date  = date(DATE_ATOM);  // Error Date

$items       = array($error_date, $request_uri, $http_ref, $server_name, $ip, $http_agent);

if(!file_exists('_data/404.csv')){
	file_put_contents('_data/404.csv', '');
}

$file = fopen('_data/404.csv', 'a');
fputcsv($file, $items, "\t");
fclose($file);

header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
?>
<!doctype html>
<html lang="en">
<head>
	<title>404 Not Found - leekelleher.com</title>
	<meta name="robots" content="none">
	<style type="text/css">
		body {background-color:#000;color:#fff;font-family:sans-serif;font-size:small;margin:0;padding:0;}
		div#main {text-align:center;margin-top:5%;}
		h1 {font-size:40px;letter-spacing:10px;}
		h2 {letter-spacing:3px;}
		a {background-color:transparent;color:#C7D82A;text-decoration:none;}
		a:hover {text-decoration:underline;}
	</style>
</head>
<body>
	<div id="main">
		<p>
			<a href="http://www.flickr.com/photos/girliemac/6508022985/" title="404 - Not Found by GirlieMac, on Flickr">
				<img src="https://farm8.staticflickr.com/7172/6508022985_b22200ced0_b.jpg" width="750" height="600" alt="404 - Not Found">
			</a>
		</p>
		<h1>lee<span>kelleher</span>.com</h1>
		<h2>The requested resource could not be found!</h2>
	</div>
</body>
</html>