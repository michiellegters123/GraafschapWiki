<?php
$GLOBALS['title'] = "GraafschapWiki - Admin Interfae";
$GLOBALS['resFolder'] = "../../res/";
$GLOBALS['headerItems'] = array();
include "../../include/views/Header.php";

include "../../include/views/Admin.php";
require_once "../../include/lib/UsersDatabase.php";
?>

<form method='get' action="Users.php">
    <input type='text' name='q' style='width: 200px' placeholder='Zoeken (Deel van Email)'>
    <input type='submit' value='Zoeken'>
</form>
<br>
<table>
    <tr>
        <th>UserId</th>
        <th>privilege</th>
        <th>Username</th>
        <th>Email</th>
    </tr>

    <?php

    $email = isset($_GET["q"]) ? $_GET["q"] : "";
    $users = UsersDatabase::getInstance()->getUsers($email);
    foreach ($users as $user)
    {
        echo "<tr><form action='ChangeUser.php' method='post'>";
        echo "<td><input type='text' name='id' style='pointer-events: none; background-color: lightgray' value='".$user["userid"]." '></td>";
        echo "<td><input type='text' name='rank' value='".$user["privilege"]."'></td>";
        echo "<td><input type='text' name='username' value='".$user["username"]."'></td>";
        echo "<td><input type='text' name='email' value='".$user["email"]."'></td>";
        echo "<td class='ButtonClass'><input type='submit' value='Wijzigen'></td>";
        echo "</form></tr>";

    }
    ?>
</table>
<?php
include "../../include/views/Footer.php";
?>

