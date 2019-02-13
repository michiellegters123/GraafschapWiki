<?php
$GLOBALS['title'] = "GraafschapWiki - Admin Interfae";
$GLOBALS['resFolder'] = "../../res/";
$GLOBALS['headerItems'] = array();
include "../../include/views/Header.php";

include "../../include/views/Admin.php";
require_once "../../include/lib/UsersDatabase.php";

$id = $_POST["id"];
$rank = $_POST["rank"];
$username = $_POST["username"];
$email = $_POST["email"];
$banned = isset($_POST["banned"]) ? 1 : 0;



$sql = "UPDATE `users` SET `banned` = $banned, `privilege`= '$rank',`username`='$username',`email`='$email' WHERE userid = '$id'";
$result = UsersDatabase::getInstance()->runSQL($sql);

if ($result)
{
    ?>
    <script>
        window.history.back();
    </script>

    <?php
}
else
{
    echo "<h1>keal doe normaal</h1>";
}
include "../../include/views/Footer.php";
?>