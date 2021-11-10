<?php
	$page = (object)['meta' => (object)[], 'header' => (object)[]];
	
	$page->meta->title = 'Lee Kelleher';
	$page->meta->description = 'The personal website of Lee Kelleher';
	$page->meta->keywords = 'leekelleher,kelleher';
	$page->meta->rss = true;
	$page->meta->styles = ".years {margin:0;padding:0;list-style:none;}
.years > li {margin:0 0 10px;padding:0;display:flex;align-items:center;}
.years > li > a {font-size:1.5rem;}
.months {margin:0 0 0 10px;padding:0;list-style:none;display:flex;flex-flow:wrap;}
.months > li {margin:5px;}
";
	
	$page->header->logo = (object)['url' => '/assets/img/nxnw_80x80.png', 'name' => 'logo'];
	$page->header->title = 'Lee Kelleher';
	$page->header->nav = [
		(object)[ 'name' => 'About', 'url' => '/about/' ],
		(object)[ 'name' => 'Weeknotes', 'url' => '/weeknotes/' ],
		(object)[ 'name' => 'Contact', 'url' => '/contact/' ],
	];
	
	include_once('.code/_header.php');
?>
	<script type="application/ld+json">{"@context": "http://schema.org","@type": "Person","name": "Lee Kelleher","image": "https://leekelleher.com/assets/img/nxnw_300x300.jpg","sameAs": ["https://twitter.com/leekelleher","https://github.com/leekelleher","https://www.facebook.com/leekelleher","https://www.linkedin.com/in/leekelleher/","https://our.umbraco.com/members/leekelleher/","https://stackoverflow.com/users/12787/leekelleher"],"url": "https://leekelleher.com","gender": "http://schema.org/Male","jobTitle": "Umbraco Consultant"}</script>

	<main>
		<article>
			<h2>Hello</h2>
			<p>Hiya, welcome to my personal website.</p>
			<p>I'm still in the process of reconstruction my website, although I say that, it'll probably remain in a constant state of flux.</p>
			<p>This year (2021, so far) I've been <a href="/weeknotes/">journaling my weeknotes</a>, if you would like to have a read?</p>
			
			<h2>Posts archive by year and month</h2>
			<ol class="years">
				<li>
					<a href="/weeknotes/2021/">2021</a>
					<ol class="months">
						<li>Weeknotes ongoing&hellip;</li>
					</ol>
				</li>
				<li>
					<a href="/2020/" title="2 posts published in 2020">2020</a>
					<ol class="months">
						<li><a href="/2020/01/" title="2 posts published in January 2020">January</a></li>
					</ol>
				</li>
				<li>
					<a href="/2019/" title="4 posts published in 2019">2019</a>
					<ol class="months">
						<li><a href="/2019/01/" title="1 post published in January 2019">January</a></li>
						<li><a href="/2019/02/" title="1 post published in February 2019">February</a></li>
						<li><a href="/2019/04/" title="1 post published in April 2019">April</a></li>
						<li><a href="/2019/08/" title="1 post published in August 2019">August</a></li>
					</ol>
				</li>
				<li>
					<a href="/2018/" title="4 posts published in 2018">2018</a>
					<ol class="months">
						<li><a href="/2018/01/" title="1 post published in January 2018">January</a></li>
						<li><a href="/2018/08/" title="1 post published in August 2018">August</a></li>
						<li><a href="/2018/11/" title="1 post published in November 2018">November</a></li>
						<li><a href="/2018/12/" title="1 post published in December 2018">December</a></li>
					</ol>
				</li>
				<li>
					<a href="/2016/" title="11 posts published in 2016">2016</a>
					<ol class="months">
						<li><a href="/2016/03/" title="1 post published in March 2016">March</a></li>
						<li><a href="/2016/05/" title="4 posts published in May 2016">May</a></li>
						<li><a href="/2016/06/" title="2 posts published in June 2016">June</a></li>
						<li><a href="/2016/07/" title="1 post published in July 2016">July</a></li>
						<li><a href="/2016/08/" title="1 post published in August 2016">August</a></li>
						<li><a href="/2016/09/" title="1 post published in September 2016">September</a></li>
						<li><a href="/2016/10/" title="1 post published in October 2016">October</a></li>
					</ol>
				</li>
				<li>
					<a href="/2014/" title="5 posts published in 2014">2014</a>
					<ol class="months">
						<li><a href="/2014/03/" title="3 posts published in March 2014">March</a></li>
						<li><a href="/2014/05/" title="1 post published in May 2014">May</a></li>
						<li><a href="/2014/11/" title="1 post published in November 2014">November</a></li>
					</ol>
				</li>
				<li>
					<a href="/2013/" title="5 posts published in 2013">2013</a>
					<ol class="months">
						<li><a href="/2013/09/" title="2 posts published in September 2013">September</a></li>
						<li><a href="/2013/10/" title="1 post published in October 2013">October</a></li>
						<li><a href="/2013/11/" title="1 post published in November 2013">November</a></li>
						<li><a href="/2013/12/" title="1 post published in December 2013">December</a></li>
					</ol>
				</li>
				<li>
					<a href="/2012/" title="2 posts published in 2012">2012</a>
					<ol class="months">
						<li><a href="/2012/02/" title="2 posts published in February 2012">February</a></li>
					</ol>
				</li>
				<li>
					<a href="/2011/" title="6 posts published in 2011">2011</a>
					<ol class="months">
						<li><a href="/2011/01/" title="1 post published in January 2011">January</a></li>
						<li><a href="/2011/06/" title="1 post published in June 2011">June</a></li>
						<li><a href="/2011/07/" title="1 post published in July 2011">July</a></li>
						<li><a href="/2011/09/" title="2 posts published in September 2011">September</a></li>
						<li><a href="/2011/10/" title="1 post published in October 2011">October</a></li>
					</ol>
				</li>
				<li>
					<a href="/2010/" title="5 posts published in 2010">2010</a>
					<ol class="months">
						<li><a href="/2010/01/" title="2 posts published in January 2010">January</a></li>
						<li><a href="/2010/04/" title="1 post published in April 2010">April</a></li>
						<li><a href="/2010/05/" title="1 post published in May 2010">May</a></li>
						<li><a href="/2010/08/" title="1 post published in August 2010">August</a></li>
					</ol>
				</li>
				<li>
					<a href="/2009/" title="15 posts published in 2009">2009</a>
					<ol class="months">
						<li><a href="/2009/01/" title="1 post published in January 2009">January</a></li>
						<li><a href="/2009/02/" title="1 post published in February 2009">February</a></li>
						<li><a href="/2009/04/" title="3 posts published in April 2009">April</a></li>
						<li><a href="/2009/06/" title="2 posts published in June 2009">June</a></li>
						<li><a href="/2009/07/" title="3 posts published in July 2009">July</a></li>
						<li><a href="/2009/09/" title="3 posts published in September 2009">September</a></li>
						<li><a href="/2009/10/" title="1 post published in October 2009">October</a></li>
						<li><a href="/2009/11/" title="1 post published in November 2009">November</a></li>
					</ol>
				</li>
				<li>
					<a href="/2008/" title="40 posts published in 2008">2008</a>
					<ol class="months">
						<li><a href="/2008/01/" title="1 post published in January 2008">January</a></li>
						<li><a href="/2008/02/" title="7 posts published in February 2008">February</a></li>
						<li><a href="/2008/03/" title="9 posts published in March 2008">March</a></li>
						<li><a href="/2008/04/" title="7 posts published in April 2008">April</a></li>
						<li><a href="/2008/05/" title="2 posts published in May 2008">May</a></li>
						<li><a href="/2008/06/" title="5 posts published in June 2008">June</a></li>
						<li><a href="/2008/07/" title="5 posts published in July 2008">July</a></li>
						<li><a href="/2008/08/" title="1 post published in August 2008">August</a></li>
						<li><a href="/2008/11/" title="2 posts published in November 2008">November</a></li>
						<li><a href="/2008/12/" title="1 post published in December 2008">December</a></li>
					</ol>
				</li>
				<li>
					<a href="/2007/" title="46 posts published in 2007">2007</a>
					<ol class="months">
						<li><a href="/2007/01/" title="10 posts published in January 2007">January</a></li>
						<li><a href="/2007/02/" title="9 posts published in February 2007">February</a></li>
						<li><a href="/2007/03/" title="5 posts published in March 2007">March</a></li>
						<li><a href="/2007/04/" title="7 posts published in April 2007">April</a></li>
						<li><a href="/2007/05/" title="4 posts published in May 2007">May</a></li>
						<li><a href="/2007/06/" title="6 posts published in June 2007">June</a></li>
						<li><a href="/2007/07/" title="2 posts published in July 2007">July</a></li>
						<li><a href="/2007/11/" title="1 post published in November 2007">November</a></li>
						<li><a href="/2007/12/" title="2 posts published in December 2007">December</a></li>
					</ol>
				</li>
				<li>
					<a href="/2006/" title="14 posts published in 2006">2006</a>
					<ol class="months">
						<li><a href="/2006/03/" title="1 post published in March 2006">March</a></li>
						<li><a href="/2006/04/" title="1 post published in April 2006">April</a></li>
						<li><a href="/2006/06/" title="1 post published in June 2006">June</a></li>
						<li><a href="/2006/09/" title="2 posts published in September 2006">September</a></li>
						<li><a href="/2006/10/" title="6 posts published in October 2006">October</a></li>
						<li><a href="/2006/11/" title="2 posts published in November 2006">November</a></li>
						<li><a href="/2006/12/" title="1 post published in December 2006">December</a></li>
					</ol>
				</li>
			</ol>

		
			<h2>Tag archive</h2>
			<p>In a previous life, this website was powered by various blog engines. I'd tagged many of the older posts.<br>You can <a href="/tag/">view a weighted tag cloud and a listing of all the tags.</a></p>
			
		</article>
	</main>

<?php include_once('.code/_footer.php'); ?>