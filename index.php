<?php
// --------------------------------------------------------------------------------
// WPTeX : create a book with your wordpress blog
// --------------------------------------------------------------------------------
// License GNU/GPL2 - K.A  - Jan 2008
// http://www.xhtml-css.com/wptex
// --------------------------------------------------------------------------------

require('../wp-blog-header.php');
require('libs/functions.php');
include_once('libs/pclzip.lib.php');

//error_reporting(E_ALL);

$phase2 = false;
$tex_generated = false;

if(isset($_POST['generate'])){
    $texfile =  realpath(dirname(__FILE__)).'/tmp/bookcontent.tex';
    $textplfile =  realpath(dirname(__FILE__)).'/book/book.tex';
    $textplcustomizedfile =  realpath(dirname(__FILE__)).'/tmp/book.tex';
    $texstylefile =  realpath(dirname(__FILE__)).'/book/style.tex';
    $texcoverfile =  realpath(dirname(__FILE__)).'/book/cover.jpg';

    //generate the content of the book
    $texcontent = GenerateTex($_POST['keywords']);
    $tex_generated = FileWrite($texfile,$texcontent);

    //generate the customized book template
    $textplcontent = GenerateTemplate($textplfile,$_POST);
    $textpl_generated = FileWrite($textplcustomizedfile,$textplcontent);

    
    $archive = new PclZip(realpath(dirname(__FILE__)).'/tmp/book.zip');
    $v_list = $archive->create("$texfile,$textplcustomizedfile,$texstylefile,$texcoverfile",PCLZIP_OPT_REMOVE_ALL_PATH);
    
    if ($v_list == 0) {
        $tex_generated=false;
    }

    $phase2=true;
}

//echo;
include ('view.php');

?>
