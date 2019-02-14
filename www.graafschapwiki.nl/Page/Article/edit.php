<?php

require_once("../../include/lib/Article.php");
require_once("../../include/lib/ArticleDatabase.php");
require_once("../../include/config/Config.php");

//set header
$HEADER_ITEMS = array("<link rel=\"stylesheet\" href=\"../../res/css/content.css\">",
    "<script src='../../res/js/Edit.js'></script>");
$PAGE_OPTIONS = "
    <li class='Inactive'><form id='ReadFrm' action='index.php'><input type='hidden' name='article' value='". (isset($_GET["article"]) ? $_GET["article"] : "") ."'></form>
     <a onclick=\"document.getElementById('ReadFrm').submit();\">Read</a></li>
    <li class='Active'>Edit</li>
    ";
include "../../include/views/Header.php";

if(isset($_SESSION["user"]))
{

    if (isset($_GET["article"]))
    {
        $dbo = ArticleDatabase::getInstance();
        $testArticle = $dbo->getArticle($_GET["article"]);


        if ($testArticle)
            $testArticle->writeForm();
        else
            echo "<h1>Article not found!</h1>";
    }
    else
    {

        echo "<h1>Article not found!</h1>";
    }
}
else
{
    echo "<h1>Login to edit articles</h1>";
}

//END CONTENT
include "../../include/views/Footer.php";
?>