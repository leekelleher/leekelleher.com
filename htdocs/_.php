<?php
	$page = (object)['meta' => (object)[], 'header' => (object)[], 'footer' => (object)[]];
	
	$page->meta->title = 'leekelleher.com';
	$page->meta->description = 'Some description.';
	
	$page->header->logo = (object)['url' => '/assets/img/nxnw_80x80.png', 'name' => 'logo'];
	$page->header->title = 'Lee Kelleher';
	$page->header->nav = [
		(object)[ 'name' => 'About', 'url' => '/about/' ],
		(object)[ 'name' => 'Weeknotes', 'url' => '/weeknotes/' ],
		(object)[ 'name' => 'Contact', 'url' => '/contact/' ],
	];
	
	$page->footer = ['<p>Hello</p>', '<p>foo bar</p>'];
	
	include_once('.code/_header.php');
?>
	<main>
		<aside class="left">
			<h4>Weeknotes</h4>
			<ul>
				<li><a href="#">Week 01</a></li>
				<li><a href="#">Week 02</a></li>
				<li><a href="#">Week 03</a></li>
				<li><a href="#">Week 04</a></li>
			</ul>
		</aside>

		<article>
			<h1>Testing display of HTML elements</h1>
			<h2>This is 2nd level heading</h2>
			<p>This is a test paragraph.</p>
			<h3>This is 3rd level heading</h3>
			<p>This is a test paragraph.</p>
			<h4>This is 4th level heading</h4>
			<p>This is a test paragraph.</p>
			<h5>This is 5th level heading</h5>
			<p>This is a test paragraph.</p>
			<h6>This is 6th level heading</h6>
			<p>This is a test paragraph.</p>

			<h2>Basic block level elements</h2>
			
			<p>This is a normal paragraph (<code>p</code> element). To add some length to it, let us mention that this page was primarily written for testing the effect of <strong>user style sheets</strong>. You can use it for various other purposes as well, like just checking how your browser displays various HTML elements.</p>
			<p>This is another paragraph. I think it needs to be added that the set of elements tested is not exhaustive in any sense. I have selected those elements for which it can make sense to write user style sheet rules, in my opionion.</p>
			
			<pre><code class="lang-csharp"><span style="color:#008000;">// This is a code snippet.</span>
Console.WriteLine(<span style="color:#a31515;">"Hello World!"</span>);</code></pre>

			<div>This is a <code>div</code> element. Authors may use such elements instead of paragraph markup for various reasons. (End of <code>div</code>.)</div>

			<blockquote>
				<p>This is a block quotation containing a single paragraph. Well, not quite, since this is not <em>really</em> quoted text, but I hope you understand the point. After all, this page does not use HTML markup very normally anyway.</p>
			</blockquote>
					
		</article>

		<aside class="right">
			<ul>
				<li><a href="#">Link 1</a></li>
				<li><a href="#">Link 2</a></li>
				<li><a href="#">Link 3</a></li>
				<li><a href="#">Link 4</a></li>
			</ul>
		</aside>
	</main>
<?php include_once('.code/_footer.php'); ?>
