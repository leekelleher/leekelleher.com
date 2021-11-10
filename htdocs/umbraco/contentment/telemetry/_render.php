<?php
	$rootPath = $_SERVER['DOCUMENT_ROOT'];

	$page = (object)['meta' => (object)[], 'header' => (object)[], 'footer' => (object)[]];
	
	$page->meta->title = 'Telemetry statistics for Contentment for Umbraco';
	$page->meta->description = 'Details about the telemetry data collected by the Contentment package for Umbraco.';
	$page->meta->image = 'https://leekelleher.com/assets/img/nxnw_300x300.jpg';
	$page->meta->twitter = '@leekelleher';
	$page->meta->styles = ':root{--nc-ac-1: #FF8A89;}';
	
	$page->header->logo = (object)['url' => 'logo.png', 'name' => 'Contentment for Umbraco logo'];
	$page->header->title = 'Contentment for Umbraco';
	$page->header->nav = [
		(object)['name' => 'Telemetry statistics', 'url' => '#stats'],
		(object)['name' => 'Most popular editors', 'url' => '#editors'],
		(object)['name' => 'Most popular versions', 'url' => '#versions'],
		(object)['name' => 'Disable telemetry?', 'url' => '#disable'],
	];
	
	$page->footer = '<p class="h-card">All content by <a rel="me" class="p-name u-url" href="https://leekelleher.com">Lee Kelleher</a> (<span>&copy; 2021</span>) and licensed under <a rel="license" href="https://creativecommons.org/licenses/by-sa/4.0/deed.en_GB" title="Creative Commons Attribution-ShareAlike 4.0 International ">Creative Commons</a>. All code snippets are licensed under the <a rel="license" href="https://opensource.org/licenses/MIT">MIT license</a>.</p>';

	include_once("$rootPath/.code/_header.php");
?>

	<main>
		<article>
			<h2 id="stats">Telemetry statistics</h2>
			<p>Since version 1.2.0, my <a href="https://our.umbraco.com/packages/backoffice-extensions/contentment/">Contentment for Umbraco package</a> has been collecting telemetry data. This provides me with insights to which of the editors are being used, so that I can make informed decisions on how to focus my future development efforts. The data is sent anonymously, no personal or sensitive data is collected. In an effort of transparency, here is the analysis of the telemetry data.</p>
			<details>
				<summary>What type of data is being captured?</summary>
				<p>An example of the data captured from a Data List editor configuration.</p>
				<pre lang="csharp"><code>{
    &quot;dataType&quot;: <span style="color: #a31515">&quot;4E7D6B3A-F959-42E4-921E-081BC0E9E7EE&quot;</span>,
    &quot;editorAlias&quot;: <span style="color: #a31515">&quot;DataList&quot;</span>,
    &quot;umbracoId&quot;: <span style="color: #a31515">&quot;0403E47E-EFE7-4CF2-8E97-148681DAFC10&quot;</span>,
    &quot;umbracoVersion&quot;: <span style="color: #a31515">&quot;8.6.8&quot;</span>,
    &quot;contentmentVersion&quot;: <span style="color: #a31515">&quot;1.3.0&quot;</span>,
    &quot;dataTypeConfig&quot;: {
        &quot;dataSource&quot;: <span style="color: #a31515">&quot;EnumDataListSource&quot;</span>,
        &quot;listEditor&quot;: <span style="color: #a31515">&quot;CheckboxListDataListEditor&quot;</span>
    }
}</code></pre>
			</details>
