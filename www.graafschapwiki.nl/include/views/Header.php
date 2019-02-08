<?php


?>

<!DOCTYPE html>
<html>
    <head>

        <title><?php echo $GLOBALS["title"]; ?></title>

        <script src="<?php echo $GLOBALS["resFolder"] . "js/Site.js" ?>"></script>
        <link rel="stylesheet" href="<?php echo $GLOBALS["resFolder"] . "css/site.css" ?>">
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
            <div class="SideBar">   <!--Start sidebar-->
                <div class="DivLogo">
                    <img src="/../GraafschapWiki/www.graafschapwiki.nl/include/images/logoGC.png">
                </div>
                <div class="DivLinkjes">
                    <ul>
                        <li><a href="#">Linkje 1</a></li>
                    </ul>
                </div>
            </div>                  <!--einde sidebar-->
            <div class="divHead">   <!--Start Head-->

            </div>                  <!--Einde head-->

            <div class="Content">
