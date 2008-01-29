<?php
// --------------------------------------------------------------------------------
// WPTeX : create a book with your wordpress blog
// --------------------------------------------------------------------------------
// License GNU/GPL2 - K.A  - Jan 2008
// http://www.xhtml-css.com/wptex
// --------------------------------------------------------------------------------

// FileRead
function FileRead($fichier){
    $id = fopen($fichier,"r");
    $lect = fread($id,filesize($fichier));
    $k = fclose($id);
    return ($lect);
}

// FileWrite
function FileWrite($fichier,$text){
    $id = fopen($fichier,"w");
    $ecrit = fwrite($id,$text);
    $k = fclose($id);
    return($ecrit);
}

// accents and special characters 
// to be converted to LaTeX equivalents
function converttexaccents($str){
	$str=str_replace('�' , '\`a' ,$str);
	$str=str_replace('�' , '\`A' ,$str);
	$str=str_replace('�' , "\'a" ,$str);
	$str=str_replace('�' , "\'A" ,$str);
	$str=str_replace('�' , '\^a' ,$str);
	$str=str_replace('�' , '\^A' ,$str);
	$str=str_replace('�' , '\~a' ,$str);
	$str=str_replace('�' , '\~A' ,$str);
	$str=str_replace('�' , '\"a' ,$str);
	$str=str_replace('�' , '\"A' ,$str);
	$str=str_replace('�' , '\aa' ,$str);
	$str=str_replace('�' , '\AA' ,$str);
	$str=str_replace('�' , '\ae' ,$str);
	$str=str_replace('�' , '\oe' ,$str);
	$str=str_replace('�' , '\AE' ,$str);
	$str=str_replace('�' , '\OE' ,$str);
	$str=str_replace('�' , '\`e' ,$str);
	$str=str_replace('�' , '\`E' ,$str);
	$str=str_replace('�' , "\'e" ,$str);
	$str=str_replace('�' , "\'E" ,$str);
	$str=str_replace('�' , '\^e' ,$str);
	$str=str_replace('�' , '\^E' ,$str);
	$str=str_replace('�' , '\"e' ,$str);
	$str=str_replace('�' , '\"E' ,$str);
	$str=str_replace('�' , '\`i' ,$str);
	$str=str_replace('�' , '\`I' ,$str);
	$str=str_replace('�' , "\'i" ,$str);
	$str=str_replace('�' , "\'I" ,$str);
	$str=str_replace('�' , '\^i' ,$str);
	$str=str_replace('�' , '\^I' ,$str);
	$str=str_replace('�' , '\"i' ,$str);
	$str=str_replace('�' , '\"I' ,$str);
	$str=str_replace('�' , '\`o' ,$str);
	$str=str_replace('�' , '\`O' ,$str);
	$str=str_replace('�' , "\'o" ,$str);
	$str=str_replace('�' , "\'O" ,$str);
	$str=str_replace('�' , '\^o' ,$str);
	$str=str_replace('�' , '\^O' ,$str);
	$str=str_replace('�' , '\~o' ,$str);
	$str=str_replace('�' , '\~O' ,$str);
	$str=str_replace('�' , '\"o' ,$str);
	$str=str_replace('�' , '\"O' ,$str);
	$str=str_replace('�' , '\o' ,$str);
	$str=str_replace('�' , '\O' ,$str);
	$str=str_replace('�' , '\`u' ,$str);
	$str=str_replace('�' , '\`U' ,$str);
	$str=str_replace('�' , "\'u" ,$str);
	$str=str_replace('�' , "\'U" ,$str);
	$str=str_replace('�' , '\^u' ,$str);
	$str=str_replace('�' , '\^' ,$str);
	$str=str_replace('�' , '\"u' ,$str);
	$str=str_replace('�' , '\"U' ,$str);
	$str=str_replace('�' , '\~n' ,$str);
	$str=str_replace('�' , '\~N' ,$str);
	$str=str_replace('�' , '\c c' ,$str);
	$str=str_replace('�' , '\c C' ,$str);
	$str=str_replace('�' , "\'y" ,$str);
	$str=str_replace('�' , "\'Y" ,$str);
	$str=str_replace('�' , '\ss' ,$str);
	$str=str_replace('�' , '<<' ,$str);
	$str=str_replace('�' , '>>' ,$str);
	$str=str_replace('�' , '$^\circ$' ,$str);
return($str);

}

//convert chars given by their codes
function numericentitieshtml($str){
  return utf8_encode(preg_replace('/&#(\d+);/e', 'chr(str_replace(";","",str_replace("&#","","$0")))', $str));
}

