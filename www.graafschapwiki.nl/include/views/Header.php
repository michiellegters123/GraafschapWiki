<?php

session_start();

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
                        if(isset($_SESSION["username"]))
                            echo $_SESSION["username"];
                        else if(isset($_SESSION["email"]))
                            echo $_SESSION["email"];
                        else
                            echo "niet ingeloged"
                        ?>
                    </li>
                    <li><a href="http://localhost/GraafschapWiki/www.graafschapwiki.nl/Page/Login/inloggen.php">Inloggen</a></li>
                    <li><a href="http://localhost/GraafschapWiki/www.graafschapwiki.nl/Page/Login/registreren.php">Regristreren</a></li>
                </ul>

                <form method="get" action="<?php echo $GLOBALS["resFolder"] . "../Page/Search/Search.php" ?>">
                    <input class="SearchBar" type="text" name="s" title="Search" placeholder="Search GraafschapWiki">
                </form>
                <ul class="ArticleOption ArticleAction">
                    <li class="Active">Read</li>
                    <li class="Inactive">Edit</li>
                </ul>
            </div>                                          <!--Einde head-->

            <div class="Content">
