<?php

require_once("Paragraph.php");



//set header
$GLOBALS['title'] = "GraafschapWiki";
$GLOBALS['resFolder'] = "../../res/";
$GLOBALS['headerItems'] = array("<link rel=\"stylesheet\" href=\"../../res/css/content.css\">");
include "../../include/views/Header.php";
//CONTENT

$testArticle = new Article("PHP");

$info = new Paragraph("info");
$info->addSub(new SubParagraph("de VOC", "GECOLONIZEERD"));
$info->addSub(new SubParagraph("opgericht", "20 maart 1602"));

$testArticle->addParagraph($info);

$testArticle->write();

//END CONTENT
include "../../include/views/Footer.php";
?>