//converts an html string to LaTeX
function htmlTOlatex($str){
	$str=str_replace('<p>',"",$str);
	$str=str_replace('</p>',"",$str);

	$str=str_replace('<ul>',"\\begin{itemize}\n",$str);
	$str=str_replace('<ol>',"\\begin{enumerate}\n",$str);
	$str=str_replace('</ul>',"\\end{itemize}\n",$str);
	$str=str_replace('</ol>',"\\end{enumerate}\n",$str);
	$str=str_replace('<li>',"\\item ",$str);
	$str=str_replace('</li>',"\n",$str);
	$str=str_replace('<br />',"\n",$str);

	$str=str_replace('<!--more-->'," ",$str);
	$str=str_replace('&',"\&",$str);
	$str=str_replace('&amp;',"\&",$str);
	$str=str_replace('&quot;','"',$str);
	$str=str_replace('&mdash;','--',$str);


	$str=str_replace('<h4>',"\\subsection{",$str);
	$str=str_replace('</h4>',"}\n\n",$str);

	$str=str_replace('<em>',"\\emph{",$str);
	$str=str_replace('<em class="author">',"\\emph{",$str);
	$str=str_replace('</em>',"}",$str);
	$str=str_replace('<b>',"\\textbf{",$str);
	$str=str_replace('</b>',"}",$str);

	$str=str_replace('<sup>',"",$str);
	$str=str_replace('</sup>',"",$str);

	$str=str_replace('<strong>',"\\textbf{",$str);
	$str=str_replace('</strong>',"}",$str);

	$str=str_replace('target="_blank"',"",$str);
	$linkpattern='<a href="([A-Za-z0-9$_\.+!*,;/?:@&~=-]+)">([A-Za-z0-9$_\.+!*,;/?:@&~=-]+)</a>';
	$linkpatterntitled='<a href="([A-Za-z0-9$_\.+!*,;/?:@&~=-]+)" title="([A-Za-z0-9$_\.+!*,;/?:@&~=-]+)">([A-Za-z0-9$_\.+!*,;/?:@&~=-]+)</a>';
	$linkrep='\href{\\1}{\\2}';
	$linkreptitled='\href{\\1}{\\3}';

	$str=ereg_replace($linkpattern,$linkrep,$str);
	$str=ereg_replace($linkpatterntitled,$linkreptitled,$str);

	return (converttexaccents($str));
}

//main functions

// customize the book template
function GenerateTemplate($tplfile,$info){
    $textpl =  FileRead($tplfile);

    foreach($info as $k=>$v){
        $textpl = str_replace("<$k>",converttexaccents(stripslashes($v)),$textpl);
    }

    return($textpl);
}

// Generate the book content from WP
function GenerateTex($keywords=''){

    //keywords to be used in the book's index 
    // given as a comma separated list.
    if(isset($keywords) && ($keywords!='')){
        $indexcontent=htmlTOlatex($keywords);
        $indexcontent=str_replace("\r\n","\n",$indexcontent);
        $indexcontent=str_replace("\r","\n",$indexcontent);
        $index=explode(",",$indexcontent);
    }


    $cats=get_categories('show_count=1&exclude=19&orderby=count&order=desc');

    foreach($cats as $c){
        $catid=$c->cat_ID;
        $catnom=$c->category_nicename;

        $texcontent.= "\\chapter{".htmlTOlatex(html_entity_decode(utf8_decode(ucfirst($catnom))))."}\n\n";
        $categoryvariable=$cat; // assign the variable as current category
        $query= 'cat=' . $catid. '&orderby=date&order=asc&showposts=50000'; // concatenate the query
        $posts=query_posts($query);
        
        // the Loop
        foreach(array_reverse($posts,TRUE) as $p){ 
            
            // the content of the post
            $texcontent.= '\\section{'.htmlTOlatex(html_entity_decode(utf8_decode($p->post_title)))."}\n";
            $postbody= htmlTOlatex(html_entity_decode(utf8_decode($p->post_content)))."\n\n";

            //integrate index if keywords given
            if(is_array($keywords)){
                foreach ($index as $keyword){
                    if(trim($keyword)!='')
                        $postbody=str_replace(" $keyword "," $keyword  \\index{".$keyword."}",$postbody);
                        $postbody=str_replace(" $keyword".'s '," $keyword".'s '." \\index{".$keyword."}",$postbody); //pluriel
                }
            }

            $texcontent.=$postbody;
            $i++;
        }
    }

    return $texcontent;
}
?>
