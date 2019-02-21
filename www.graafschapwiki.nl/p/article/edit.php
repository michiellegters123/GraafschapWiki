<?php

require_once("../../include/lib/Article.php");
require_once("../../include/lib/ArticleDatabase.php");
require_once("../../include/config/Config.php");

//set header
$PAGE_TITLE = "GraafschapWiki - edit";
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
        //check if article has target
        $dbo = ArticleDatabase::getInstance();
        $target = $dbo->getArticleId($_GET["article"]);

        if($target["target"] != -1)
        {
            echo "<h1>Original</h1>";
            echo "<br>";

            $dbo->getArticle($target["target"])->write();

            echo "<br>";
            echo "<h1>Edited</h1>";
            echo "<br>";
            echo "<br>";
            echo "<br>";

        }


        $testArticle = $dbo->getArticle($_GET["article"]);


        if ($testArticle)
            $testArticle->writeForm($_GET["article"]);
        else
            echo "<h1>article not found!</h1>";
    }
    else
    {

        echo "<h1>article not found!</h1>";
    }
}
else
{
    echo "<h1>login to edit articles</h1>";
}

//END CONTENT
include "../../include/views/Footer.php";
?>