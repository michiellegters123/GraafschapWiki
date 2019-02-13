<?php

session_start();

require_once($GLOBALS["resFolder"] . "../include/config/Config.php");

?>

<!DOCTYPE html>
<html>
    <head>

        <title><?php echo $GLOBALS["title"]; ?></title>

        <script src="<?php echo $GLOBALS["resFolder"] . "js/Site.js" ?>"></script>
        <link rel="stylesheet" href="<?php echo $GLOBALS["resFolder"] . "css/site.css" ?>">
        <link rel="stylesheet" href="<?php echo $GLOBALS["resFolder"] . "css/content.css" ?>">
        <link rel="stylesheet" href="<?php echo $GLOBALS["resFolder"] . "css/std.css" ?>">


        <?php
        foreach ($GLOBALS['headerItems'] as $item)
        {
            echo $item;
        }
        ?>
    </head>
    <body>

        <div class="Container">
            <div class="SideBar">                       <!--Start sidebar-->
                <div class="DivLogo">
                    <img src="<?php echo $GLOBALS["resFolder"] . "img/logoGC.png" ?>">
                </div>
                <div class="DivLinkjes">
                    <ul>
                        <li><a href="http://localhost/GraafschapWiki/www.graafschapwiki.nl">Homepage</a></li>
                    </ul>
                </div>
            </div>    <!--einde sidebar-->


            <div class="DivHead"><!--Start Head-->
                <ul class="AccountBar">
                    <li>
                        <?php
                        if (isset($_SESSION["user"]))
                        {
                            if (isset($_SESSION["user"]["username"]))
                                echo $_SESSION["user"]["username"];
                            else
                                echo $_SESSION["user"]["email"];
                        }
                        else
                            echo "niet ingeloged"
                        ?>
                    </li>
                    <li><a href="http://localhost/GraafschapWiki/www.graafschapwiki.nl/Page/Login/inloggen.php">Inloggen</a></li>
                    <li><a href="http://localhost/GraafschapWiki/www.graafschapwiki.nl/Page/Login/registreren.php">Aanmelden</a></li>
                    <?php

                    if (isset($_SESSION["user"]))
                    {
                        if ($_SESSION["user"]["privilege"] >= $privilege["admin"])
                        {
                            echo "<li><a href='http://localhost/GraafschapWiki/www.graafschapwiki.nl/Page/Admin/Admin.php'>Admin Interface</a></li>";
                        }
                    }

                    ?>
                </ul>
                <ul class="ArticleOption ArticleAction">
                    <li class="Active">Read</li>
                    <li class="Inactive">Edit</li>
                </ul>
            </div>                                          <!--Einde head-->

            <div class="Content">