<?php
	$db = new PDO("sqlite:".__DIR__."/_telemetry.sqlite");

	$qry0 = $db->query("
SELECT
	COUNT(DISTINCT contentmentVersion) AS [contentmentVersions],
	COUNT(DISTINCT umbracoVersion) AS [umbracoVersions],
	COUNT(DISTINCT umbracoId) AS [umbracoInstances]
FROM
	dataTypes
;");
?>
			<h3>Summary</h3>
			<?php while ($row = $qry0->fetch(\PDO::FETCH_ASSOC)) : ?>
			<p>There are <strong><?= number_format($row['contentmentVersions']) ?></strong> versions of Contentment being used on <strong><?= number_format($row['umbracoInstances']) ?></strong> unique Umbraco instances, ranging across <strong><?= number_format($row['umbracoVersions']) ?></strong> versions.</p>
			<?php endwhile; ?>
<?php
	$qry1 = $db->query("
SELECT
	editorAlias,
	COUNT(DISTINCT dataType) AS [count],
	GROUP_CONCAT(DISTINCT contentmentVersion) AS [contentmentVersions],
	GROUP_CONCAT(DISTINCT umbracoVersion) AS [umbracoVersions],
	COUNT(DISTINCT umbracoId) AS [installs]
FROM
	dataTypes
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
		'TemplatedLabel' => [ 'name' => 'Templated Label', 'url' => '/blob/develop/docs/editors/templated-label.md' ],
		'TextInput' => [ 'name' => 'Text Input', 'url' => '/blob/develop/docs/editors/text-input.md' ],
	];
	
	$dataSources = [
		'CountriesDataListSource' => [ 'name' => '.NET Countries (ISO 3166)', 'url' => '/blob/develop/docs/data-sources/data-source--countries.md' ],
		'CurrenciesDataListSource' => [ 'name' => '.NET Currencies (ISO 4217)', 'url' => '/blob/develop/docs/data-sources/data-source--currencies.md' ],
		'EnumDataListSource' => [ 'name' => '.NET Enumeration', 'url' => '/blob/develop/docs/data-sources/data-source--enum.md' ],
		'ExamineDataListSource' => [ 'name' => 'Examine Query', 'url' => '/blob/develop/docs/data-sources/data-source--examine.md' ],
		'JsonDataListSource' => [ 'name' => 'JSON Data', 'url' => '/blob/develop/docs/data-sources/data-source--json.md' ],
		'LanguagesDataListSource' => [ 'name' => '.NET Languages (ISO 639)', 'url' => '/blob/develop/docs/data-sources/data-source--languages.md' ],
		'NumberRangeDataListSource' => [ 'name' => 'Number Range', 'url' => '/blob/develop/docs/data-sources/data-source--number-range.md' ],
		'PhysicalFileSystemDataSource' => [ 'name' => 'File System', 'url' => '/blob/develop/docs/data-sources/data-source--file-system.md' ],
		'SqlDataListSource' => [ 'name' => 'SQL Data', 'url' => '/blob/develop/docs/data-sources/data-source--sql.md' ],
		'TextDelimitedDataListSource' => [ 'name' => 'Text Delimited Data', 'url' => '/blob/develop/docs/data-sources/data-source--text-delimited.md' ],
		'TimeZoneDataListSource' => [ 'name' => '.NET Time Zones (UTC)', 'url' => '/blob/develop/docs/data-sources/data-source--timezone.md' ],
		'uCssClassNameDataListSource' => [ 'name' => 'uCssClassName', 'url' => '/blob/develop/docs/data-sources/data-source--ucssclassname.md' ],
		'UmbracoContentDataListSource' => [ 'name' => 'Umbraco Content', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-content.md' ],
		'UmbracoContentPropertiesDataListSource' => [ 'name' => 'Umbraco Content Properties', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-content-properties.md' ],
		'UmbracoContentTypesDataListSource' => [ 'name' => 'Umbraco Content Types', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-content-types.md' ],
		'UmbracoContentXPathDataListSource' => [ 'name' => 'Umbraco Content by XPath', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-content-xpath.md' ],
		'UmbracoDictionaryDataListSource' => [ 'name' => 'Umbraco Dictionary Items', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-dictionary.md' ],
		'UmbracoEntityDataListSource' => [ 'name' => 'Umbraco Entities', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-entity.md' ],
		'UmbracoImageCropDataListSource' => [ 'name' => 'Umbraco Image Crops', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-image-crop.md' ],
		'UmbracoLanguagesDataListSource' => [ 'name' => 'Umbraco Languages', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-languages.md' ],
		'UmbracoMemberGroupDataListSource' => [ 'name' => 'Umbraco Member Groups', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-member-group.md' ],
		'UmbracoMembersDataListSource' => [ 'name' => 'Umbraco Members', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-members.md' ],
		'UmbracoTagsDataListSource' => [ 'name' => 'Umbraco Tags', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-tags.md' ],
		'UmbracoUsersDataListSource' => [ 'name' => 'Umbraco Users', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-users.md' ],
		'UmbracoUserGroupDataListSource' => [ 'name' => 'Umbraco User Groups', 'url' => '/blob/develop/docs/data-sources/data-source--umbraco-user-groups.md' ],
		'UserDefinedDataListSource' => [ 'name' => 'User-defined List', 'url' => '/blob/develop/docs/data-sources/data-source--user-defined.md' ],
		'XmlDataListSource' => [ 'name' => 'XML Data', 'url' => '/blob/develop/docs/data-sources/data-source--xml.md' ],
		'XmlSitemapChangeFrequencyDataListSource' => [ 'name' => 'XML Sitemap: Change Frequency', 'url' => '/blob/develop/docs/data-sources/data-source--xml-sitemap-change-frequency.md' ],
		'XmlSitemapPriorityDataListSource' => [ 'name' => 'XML Sitemap: Priority', 'url' => '/blob/develop/docs/data-sources/data-source--xml-sitemap-priority.md' ],
	];
	
	$listEditors = [
		'ButtonsDataListEditor' => [ 'name' => 'Buttons', 'url' => '/blob/develop/docs/editors/data-list.md' ],
		'CheckboxListDataListEditor' => [ 'name' => 'Checkbox List', 'url' => '/blob/develop/docs/editors/data-list.md' ],
		'DropdownListDataListEditor' => [ 'name' => 'Dropdown List', 'url' => '/blob/develop/docs/editors/data-list.md' ],
		'ItemPickerDataListEditor' => [ 'name' => 'Item Picker', 'url' => '/blob/develop/docs/editors/data-list.md' ],
		'RadioButtonListDataListEditor' => [ 'name' => 'Radio Button List', 'url' => '/blob/develop/docs/editors/data-list.md' ],
		'TagsDataListEditor' => [ 'name' => 'Tags', 'url' => '/blob/develop/docs/editors/data-list.md' ],
		'TemplatedListDataListEditor' => [ 'name' => 'Templated List', 'url' => '/blob/develop/docs/editors/data-list.md' ],
	];
?>
			<h3 id="editors">Most popular editors</h3>
			<p>This represents the number of unique instances of an editor's data-type configuration.</p>
			<table>
				<thead>
					<tr>
						<th>Editor</th>
						<th>Count</th>
						<th>Package versions</th>
						<th>Umbraco versions</th>
						<th>Umbraco instances</th>
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
						<td><?= number_format($row['installs']) ?></td>
					</tr>
				<?php endif; endwhile; ?></tbody>
			</table>

			<h4 id="data-list">Data List</h4>
			<p>Given the popularity of the Data List, here is further analysis of the most popular used data-sources and list-editors.<br><em>Capturing the extended Data List configuration was introduced in v1.3.0.</em></p>
<?php
	$customDataSourceCount = 0;
	$customListEditorCount = 0;
?>
			<div style="display: flex;width: 100%;">
				<div style="width:49%;margin-right:1%;">
<?php $qry3 = $db->query("SELECT value, COUNT(DISTINCT dataType) AS [count] FROM dataTypeConfig WHERE key = 'dataSource' GROUP BY value ORDER BY [count] DESC, value ASC;"); ?>
					<table>
						<thead>
							<tr>
								<th>Data source</th>
								<th>Count</th>
							</tr>
						</thead>
						<tbody><?php
							while ($row = $qry3->fetch(\PDO::FETCH_ASSOC)) :
								if (array_key_exists($row['value'], $dataSources) === false) {
									$customDataSourceCount++;
									continue;
								}
								$dataSource = $dataSources[$row['value']];
?>
							<tr>
								<td><a href="https://github.com/leekelleher/umbraco-contentment<?= $dataSource['url'] ?>" target="_blank"><?= $dataSource['name'] ?></a></td>
								<td><?= $row['count'] ?></td>
							</tr>
						<?php endwhile; ?>
						</tbody>
					</table>
				</div>
				<div style="width:49%;margin-left:1%;">
<?php $qry4 = $db->query("SELECT value, COUNT(DISTINCT dataType) AS [count] FROM dataTypeConfig WHERE key = 'listEditor' GROUP BY value ORDER BY [count] DESC, value ASC;"); ?>
					<table>
						<thead>
							<tr>
								<th>List editor</th>
								<th>Count</th>
							</tr>
						</thead>
						<tbody><?php
							while ($row = $qry4->fetch(\PDO::FETCH_ASSOC)) :
								if (array_key_exists($row['value'], $listEditors) === false) {
									$customListEditorCount++;
									continue;
								}
								$listEditor = $listEditors[$row['value']];
?>
							<tr>
								<td><a href="https://github.com/leekelleher/umbraco-contentment<?= $listEditor['url'] ?>" target="_blank"><?= $listEditor['name'] ?></a></td>
								<td><?= $row['count'] ?></td>
							</tr>
						<?php endwhile; ?></tbody>
					</table>
				</div>
			</div>
			<p>In addition, the analysis has found <strong><?= $customDataSourceCount ?></strong> custom data-sources and <strong><?= $customListEditorCount ?></strong> custom list-editors.<br>If you have developed your own custom data-sources or list-editors, <a href="/contact/">I'd love to hear more about them.</a> <span style="color:firebrick;">&hearts;</span></p>
			
<?php
	$qry2 = $db->query("
SELECT
	contentmentVersion,
	COUNT(DISTINCT umbracoId) AS [count],
	GROUP_CONCAT(DISTINCT umbracoVersion) AS [umbracoVersions]
FROM
	dataTypes
GROUP BY
	contentmentVersion
ORDER BY
	[count] DESC,
	contentmentVersion ASC
;");
?>
			<h3 id="versions">Most popular versions</h3>
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
			<p>If you would prefer to opt-out and disable the telemetry feature, you can <a href="https://github.com/leekelleher/umbraco-contentment/blob/develop/docs/telemetry.md#disable-telemetry-feature" target="_blank" rel="noopener" ><strong>find a code snippet</strong> on the telemetry documentation page</a>.</p>

			<hr>

			<p>For any questions, issues or concerns about Contentment's telemetry feature, please either <a href="/contact/">contact me</a> or <a href="https://github.com/leekelleher/umbraco-contentment/discussions" target="_blank">start a discussion on GitHub</a>.</p>
			
		</article>
	</main>

	<?php include_once("$rootPath/.code/_footer.php"); ?>
