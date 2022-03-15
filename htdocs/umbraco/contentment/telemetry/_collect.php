<?php

$base64 = file_get_contents('php://input');
	 
if ($base64 == null || $base64 == '') {
	exit('The request body is empty.');
}

$json = json_decode(base64_decode($base64), true);

if ($json == null || $json == '') {
	exit('The request body is empty.');
}

if (isset($json['contentmentVersion']) && strpos($json['contentmentVersion'], '-') !== false) {
	exit('Rejecting non-production versions of Contentment.');
}

if (isset($json['umbracoVersion']) && strpos($json['umbracoVersion'], '-') !== false) {
	exit('Rejecting non-production versions of Umbraco.');
}

if (strlen($json['umbracoVersion']) == 46) {
	$json['umbracoVersion'] = substr($json['umbracoVersion'], 0, 5);
}

if (isset($json['umbracoId']) && $json['umbracoId'] == '00000000-0000-0000-0000-000000000000') {
	exit('Rejecting development instances of Umbraco.');
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

	$query = $db->prepare('INSERT INTO dataTypes (dataType, editorAlias, umbracoId, umbracoVersion, contentmentVersion) VALUES (?, ?, ?, ?, ?)');
	$query->execute(array($json['dataType'], $json['editorAlias'], $json['umbracoId'], $json['umbracoVersion'], $json['contentmentVersion']));
	
	if (isset($json['dataTypeConfig']) && is_array($json['dataTypeConfig'])) {
		
/* CREATE TABLE "dataTypeConfig" (
	"dataType"	TEXT COLLATE NOCASE,
	"key"	TEXT COLLATE NOCASE,
	"value"	TEXT COLLATE NOCASE
) */

		foreach ($json['dataTypeConfig'] as $key => $value) {
			$query2 = $db->prepare('INSERT INTO dataTypeConfig (dataType, key, value) VALUES (?, ?, ?)');
			$query2->execute(array($json['dataType'], $key, $value));
		}
	}
	
} catch (Exception $ex) {

	exit($ex->getMessage());

}
?>