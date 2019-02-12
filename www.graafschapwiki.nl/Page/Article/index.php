<?php

require_once("../../include/lib/Article.php");
require_once("../../include/lib/ArticleDatabase.php");


//set header
$GLOBALS['title'] = "GraafschapWiki";
$GLOBALS['resFolder'] = "../../res/";
$GLOBALS['headerItems'] = array("<link rel=\"stylesheet\" href=\"../../res/css/content.css\">");
include "../../include/views/Header.php";
//CONTENT

if (isset($_GET["article"]))
{
    $dbo = ArticleDatabase::getInstance();
    $testArticle = $dbo->getArticle($_GET["article"]);
    if ($testArticle)
        $testArticle->write();
    else
        echo "<h1>Article not found!</h1>";
}
else
{
    echo "<h1>Article not found!</h1>";
}

//END CONTENT
include "../../include/views/Footer.php";
?>
