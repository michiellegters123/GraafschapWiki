<?php

require_once("../../include/lib/UsersDatabase.php");


$GLOBALS['title'] = "GraafschapWiki - Login";
$GLOBALS['resFolder'] = "../../res/";
$GLOBALS['headerItems'] = array();

include "../../include/views/Header.php";


function loginSucess()
{

    ?>

    <h1 class="Title">You are now signed up!</h1>
    <p class="ContentText"> now login you cumslut </p>

    <?php

}

function loginFail($reason)
{

    ?>

    <h1 class="Title">Failed to Register</h1>
    <p class="ContentText"> Reason: <?php echo $reason; ?> </p>

    <?php

}

if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["email"]))
{
    $dbo = UsersDatabase::getInstance();

    $result = $dbo->register($_POST['username'], $_POST["email"], $_POST["password"]);
    if($result === true)
        loginSucess();
    else
        loginFail($result);
}

include "../../include/views/Footer.php";
