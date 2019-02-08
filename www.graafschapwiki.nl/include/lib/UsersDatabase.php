<?php

require_once("DataBase.php");

class UsersDatabase extends DataBase
{
    private static $instance;

    public function __construct()
    {
        parent::__construct("localhost", "users", "root", "");
    }

    public static function getInstance()
    {

        if (!isset(self::$instance))
        {
            self::$instance = new UsersDatabase();
        }

        return self::$instance;
    }
}