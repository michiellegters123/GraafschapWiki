<?php

$PAGE_TITLE = "GraafschapWiki - Quallity Controll";
include "../../include/views/Header.php";

include "../../include/views/Admin.php";
require_once "../../include/lib/ArticleDatabase.php";
require_once "../../include/lib/UsersDatabase.php";
require_once "../../include/config/Config.php";

$list = ArticleDatabase::getInstance()->getUnverifiedArticles();

echo "<h2>Unapproved articles</h2>";

if (count($list) == 0)
{
    echo "<h2>no atricle to be approved!</h2>";
}
else
{
    echo "<table>";
    echo
    "
        <tr>
            <th>Id</th>
            <th>Link</th>
            <th>Author</th>
        </tr>
    ";

    foreach ($list as $item)
    {
        $title = $item["title"];
        $id = $item["id"];
        $authorName = UsersDatabase::getInstance()->getUserById($item["author"])["email"];


        echo "<form method='post' action='Approving.php'>";
        echo "<tr>";
        echo "<td><input value='".$id."' name='id'></td>";
        echo "<td><a href='../article/edit.php?article=$id'>$title</a></td>";
        echo "<td>$authorName</td>";
        echo "<td><input type='submit' value='approve' name='approve'></td>";
        echo "<td><input type='submit' value='remove' name='remove'></form></td>";
        echo "</tr>";
    }
    echo "</table>";
}

include "../../include/views/Footer.php";
