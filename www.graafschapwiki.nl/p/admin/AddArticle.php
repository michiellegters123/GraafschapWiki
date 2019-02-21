<?php
include "../../include/views/Header.php";
require_once("../../include/lib/ArticleDatabase.php");
include "../../include/views/Admin.php";

?>

<form method="post" action="AddArticle.php">
    Title:
    <input type="text" placeholder="Title" name="Title">
    <input type="submit" value="Aanmaken" name="Invoeren">
</form>

<?php

$dbo = ArticleDatabase::getInstance()->addArticle($_POST["Title"]);

include "../../include/views/Footer.php";


?>