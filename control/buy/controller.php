<?php

class DBController {
    
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "thaiorange";
    private $conn;

    function __construct() {
        $this->conn = $this->connectDB();
    }

    function connectDB() {
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->database);
        return $conn;
    }

    function runQuery($query) {
        $result = mysqli_query($this->conn, $query);

        while($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
        return $resultset;
    }

    function numRow($query) {
        $result = mysqli_query($this->conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}


?>