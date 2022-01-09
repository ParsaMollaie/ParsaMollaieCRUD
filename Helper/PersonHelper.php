<?php

namespace CRUD\Helper;
use CRUD\Model\Person;

class PersonHelper
{
    private $db;

    public function __construct()
    {
        $this->db = new DBConnector( "db", "localhost", "username", "password");
        $this->db->connect();
    }

    public function insert(Person $person)
    {
        // $id = $_POST['id'];
        // $firstName = $_POST['firstName'];
        // $lastName = $_POST['lastName'];
        // $username = $_POST['username'];

        $this->db->execQuery("INSERT INTO Persons (id, firstName, lastName,username) VALUES ($person->getId(), $person->getFirstName(), $person->getLastName(), $person->getUsername())");
          
       
    }

    public function fetch(int $id)
    {
        $sql = "SELECT id, firstname, lastname, username FROM person WHERE id = $id";
        $result = $this->db->execQuery($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Name: " . $row["firstName"] . " " . $row["lastName"] . "Username: " . $row["username"] . "<br>";
            }
          } else {
            echo "0 results";
          }


    }

    public function fetchAll()
    {

        $sql = "SELECT * FROM person";
        $result = $this->db->execQuery($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Name: " . $row["firstName"] . " " . $row["lastName"] . "Username: " . $row["username"] . "<br>";
            }
          } else {
            echo "0 results";
          }


    }

    public function update()
    {
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];
        $sql = "UPDATE person SET firstname='$firstName', lastname='$lastName' WHERE username='$username'";
        $this->db->execQuery($sql);


    }

    public function delete()
    {
        
        $sql = "DELETE FROM person WHERE username='$_POST['username']'";
        $this->db->execQuery($sql);
        
    }

}