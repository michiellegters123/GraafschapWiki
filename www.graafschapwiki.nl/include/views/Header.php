<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}


if (!isset($WWW_ROOT))
    $WWW_ROOT = "../../";

if (!isset($PAGE_TITLE))
    $PAGE_TITLE = "GraafschapWiki";

if (!isset($HEADER_ITEMS))
    $HEADER_ITEMS = array();

if (!isset($PAGE_OPTIONS))
    $PAGE_OPTIONS = "";

require_once($WWW_ROOT . "include/config/Config.php");
require_once($WWW_ROOT . "include/lib/UsersDatabase.php");
$dbo = UsersDatabase::getInstance();
$dbo->refreshCurrentUser();

?>

<!DOCTYPE html>
<html>
    <head>

        <title><?php echo $PAGE_TITLE ?></title>

        <script src="<?php echo $GLOBALS["resFolder"] . "js/Site.js" ?>"></script>
        <link rel="stylesheet" href="<?php echo $WWW_ROOT . "res/css/site.css" ?>">
        <link rel="stylesheet" href="<?php echo $WWW_ROOT . "res/css/content.css" ?>">
        <link rel="stylesheet" href="<?php echo $WWW_ROOT . "res/css/std.css" ?>">


        <?php
        foreach ($HEADER_ITEMS as $item)
        {
            echo $item;
        }
        ?>
    </head>
    <body>

        <div class="Container">

            <div class="SideBar">                       <!--Start sidebar-->
                <div class="DivLogo">
                    <a href="../../index.php"><img src="<?php echo $WWW_ROOT . "res/img/logoGC.png" ?>"></a>
                </div>
                <div class="DivLinkjes">
                    <ul>
                        <li><a href="<?php echo $WWW_ROOT; ?> ">Homepage</a></li>
                    </ul>
                </div>
            </div>    <!--einde sidebar-->


            <div class="DivHead"><!--Start Head-->
                <ul class="AccountBar">
                    <li style="color: #3e4242">
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

                    <?php
                    if(isset ($_SESSION["user"]))
                    {
                        echo "<li><a href='".$WWW_ROOT."p/article/edit.php'>Nieuw Artikel</a></li>";

                    }
                    else
                    {
                        echo "<li><a href='".$WWW_ROOT."p/login/inloggen.php'>Inloggen</a></li>";
                        echo "<li><a href='".$WWW_ROOT."p/login/registreren.php'>Registreren</a></li>";
                    }

                    if (isset($_SESSION["user"]))
                    {
                        if ($_SESSION["user"]["privilege"] >= $privilege["admin"])
                        {
                            echo "<li><a href='" . $WWW_ROOT . "p/admin/admininterface.php" . "'>admin Interface</a></li>";
                        }
                    }

                    ?>
                </ul>
                <ul class="ArticleOption ArticleAction">
                    <?php
                    echo $PAGE_OPTIONS;
                    ?>
                </ul>
                <form style="float: right; margin-top: 4%" method="post" action="Page/Article/SearchArticle.php">
                    <input type="text" style="width: 200px" name="zoekBalk" placeholder="Artikel Zoeken">
                    <input type="submit">
                </form>
            </div>                                          <!--Einde head-->

            <div class="Content">

