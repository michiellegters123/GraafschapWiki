<?php

require_once("Paragraph.php");
require_once ("../../include/lib/ArticleDatabase.php");




//set header
$GLOBALS['title'] = "GraafschapWiki";
$GLOBALS['resFolder'] = "../../res/";
$GLOBALS['headerItems'] = array("<link rel=\"stylesheet\" href=\"../../res/css/content.css\">");
include "../../include/views/Header.php";
//CONTENT


$dbo = ArticleDatabase::getInstance();


$testArticle = new Article("Verhalen");


$info = new Paragraph("Over Leeraren");
$info->addSub(new SubParagraph( $dbo->getTitle(), $dbo->getIntro(), $dbo->getId()));


$testArticle->addParagraph($info);

$testArticle->write();

//END CONTENT
include "../../include/views/Footer.php";
?>
