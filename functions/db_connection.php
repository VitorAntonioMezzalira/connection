<?php

    // starts the connection with MySQL
    function OpenCon($dbname) {

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        return $conn;
    }

    // shutdown the connection with MySQL
    function CloseCon($conn) {
        $conn->close();
    }

    // test if the connection is works
    function TestCon($dbname) {
        
        $conn = OpenCon($dbname);

        if($conn->connect_error) {
            die("connection error: " . $conn->connect_error);
        }
        echo "connection sucessfully!";

        $conn = CloseCon($conn);
    }

    // create and drop the database | $dbact is "drop" or "create" | $dbname is que name of database
    function CreateDropDB($dbact, $dbname) {

        if($dbact == "create") {
            $conn = OpenCon("");
        } else {
            $conn = OpenCon($dbname);
        }
        
        $sql =  $dbact . " database " . $dbname . ";";
        
        if(mysqli_query($conn, $sql)) {
            return "Database " . $dbact . "!";
        } else {
            return "failed: ". mysqli_error($conn);
        }
        $conn = CloseCon($conn);
    }

    // directly command line method
    function ComandLine($dbname, $comm) {
        
        $conn = OpenCon($dbname);

        $sql = $comm;

        if(mysqli_query($conn, $sql)) {
            return "success!";
        } else {
            return "failed: ". mysqli_error($conn);
        }

        $conn = CloseCon($conn);
    }

    // select * from a table 
    function SelectAll($dbname, $tbname) {

        $conn = OpenCon($dbname);

        $sql = "SELECT * FROM $tbname";

        return $conn->query($sql);

        $conn = CloseCon($conn);

    }

    // return the results from the command
    function Search($dbname, $sql) {
        $conn = OpenCon($dbname);

        return $conn->query($sql);

        $conn = CloseCon($conn);

    }

    // select a row by ID
    function SelectById($dbname, $tbname, $id) {

        $conn = OpenCon($dbname);

        $sql = "SELECT * FROM $tbname WHERE id ='" . $id . "';";

        $result = $conn->query($sql);

        return $result->fetch_assoc();

        $conn = CloseCon($conn);

    }

    // delete a row
    function DeleteRow($dbname, $tbname, $id) {

        $conn = OpenCon($dbname);

        $sql = "DELETE FROM " . $tbname . " WHERE id = '" . $id . "';";

        if(mysqli_query($conn, $sql)) {
            return "Success!";
        } else {
            return "failed: ". mysqli_error($conn);
        }

        $conn = CloseCon($conn);

    }

    // get all ID rows
    function GetIdList($dbname, $tbname) {

        $conn = OpenCon($dbname);

        $sql = "SELECT id FROM $tbname";

        $result = $conn->query($sql);

        $i = 0;

        if($result->num_rows) {

            while($row = $result->fetch_assoc()) {
                $ids[$i] = $row['id'];
                $i++;
            }
            return $ids;
        }
    }

?>