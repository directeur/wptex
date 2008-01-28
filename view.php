<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">

<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="media/style.css" type="text/css" media="screen" title="default"  media="screen" />
<title>WPTEX &raquo; Turn your wordpress into a book</title>
</head>

<body>

	<div id="container">
			<h1 id="logo">WPTeX</h1>
			<p class="description center">Turn your wordpress blog into a PDF eBook using LaTeX!</p>
            
            <ul id="menu">
                <li><a href="index.php" title="start here">Start</a></li>
                <li><a href="about.html" title="about">About</a></li>
                <li><a href="faq.html" title="FAQ">FAQ</a></li>
                <li><a href="download.html" title="download">Download</a></li>
            </ul>
			<div id="texte">
                
                <?php if(!$phase2): ?>
                <h2>Easy to use.</h2>
				<p>
                    If you want to add an Index to your book, please type in 
                    the text area some keywords separated with commas. 
                    Every keyword you type will be included in the book's index.<br />
                    <strong>Example</strong>: mac, pc, linux, python, php, program, loop&hellip;<br />
                    You can insert as many keywords as you want.
				</p>
                <form action="index.php" method="post">
                    <fieldset>
                    <legend>About the book</legend>
                    <p>
                        <label for="title">Title of the book</label><br />
                        <input type="text" id="title" name="title" size="35" />
                    </p>

                    <p>
                        <label for="subtitle">A subtitle maybe? (optional)</label><br />
                        <input type="text" id="subtitle" name="subtitle" size="35" />
                    </p>
                    <p>
                        <label for="author">The name of the author</label><br />
                        <input type="text" id="author" name="author" size="35" />
                    </p>
                    </fieldset>

                    <fieldset>
                    <legend>Your keywords here:</legend>
                    <p>
                        <textarea name="keywords" cols="56" rows="10"></textarea>
                    </p>
                    </fieldset>
                    <fieldset class="buttonspanel">
                    <p class="right">
                        <input type="submit" name="generate" value=" Generate my book, dear ! " class="button" />
                    </p>
                    </fieldset>
                </form>

                <?php else: ?>
                   <?php if($tex_generated): ?>
                        <h2>LaTeX book generated succefully!</h2>
                        <p>
                        Great! Now, you can download this file (by clicking on the big blue link below), 
                        uncompress it to your desktop and convert the file named "book.tex" found in the 
                        uncompressed directory to pdf easily with your favorite tool.
                        </p>
                        <p class="download">
                            <a href="tmp/book.zip" title="your book" class="download">LaTeX Version of the Blog</a>
                        </p>

                        <h2>If you're a mac</h2>
                        <p>
                            Open the file "book.tex" with TeXShop and typeset it using "LaTeX" first, 
                            then "MakeIndex", and another time with "LaTeX" and you'll have your shiny book.
                        </p>

                        <h2>If you're a linux</h2>
                        <p>
                            John Resig has a <a href="http://ejohn.org/projects/latex2pdf/" title="latex2pdf">simple solution for you</a>.
                        </p>

                        <h2>Any windows User here?</h2>
                        <p>
                            How are you doing that?
                        </p>

                   <?php else: ?>
                        <h2>Ouch!</h2>
                        <p>
                            Something went wrong. 
                        </p>

                   <?php endif; ?>
                <?php endif; ?>
                

                
                <div id="footer">
                <p>
                WPTEX is &copy;  <a href="http://akoncept.com" title="Innovate Humanum 
                Est">akoncept</a> and freely available under the <acronym title="Word Wide Web 
                Consortium">GPL2</acronym> licence. 
                </p>
                <p>
                     <!-- socialize -->
                        <a href="javascript:location.href='http://digg.com/submit?phase=2&amp;url='+encodeURIComponent(document.location.href)+' '">
                        <img src="http://digg.com/img/badges/32x32-digg-guy.png" width="32" height="32" alt="Digg it!" />
                        </a>
                        &nbsp;
                        <a href="http://del.icio.us/post" onclick="window.open('http://del.icio.us/post?v=4&amp;noui&amp;jump=close&amp;url='+encodeURIComponent(location.href)+'&amp;title='+encodeURIComponent(document.title), 'delicious','toolbar=no,width=700,height=400'); return false;"><img src="http://xhtml-css.com/static/delicious32.gif" alt="del.icio.us"/>
                        </a>
                        &nbsp;
                        <a href="javascript:location.href='http://reddit.com/submit?url='+encodeURIComponent(document.location.href)+' '"><img src="http://static.reddit.com/blog_snoo.png" alt="Reddit" /></a>
                         <a href="http://twitter.com/directeur" title="follow us on twitter"><img src="http://xhtml-css.com/static/twitter.jpg" alt="twitter" />
                         </a>  
                        &nbsp;<a href="http://feeds.feedburner.com/xhtml-css" title="subscribe to our feeds"><img src="http://static.xhtml-css.com/feed-icon.png" height="28" width="28" alt="subscribe to our feeds" /></a>
                </p>
                </div> 
			</div>
	</div>

</body>

</html>

