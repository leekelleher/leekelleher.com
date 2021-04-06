<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Telemetry statistics for Contentment for Umbraco</title>
	<meta name="description" content="Details about the telemetry data collected by the Contentment package for Umbraco.">
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@leekelleher">
	<meta name="twitter:url" property="og:url" content="https://leekelleher.com/umbraco/contentment/telemetry/">
	<meta name="twitter:title" property="og:title" content="Telemetry statistics for Contentment for Umbraco">
	<meta name="twitter:description" property="og:description" content="Details about the telemetry data collected by the Contentment package for Umbraco.">
	<meta name="twitter:image" property="og:image" content="https://leekelleher.com/assets/img/nxnw_300x300.jpg">
	<link rel="canonical" href="https://leekelleher.com/umbraco/contentment/telemetry/">
	<link rel="stylesheet" href="/assets/css/_.css">
</head>
<body>
	<header>
		<img src="logo.png" alt="Contentment for Umbraco logo">
		<h1>Contentment for Umbraco</h1>
		<nav>
			<ul>
				<li><a href="#stats">Telemetry statistics</a></li>
				<li><a href="#editors">Most popular editors</a></li>
				<li><a href="#versions">Most popular versions</a></li>
				<li><a href="#disable">Disable telemetry?</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<article>
			<h2 id="stats">Telemetry statistics</h2>
			<p>Since version 1.2.0, my <a href="https://our.umbraco.com/packages/backoffice-extensions/contentment/">Contentment for Umbraco package</a> has been collecting telemetry data. This provides me with insights to which of the editors are being used, so that I can make informed decisions on how to focus my future development efforts. The data is sent anonymously, no personal or sensitive data is collected. In an effort of transparency, here is the analysis of the telemetry data.</p>
