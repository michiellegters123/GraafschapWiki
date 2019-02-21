<?php

$PAGE_TITLE = "GraafschapWiki - Quallity Controll";
include "../../include/views/Header.php";

include "../../include/views/Admin.php";
require_once "../../include/lib/ArticleDatabase.php";
require_once "../../include/lib/UsersDatabase.php";
require_once "../../include/config/Config.php";

$list = ArticleDatabase::getInstance()->getUnverifiedArticles();

echo "<h2>Unauthorized articles</h2>";

if (count($list) == 0)
{
    echo "<h2>no submitted articles!</h2>";
}
else
{
    echo "<table>";
    echo
    "
        <tr>
            <th>Link</th>
            <th>Author</th>
        </tr>
    ";

    foreach ($list as $item)
    {
        $title = $item["title"];
        $id = $item["id"];
        $authorName = UsersDatabase::getInstance()->getUserById($item["author"])["email"];

        echo "<tr>";
        echo "<td><a href='../article/edit.php?article=$id'>$title</a></td>";
        echo "<td>$authorName</td>";
        echo "<td><button>Approve</button></td>";
        echo "<td><button>Remove</button></td>";
        echo "</tr>";
    }
    echo "</table>";
}

include "../../include/views/Footer.php";
