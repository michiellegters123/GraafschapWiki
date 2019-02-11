<?php


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
                    <li>Niet aangemeld</li>
                    <li><a href="http://localhost/GraafschapWiki/www.graafschapwiki.nl/Page/Login/inloggen.php">Inloggen</a></li>
                    <li><a href="http://localhost/GraafschapWiki/www.graafschapwiki.nl/Page/Login/registreren.php">Regristreren</a></li>
                </ul>
                <ul class="ArticleOption ArticleAction">
                    <li class="Active">Read</li>
                    <li class="Inactive">Edit</li>
                </ul>
            </div>                                          <!--Einde head-->

            <div class="Content">
