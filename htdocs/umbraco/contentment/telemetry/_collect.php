<?php

$base64 = file_get_contents('php://input');
	 
if ($base64 == null || $base64 == '') {
	exit('The request body is empty.');
}

$json = json_decode(base64_decode($base64), true);

if ($json == null || $json == '') {
	exit('The request body is empty.');
}

try {

	$db = new PDO("sqlite:".__DIR__."/_telemetry.sqlite");

/* CREATE TABLE "dataTypes" (
	"dataType"	TEXT COLLATE NOCASE,
	"editorAlias"	TEXT COLLATE NOCASE,
	"umbracoId"	TEXT COLLATE NOCASE,
	"umbracoVersion"	TEXT,
	"contentmentVersion"	TEXT
) */

	$qry = $db->prepare('INSERT INTO dataTypes (dataType, editorAlias, umbracoId, umbracoVersion, contentmentVersion) VALUES (?, ?, ?, ?, ?)');
	$qry->execute(array($json['dataType'], $json['editorAlias'], $json['umbracoId'], $json['umbracoVersion'], $json['contentmentVersion']));

} catch (Exception $ex) {

	exit($ex->getMessage());

}
?>