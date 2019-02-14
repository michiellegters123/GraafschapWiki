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


if(isset($_POST["email"]) && isset($_POST["password"]))
{

    $dbo = UsersDatabase::getInstance();
    $ans = $dbo->tryLogin($_POST["email"], $_POST["password"]);

    if($ans === true)
    {
        loginSucess();
    }
    else
    {
        loginFail($ans);
    }
}