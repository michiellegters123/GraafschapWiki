<?php

require_once("../../include/lib/Article.php");
require_once("../../include/lib/ArticleDatabase.php");


//set header
$HEADER_ITEMS = array("<link rel=\"stylesheet\" href=\"../../res/css/content.css\">");
$PAGE_OPTIONS = "
    <li class='Active'>Read</li>
    <li class='Inactive'><form id='EditFrm' action='edit.php'><input type='hidden' name='article' value='". (isset($_GET["article"]) ? $_GET["article"] : "") ."'></form>
     <a onclick=\"document.getElementById('EditFrm').submit();\">Edit</a></li>
    ";

if (isset($_GET["article"]))
{
    $dbo = ArticleDatabase::getInstance();
    $testArticle = $dbo->getArticle($_GET["article"]);

    $PAGE_TITLE = "GraafschapWiki - " . $testArticle->getTitle();
    include "../../include/views/Header.php";
    //CONTENT

    if ($testArticle)
        $testArticle->write();
    else
        echo "<h1>article not found!</h1>";
}
else
{
    include "../../include/views/Header.php";
    //CONTENT

    echo "<h1>article not found!</h1>";
}

//END CONTENT
include "../../include/views/Footer.php";
?>
