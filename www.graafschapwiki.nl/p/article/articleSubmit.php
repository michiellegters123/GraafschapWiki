<?php
require_once("../../include/lib/Article.php");
require_once("../../include/lib/ArticleDatabase.php");
require_once("../../include/config/Config.php");

$HEADER_ITEMS = array("<link rel=\"stylesheet\" href=\"../../res/css/content.css\">");
include "../../include/views/Header.php";

$newArticle = new Article($_POST["title"], $_POST["intro"]);

/*
foreach ($_POST as $key => $item)
{

    echo $key . "<br>";
    echo $item . "<br>";
    echo "<br>";
}*/

$pNum = 0;
foreach ($_POST as $key => $item)
{
    if (substr($key, 0, 4) === "P_T_")
    {
        $paragraf = new Paragraph($_POST[$key]);
        $newArticle->addParagraph($paragraf);
        $pNum++;

        //foreach sub
        $sNum = 0;
        foreach ($_POST as $subKey => $subP)
        {
            if (substr($subKey, 0, 4) === "S_T_")
            {
                $titleKey = "S_T_" . $pNum . "_" . $sNum;
                $contentKey = "S_C_" . $pNum . "_" . $sNum;
                if(isset($_POST[$titleKey]) && isset($_POST[$contentKey]))
                {
                    $paragraf->addSub(new SubParagraph($_POST[$titleKey], $_POST[$contentKey]));
                    $sNum++;
                }

            }
        }
    }
}

$dbo = ArticleDatabase::getInstance();
$isApproved = $_SESSION["user"]["privilege"] >= $privilege["edit"] ? true : false;
//$querry =  $newArticle->generateQuerry($isApproved, $isApproved ? -1 : $_POST["id"]);
$querry =  $newArticle->generateQuerry(false, $_POST["id"], $_SESSION["user"]["userid"]);
$result = $dbo->getConnection()->multi_query($querry);


if($result)
{
    echo "<h1>succes</h1>";
}
else
{
    echo "<h1>fail</h1>";
    echo  mysqli_error($dbo->getConnection());
}

include "../../include/views/Footer.php";


?>