<?php

require_once("DataBase.php");

class UsersDatabase extends DataBase
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
            self::$instance = new UsersDatabase();
        }

        return self::$instance;
    }

    private function generateHash(string $password)
    {
        $options = array
        (
            'salt' => random_bytes(64),
            'cost' => 12,
        );

        return password_hash($password, PASSWORD_BCRYPT, $options);
    }

    private function verify($hash, $password)
    {
        return password_verify($password, $hash);
    }

    public function tryLogin($email, $password)
    {
        $result = $this->runSQL("SELECT password FROM users WHERE email = '$email'");
        if ($result)
        {
            return $this->verify($row = $result->fetch_assoc()['password'], $password);
        }
        else
        {
            return "invalid email";
        }
    }

    public function register($username, $email, $password)
    {
        $result = $this->getUser($email);
        if ($result != null)
        {
            if (!is_null($result['email']) || !is_null($result['username']))
                return "username or email already taken";
        }


        $hash = $this->generateHash($password);

        if ($username != "")
            $result = $this->runSQL("INSERT INTO users(`username`, `email`, `password`) VALUES ('$username', '$email', '$hash')");
        else
            $result = $this->runSQL("INSERT INTO users(`email`, `password`) VALUES ('$email', '$hash')");

        if ($result)
            return true;
        else
            return "kut voor je";
    }

    public function getUser($email)
    {
        $result = $this->runSQL("SELECT * FROM users WHERE email = '$email'");
        if ($result != null)
        {
            $row = $result->fetch_assoc();
            return $row;
        }

        return "";
    }

    public function getUsers()
    {
        $result = $this->runSQL("SELECT userid, privilege, username, email FROM users ORDER BY privilege DESC");

        $userArray = array();

        while ($row = $result->fetch_assoc())
        {
            array_push($userArray, $row);
        }
        return $userArray;
    }

}