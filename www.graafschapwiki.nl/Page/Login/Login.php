<?php

require_once("../../include/lib/UsersDatabase.php");

function loginSucess()
{
    include "../../include/views/Header.php";

    ?>

    <h1 class="Title">You are now logged in!</h1>

    <?php

    include "../../include/views/Footer.php";
}

function loginFail($reason)
{
    include "../../include/views/Header.php";

    ?>

    <h1 class="Title">Failed to login</h1>
    <p class="ContentText"> Reason: <?php echo $reason; ?> </p>

    <?php

    include "../../include/views/Footer.php";
}

$GLOBALS['title'] = "GraafschapWiki - Login";
$GLOBALS['resFolder'] = "../../res/";
$GLOBALS['headerItems'] = array();


if(isset($_POST["username"]) && isset($_POST["password"]))
{

    $dbo = UsersDatabase::getInstance();
    if($dbo->tryLogin($_POST["username"], $_POST["password"]))
    {
        loginSucess();
        $_SESSION["username"] = $_POST["username"];
    }
    else
    {
        loginFail("Badlogin info");
    }
}