<?php

$GLOBALS['title'] = "GraafschapWiki - Login";
$GLOBALS['resFolder'] = "../../res/";
$GLOBALS['headerItems'] = array();
include "../../include/views/Header.php";

require_once("../../include/config/Config.php");

if(isset($_SESSION["user"]))
{
    if($_SESSION["user"]["privilege"] < $privilege["admin"])
        die("<h1>403 niet doen</h1>");
}
else
{
    die("you are not logged in");
}


include "../../include/views/Footer.php";