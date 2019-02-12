<?php

require_once("../../include/lib/Article.php");
require_once ("../../include/lib/ArticleDatabase.php");



//set header
$GLOBALS['title'] = "GraafschapWiki";
$GLOBALS['resFolder'] = "../../res/";
$GLOBALS['headerItems'] = array("<link rel=\"stylesheet\" href=\"../../res/css/content.css\">");
include "../../include/views/Header.php";
//CONTENT


$dbo = ArticleDatabase::getInstance();
$testArticle = $dbo->getArticle($_GET["article"]);
$testArticle->write();

//END CONTENT
include "../../include/views/Footer.php";
?>
