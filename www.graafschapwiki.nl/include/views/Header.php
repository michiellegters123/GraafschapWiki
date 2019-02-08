<?php


?>

<!DOCTYPE html>
<html>
    <head>

        <title><?php echo $GLOBALS["title"]; ?></title>

        <script src="<?php echo $GLOBALS["resFolder"] . "js/Site.js" ?>"></script>
        <link rel="stylesheet" href="<?php echo $GLOBALS["resFolder"] . "css/site.css" ?>">

        <?php
        foreach ($GLOBALS['headerItems'] as $item)
        {
            echo $item;
        }
        ?>
    </head>
    <body>
        <div class="Container">
