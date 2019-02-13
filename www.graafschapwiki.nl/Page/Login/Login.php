<?php

require_once("../../include/lib/UsersDatabase.php");

$_SESSION["username"] = null;
$_SESSION["email"] = null;

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


if(isset($_POST["email"]) && isset($_POST["password"]))
{

    $dbo = UsersDatabase::getInstance();
    if($dbo->tryLogin($_POST["email"], $_POST["password"]))
    {
        $user = $dbo->getUser($_POST["email"]);

        if(!$user["banned"])
        {
            loginSucess();
            $_SESSION["user"] = $user;
        }
        else
        {
            loginFail("You are banned! yer a cunt");
            session_abort();
        }
    }
    else
    {
        loginFail("Badlogin info");
    }
}