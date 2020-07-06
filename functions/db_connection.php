<?php

    // starts the connection with MySQL
    function OpenCon() {

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";

        $conn = new mysqli($dbhost, $dbuser, $dbpass);

        return $conn;

    }

    // shutdown the connection with MySQL
    function CloseCon($conn) {
        $conn->close();
    }

    // test if the connection is works
    function TestCon() {
        
        $conn = OpenCon();

        if($conn->connect_error) {
            die("connection error: " . $conn->connect_error);
        }
        echo "connection sucessfully!";

        $conn = CloseCon($conn);
    }

    // create a database | $dbname argument is the name of database
    function CreateDB($dbname) {

        $conn = OpenCon();

        $sql = "create database " . $dbname . ";";
        
        if(mysqli_query($conn, $sql)) {
            return "Database created!";
        } else {
            return "failed: ". mysqli_error($conn);
        }

        $conn = CloseCon($conn);
    }

    // drop a database | $dbname argument is the name of database
    function DropDB($dbname) {

        $conn = OpenCon();

        $sql = "drop database " . $dbname . ";";
        
        if(mysqli_query($conn, $sql)) {
            return "Database droped!";
        } else {
            return "failed: ". mysqli_error($conn);
        }

        $conn = CloseCon($conn);

    }

?>