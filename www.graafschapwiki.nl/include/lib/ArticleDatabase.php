<?php
require_once("DataBase.php");
require_once("Article.php");

class ArticleDatabase extends DataBase
{
    private static $instance;

    public function __construct()
    {
        parent::__construct();
    }

    public static function getInstance()
    {

        if (!isset(self::$instance))
        {
            self::$instance = new ArticleDatabase();
        }

        return self::$instance;
    }

    public function getArticle($id)
    {
        $article = new Article($this->getTitle($id), $this->getIntro($id));

        $paragraphs = $this->getParagraphs($id);

        foreach ($paragraphs as $paragraph)
        {
            $article->addParagraph($paragraph);
        }

        return $article;
    }

    private function getTitle($id)
    {
        $result = $this->runSQL("SELECT title FROM article WHERE articleid = '$id';");
        if ($result)
        {
            $title = $result->fetch_assoc()['title'];
            return $title;
        }
        else
        {
            return "fail lol";
        }
    }

    private function getIntro($id)
    {
        $result = $this->runSQL("SELECT intro FROM article WHERE articleid = '$id'");
        if ($result)
        {
            $title = $result->fetch_assoc()['intro'];
            return $title;
        }
        else
        {
            return "fail lol";
        }
    }

    private function getParagraphs($id)
    {
        $result = $this->runSQL("SELECT title, paragraphid FROM paragraph WHERE article = '$id'");
        if ($result)
        {
            $arr = array();
            while ($row = $result->fetch_assoc())
            {
                $paragraph = new Paragraph($row['title']);
                $pId = $row["paragraphid"];
                $subresult = $this->runSQL("SELECT title, content FROM subparagraph WHERE paragraph = '$pId'");

                while ($subrow = $subresult->fetch_assoc())
                {
                    $paragraph->addSub(new SubParagraph($subrow['title'], $subrow['content']));
                }

                array_push($arr, $paragraph);

            }
            return $arr;
        }
        else
        {
            return "fail lol";
        }
    }

    function getArticleIdList()
    {
        $result = $this->runSQL("SELECT articleid, title, intro FROM article WHERE verified = 1");
        $ids = array();

        while ($row = $result->fetch_assoc())
        {
            $article = array
            (
                "title" => $row["title"],
                "id" => $row["articleid"],
                "intro" => explode(".", $row["intro"], 2)[0] . "."
            );
            array_push($ids, $article);
        }

        return $ids;
    }

    function getUnverifiedArticles()
    {
        $result = $this->runSQL("SELECT articleid, title, intro, author FROM article WHERE verified = 0");
        $ids = array();

        while ($row = $result->fetch_assoc())
        {
            $article = array
            (
                "title" => $row["title"],
                "id" => $row["articleid"],
                "author" => $row["author"],
                "intro" => explode(".", $row["intro"], 2)[0] . "."
            );
            array_push($ids, $article);
        }

        return $ids;
    }

    function getArticleId($id)
    {
        $result = $this->runSQL("SELECT * FROM article WHERE articleid = $id");
        if ($result != null)
        {
            $row = $result->fetch_assoc();
            return $row;
        }

        return null;
    }

    function deleteArticle($id)
    {
        $paragraphs = $this->runSQL("SELECT paragraphid FROM paragraph WHERE article = '$id'");

        while ($row = $paragraphs->fetch_assoc())
        {
            $subid = $row["paragraphid"];
            $this->runSQL("DELETE FROM subparagraph WHERE paragraph = '$subid'");
        }

        $this->runSQL("DELETE FROM paragraph WHERE article = '$id'");
        $this->runSQL("DELETE FROM article WHERE articleid = '$id'");
    }

    function addArticle($title)
    {
        $this->runSQL("INSERT INTO article (title) VALUE '$title'");
    }

    function searchArticle($title)
    {
        $result = $this->runSQL("SELECT title FROM article WHERE title LIKE '%$title%'");

        if ($result)
        {
            $title = $result->fetch_assoc()['title'];
            return $title;
        }
    }

    function approve($id)
    {
        $target = $this->runSQL("SELECT target FROM article WHERE articleid = '" . $id . "'")->fetch_assoc()["target"];

        if ($target != -1)
        {
            $this->deleteArticle($target);
        }

        $this->runSQL("UPDATE article SET `verified` = 1, `target` = -1 WHERE articleid = '$id'");

    }

}