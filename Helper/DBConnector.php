<?php

namespace CRUD\Helper;



class DBConnector
{

    /** @var mixed $db */
    private $db;
    private string $servername;
    private string $username;
    private string $password;
    private $conn;

    public function __construct($db, $servername, $username, $password)
    {
        $this-> db = $db;
        $this-> servername = $servername;
        $this-> username = $username;
        $this-> password = $password;

    }

    /**
     * @throws \Exception
     * @return void
     */
    public function connect() : void
    {
        
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->db);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully";
        

    }

    /**
     * @param string $query
     * @return bool
     */
    public function execQuery(string $query) : bool
    {
        if ($this->conn->query($query) == true) {
           return true;
        }
        return false;
    }

    /**
     * @param string $message
     * @throws \Exception
     * @return void
     */
    private function exceptionHandler(string $message): void
    {

        echo $message;

    }
}