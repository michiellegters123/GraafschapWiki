<?php
$GLOBALS['title'] = "GraafschapWiki - Admin Interfae";
$GLOBALS['resFolder'] = "../../res/";
$GLOBALS['headerItems'] = array();
include "../../include/views/Header.php";

include "../../include/views/Admin.php";
require_once "../../include/lib/UsersDatabase.php";
?>

<table>
    <tr>
        <th>UserId</th>
        <th>privilege</th>
        <th>Username</th>
        <th>Email</th>
        <th>Is Banned</th>
    </tr>

    <?php
    $users = UsersDatabase::getInstance()->getUsers();
    foreach ($users as $user)
    {
        echo "<tr><form action='ChangeUser.php' method='post'>";
        echo "<td><input type='text' name='id' style='pointer-events: none; background-color: lightgray' value='".$user["userid"]." '></td>";
        echo "<td><input type='text' name='rank' value='".$user["privilege"]."'></td>";
        echo "<td><input type='text' name='username' value='".$user["username"]."'></td>";
        echo "<td><input type='text' name='email' value='".$user["email"]."'></td>";
        echo "<td><input type='checkbox' name='banned' ". ($user["banned"] ? "checked='checked'" : "") ."></td>";

        echo "<td class='ButtonClass'><input type='submit' value='Wijzigen'></td>";
        echo "</form></tr>";

    }
    ?>
</table>
<?php
include "../../include/views/Footer.php";
?>

