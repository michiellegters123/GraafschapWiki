<?php
$PAGE_TITLE = "GraafschapWiki - UserDataBase";
include "../../include/views/Header.php";

include "../../include/views/Admin.php";
require_once "../../include/lib/UsersDatabase.php";
require_once "../../include/config/Config.php";


$email = isset($_GET["q"]) ? $_GET["q"] : "";
$users = UsersDatabase::getInstance()->getUsers($email);
?>

<form method='get' action="users.php">
    <input type='text' name='q' style='width: 200px' placeholder='Zoeken (Deel van Email)'>
    <input type='submit' value='Zoeken'>
</form>

<?php

if (count($users) > 0)
{
    ?>
    <br>
    <table>
        <tr>
            <th>UserId</th>
            <th>privilege</th>
            <th>Username</th>
            <th>Email</th>
            <th>Is Banned</th>
        </tr>

        <?php

        foreach ($users as $user)
        {
            echo "<tr><form action='changeuser.php' method='post'>";
            echo "<td><input type='text' name='id' style='pointer-events: none; background-color: lightgray' value='" . $user["userid"] . " '></td>";
            echo "<td><input type='text' name='rank' value='" . $user["privilege"] . "'></td>";
            echo "<td><input type='text' name='username' value='" . $user["username"] . "'></td>";
            echo "<td><input type='text' name='email' value='" . $user["email"] . "'></td>";

            if ($user["privilege"] < $privilege["admin"])
            {
                echo "<td><input type='checkbox' name='banned' " . ($user["banned"] ? "checked='checked'" : "") . "></td>";
            }
            else
            {
                echo "<td></td>";
            }

            echo "<td class='ButtonClass'><input type='submit' value='Wijzigen'></td>";
            echo "</form></tr>";

        }
        ?>
    </table>
    <?php
}
else
{
    echo "<h1>No results found</h1>";
}
include "../../include/views/Footer.php";
?>

