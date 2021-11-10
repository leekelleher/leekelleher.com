	<footer role="contentinfo">
	<?php if (empty($page->footer) === true) : ?>
		<p class="h-card">All content by <a rel="me" class="p-name u-url" href="https://leekelleher.com">Lee Kelleher</a> (<span>&copy; 2006-<?=date('Y')?></span>) and licensed under <a rel="license" href="https://creativecommons.org/licenses/by-sa/4.0/deed.en_GB" title="Creative Commons Attribution-ShareAlike 4.0 International ">Creative Commons</a>. All code snippets are licensed under the <a rel="license" href="https://opensource.org/licenses/MIT">MIT license</a>.</p>
		<p>This website is hand-coded using <abbr title="Hypertext Markup Language">HTML</abbr> and <abbr title="Cascading Style Sheets">CSS</abbr>, with a sprinkle of <abbr title="Hypertext Preprocessor">PHP</abbr> for dynamic bits. All code and content for this blog is available as <a href="https://github.com/leekelleher/leekelleher.com">open source on GitHub</a>.</p>
	<?php elseif (is_scalar($page->footer) == true): ?>
		<?=$page->footer?>
	<?php elseif (is_array($page->footer) == true): ?>
		<?php foreach($page->footer as $item) echo $item; ?>
	<?php endif; ?>
	</footer>
</body>
</html>