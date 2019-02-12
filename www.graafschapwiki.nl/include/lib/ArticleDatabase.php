<?php
require_once("DataBase.php");
require_once("../../Page/Article/Paragraph.php"); //TODO: paragraph.php naar lib/

class ArticleDatabase extends DataBase
{
    private static $instance;

    public function __construct()
    {
        parent::__construct("localhost", "gcwiki", "root", "");
    }

    public static function getInstance()
    {

        if (!isset(self::$instance))
        {
            self::$instance = new ArticleDatabase();
        }

        return self::$instance;
    }

    public function getId($id)
    {
        $result = $this->runSQL("SELECT articleid FROM article WHERE articleid = '$id'");
        if($result)
        {
            $title = $result->fetch_assoc()['articleid'];
            return $title;
        }
        else
        {
            return "fail lol";
        }
    }

   public function getTitle($id)
   {
       $result = $this->runSQL("SELECT title FROM article WHERE articleid = '$id'");
       if($result)
       {
           $title = $result->fetch_assoc()['title'];
           return $title;
       }
       else
       {
           return "fail lol";
       }
   }
   public function getIntro($id)
   {
       $result = $this->runSQL("SELECT intro FROM article WHERE articleid = '$id'");
       if($result)
       {
           $title = $result->fetch_assoc()['intro'];
           return $title;
       }
       else
       {
           return "fail lol";
       }
   }

   public function getParagraphs($id)
   {
       $result = $this->runSQL("SELECT title, paragraphid FROM paragraph WHERE article = '$id'");
       if($result)
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

}