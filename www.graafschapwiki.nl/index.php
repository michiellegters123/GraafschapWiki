<?php
require_once("include/lib/ArticleDatabase.php")
?>


<?php
$WWW_ROOT = "";
$PAGE_TITLE = "GraafschapWiki";
$HEADER_ITEMS = array("<link href='res/css/frontPage.css' rel='stylesheet' type='text/css'>");
include "include/views/Header.php"

?>

<?php
$article = ArticleDatabase::getInstance()->getArticleIdList();

echo "<table class='TableLink'>";
foreach ($article as $item)
{
    echo "<tr>";
    echo "<td><a class='LinkjesFront' href='Page/article/index.php?article=". $item["id"] ."'>". $item["title"] . "</a></td>";
    echo "<td>".$item["intro"]. "</td>";
    echo "</tr>";
}
echo "</table>";
?>
<?php

include "include/views/Footer.php";
?>