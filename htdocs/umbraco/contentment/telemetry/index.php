<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	include_once('_collect.php');

} else {

	include_once('_render.php');

}
?>