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
	$str=str_replace('à' , '\`a' ,$str);
	$str=str_replace('À' , '\`A' ,$str);
	$str=str_replace('á' , "\'a" ,$str);
	$str=str_replace('Á' , "\'A" ,$str);
	$str=str_replace('â' , '\^a' ,$str);
	$str=str_replace('Â' , '\^A' ,$str);
	$str=str_replace('ã' , '\~a' ,$str);
	$str=str_replace('Ã' , '\~A' ,$str);
	$str=str_replace('ä' , '\"a' ,$str);
	$str=str_replace('Ä' , '\"A' ,$str);
	$str=str_replace('å' , '\aa' ,$str);
	$str=str_replace('Å' , '\AA' ,$str);
	$str=str_replace('æ' , '\ae' ,$str);
	$str=str_replace('¿' , '\oe' ,$str);
	$str=str_replace('Æ' , '\AE' ,$str);
	$str=str_replace('¿' , '\OE' ,$str);
	$str=str_replace('è' , '\`e' ,$str);
	$str=str_replace('È' , '\`E' ,$str);
	$str=str_replace('é' , "\'e" ,$str);
	$str=str_replace('É' , "\'E" ,$str);
	$str=str_replace('ê' , '\^e' ,$str);
	$str=str_replace('Ê' , '\^E' ,$str);
	$str=str_replace('ë' , '\"e' ,$str);
	$str=str_replace('Ë' , '\"E' ,$str);
	$str=str_replace('ì' , '\`i' ,$str);
	$str=str_replace('Ì' , '\`I' ,$str);
	$str=str_replace('í' , "\'i" ,$str);
	$str=str_replace('Í' , "\'I" ,$str);
	$str=str_replace('î' , '\^i' ,$str);
	$str=str_replace('Î' , '\^I' ,$str);
	$str=str_replace('ï' , '\"i' ,$str);
	$str=str_replace('Ï' , '\"I' ,$str);
	$str=str_replace('ò' , '\`o' ,$str);
	$str=str_replace('Ò' , '\`O' ,$str);
	$str=str_replace('ó' , "\'o" ,$str);
	$str=str_replace('Ó' , "\'O" ,$str);
	$str=str_replace('ô' , '\^o' ,$str);
	$str=str_replace('Ô' , '\^O' ,$str);
	$str=str_replace('õ' , '\~o' ,$str);
	$str=str_replace('Õ' , '\~O' ,$str);
	$str=str_replace('ö' , '\"o' ,$str);
	$str=str_replace('Ö' , '\"O' ,$str);
	$str=str_replace('ø' , '\o' ,$str);
	$str=str_replace('Ø' , '\O' ,$str);
	$str=str_replace('ù' , '\`u' ,$str);
	$str=str_replace('Ù' , '\`U' ,$str);
	$str=str_replace('ú' , "\'u" ,$str);
	$str=str_replace('Ú' , "\'U" ,$str);
	$str=str_replace('û' , '\^u' ,$str);
	$str=str_replace('Û' , '\^' ,$str);
	$str=str_replace('ü' , '\"u' ,$str);
	$str=str_replace('Ü' , '\"U' ,$str);
	$str=str_replace('ñ' , '\~n' ,$str);
	$str=str_replace('Ñ' , '\~N' ,$str);
	$str=str_replace('ç' , '\c c' ,$str);
	$str=str_replace('Ç' , '\c C' ,$str);
	$str=str_replace('ý' , "\'y" ,$str);
	$str=str_replace('Ý' , "\'Y" ,$str);
	$str=str_replace('ß' , '\ss' ,$str);
	$str=str_replace('«' , '<<' ,$str);
	$str=str_replace('»' , '>>' ,$str);
	$str=str_replace('°' , '$^\circ$' ,$str);
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
