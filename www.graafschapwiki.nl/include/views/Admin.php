<?php


require_once("../../include/config/Config.php");

if(isset($_SESSION["user"]))
{
    if($_SESSION["user"]["privilege"] < $privilege["admin"])
        die("<h1>403 Stuur een email naar nathan@1488.nl voor admin stuur je paypal naam en wachtwoord mee</h1>");
}
else
{
    die("<h1>you are not logged in<h1>");
}


