<?php

class DataBase
{
    private $m_serverName;
    private $m_username;
    private $m_password;
    private $m_database;
    private $m_connection;

    public function __construct(string $serverName = "localhost", string $database = "gcwiki",
        string $username = "root", string $password = "")
    {
        $this->m_serverName = $serverName;
        $this->m_username = $username;
        $this->m_password = $password;
        $this->m_database = $database;

        $this->m_connection = $this->createConnection();
    }

    public function getConnection()
    {
        return $this->m_connection;
    }

    private function createConnection()
    {
        $connection = new mysqli($this->m_serverName, $this->m_username, $this->m_password);
        $connection->set_charset("utf8");

        if ($connection->connect_error)
        {
            die("Failed to connect to server: " . $this->m_serverName . " e:" . $connection->connect_error);
        }
        else
        {
            if ($connection->query("USE $this->m_database") != TRUE)
            {
                die("Failed to connect to data base: " . $this->m_database);
            }
            else
            {
                return $connection;
            }
        }
    }

    public function runSQL(string $querry)
    {
        $result = $this->m_connection->query($querry);

        if (!$result)
        {
            return null;
        }
        else
        {
            return $result;
        }
    }
}
