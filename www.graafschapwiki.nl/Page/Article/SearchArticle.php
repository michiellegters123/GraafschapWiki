<?php
require_once "../../include/lib/ArticleDatabase.php";


$dbo = ArticleDatabase::getInstance()->searchArticle($_POST["zoekBalk"]);
echo $dbo;
?>