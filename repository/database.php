<?php

class Database
{
    var $conn;
    var $results;
    var $statement;
 
    function connect()
    {
        $servername = "localhost";
        $username = "college";
        $password = "lambton";
        $dbname = 'quiz_assignment';

        $this->$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        if ($this->$conn->connect_error) die("Connection failed: " . $conn->connect_error);
    }

    function prepare($sql) { $this->$statement = $this->$conn->prepare($sql); }

    function bindParam($paramName, $paramValue) { $this->$statement->bindParam($paramName, $paramValue); }

    function close() { $this->$conn = null; }

    function execute()
    {
        $this->$statement->execute();
        $this->$result = $this->$statement->fetchAll();
    }
}

?>