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


$testArticle = new Article($dbo->getTitle(1));

$paragraphs = $dbo->getParagraphs(1);

foreach ($paragraphs as $paragraph)
{
    $testArticle->addParagraph($paragraph);
}

$testArticle->write();

//END CONTENT
include "../../include/views/Footer.php";
?>
