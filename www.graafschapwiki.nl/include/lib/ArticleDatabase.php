<?php
require_once("DataBase.php");

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

   public function getTitle()
   {
       $result = $this->runSQL("SELECT title FROM article");
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
   public function getIntro()
   {
       $result = $this->runSQL("SELECT intro FROM article");
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
   public function getId()
   {
       $result = $this->runSQL("SELECT articleid FROM article");
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
}