<?php
	$db = new PDO("sqlite:".__DIR__."/_telemetry.sqlite");
	$qry1 = $db->query("
SELECT
	editorAlias,
	COUNT(DISTINCT dataType) AS [count],
	GROUP_CONCAT(DISTINCT contentmentVersion) AS [contentmentVersions],
	GROUP_CONCAT(DISTINCT umbracoVersion) AS [umbracoVersions]
FROM
	dataTypes
WHERE
	contentmentVersion NOT LIKE '%-develop'
GROUP BY
	editorAlias
ORDER BY
	[count] DESC,
	editorAlias ASC
;");

	$editors = [
		'Bytes' => [ 'name' => 'Bytes', 'url' => '/blob/develop/docs/editors/bytes.md' ],
		'CodeEditor' => [ 'name' => 'Code Editor', 'url' => '/blob/develop/docs/editors/code-editor.md' ],
		'ContentBlocks' => [ 'name' => 'Content Blocks', 'url' => '/blob/develop/docs/editors/content-blocks.md' ],
		'DataList' => [ 'name' => 'Data List', 'url' => '/blob/develop/docs/editors/data-list.md' ],
		'IconPicker' => [ 'name' => 'Icon Picker', 'url' => '/blob/develop/docs/editors/icon-picker.md' ],
		'Notes' => [ 'name' => 'Notes', 'url' => '/blob/develop/docs/editors/notes.md' ],
		'NumberInput' => [ 'name' => 'Number Input', 'url' => '/blob/develop/docs/editors/number-input.md' ],
		'RenderMacro' => [ 'name' => 'Render Macro', 'url' => '/blob/develop/docs/editors/render-macro.md' ],
		'TextInput' => [ 'name' => 'Text Input', 'url' => '/blob/develop/docs/editors/text-input.md' ],
	];
?>
			<h3 id="editors">Most popular Contentment editors</h3>
			<p>This represents the number of unique instances of an editor's data-type configuration.</p>
			<table>
				<thead>
					<tr>
						<th>Editor</th>
						<th>Count</th>
						<th>Package versions</th>
						<th>Umbraco versions</th>
					</tr>
				</thead>
				<tbody><?php
					while ($row = $qry1->fetch(\PDO::FETCH_ASSOC)) :
						if (array_key_exists($row['editorAlias'], $editors)) :
							$editor = $editors[$row['editorAlias']];
							$pkgVersions = explode(',', $row['contentmentVersions']);
							$umbVersions = explode(',', $row['umbracoVersions']);
							usort($pkgVersions, 'version_compare');
							usort($umbVersions, 'version_compare');
?>
					<tr>
						<td><a href="https://github.com/leekelleher/umbraco-contentment<?= $editor['url'] ?>" target="_blank"><?= $editor['name'] ?></a></td>
						<td><?= number_format($row['count']) ?></td>
						<td><?= implode(', ', array_reverse($pkgVersions)) ?></td>
						<td><?= implode(', ', array_reverse($umbVersions)) ?></td>
					</tr>
				<?php endif; endwhile; ?></tbody>
			</table>
<?php 
	$qry2 = $db->query("
SELECT
	contentmentVersion,
	COUNT(DISTINCT umbracoId) AS [count],
	GROUP_CONCAT(DISTINCT umbracoVersion) AS [umbracoVersions]
FROM
	dataTypes
WHERE
	contentmentVersion NOT LIKE '%-develop'
GROUP BY
	contentmentVersion
ORDER BY
	contentmentVersion ASC
;");
?>
			<h3 id="versions">Most popular Contentment versions</h3>
			<p>This represents the unique installations of Contentment, along with an aggregation of Umbraco versions being used.</p>
			<table>
				<thead>
					<tr>
						<th>Package version</th>
						<th>Count</th>
						<th>Umbraco versions</th>
					</tr>
				</thead>
				<tbody><?php
					while ($row = $qry2->fetch(\PDO::FETCH_ASSOC)) :
						$umbVersions = explode(',', $row['umbracoVersions']);
						usort($umbVersions, 'version_compare');
?>
					<tr>
						<td><?= $row['contentmentVersion'] ?></td>
						<td><?= number_format($row['count']) ?></td>
						<td><?= implode(', ', array_reverse($umbVersions)) ?></td>
					</tr>
				<?php endwhile; ?></tbody>
			</table>
			
			<h3 id="disable">Disable telemetry?</h3>
			<details>
				<summary>If you would prefer to disable the telemetry, you can use this code snippet to disable it.</summary>
				<pre lang="csharp"><code><span style="color: #0000ff">using</span> Umbraco.Core.Composing;

<span style="color: #0000ff">namespace</span> Our.Umbraco.Web
{
    <span style="color: #0000ff">public</span> <span style="color: #0000ff">class</span> <span style="color: #2b91af">DisableContentmentTelemetryComposer</span> : <span style="color: #2b91af">IUserComposer</span>
    {
        <span style="color: #0000ff">public</span> <span style="color: #0000ff">void</span> Compose(Composition composition)
        {
            composition.DisableContentmentTelemetry();
        }
    }
}</code></pre>
			<p>If you already have your own composer class, you can add the <code>composition.DisableContentmentTelemetry();</code> line to it.</p>
			</details>
			
			<hr>
			
			<p>If you have any questions, issues or concerns about Contentment's telemetry feature, please either <a href="/contact/">contact me</a> or <a href="https://github.com/leekelleher/umbraco-contentment/discussions" target="_blank">start a discussion on GitHub</a>.</p>
			
		</article>
	</main>
	<footer>
		<p class="h-card">All content by <a rel="me" class="p-name u-url" href="https://leekelleher.com">Lee Kelleher</a> (<span>&copy; 2021</span>) and licensed under <a rel="license" href="https://creativecommons.org/licenses/by-sa/4.0/deed.en_GB" title="Creative Commons Attribution-ShareAlike 4.0 International ">Creative Commons</a>. All code snippets are licensed under the <a rel="license" href="https://opensource.org/licenses/MIT">MIT license</a>.</p>	
	</footer>
</body>
</html>