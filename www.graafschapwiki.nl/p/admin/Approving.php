<?php
include "../../include/views/Header.php";
include "../../include/views/Admin.php";
require_once "../../include/lib/ArticleDatabase.php";

$Id = $_POST["id"];

if ($approve = isset($_POST["approve"]))
{
    $command = "approve";
}
else
{
    $command = "remove";
}

echo $Id;
if ($command == "approve")
{
    $approve = ArticleDatabase::getInstance()->approve($Id);
}
else
{
    $remove = ArticleDatabase::getInstance()->deleteArticle($Id);
}
include "../../include/views/Footer.php";

?>