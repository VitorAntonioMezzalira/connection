<?php

    include "functions/db_connection.php";

    $dbname = $_GET["nNameCreate"];
    
   // $dbname = $_GET["nNameDrop"];

    if(CreateDB($dbname)) {
        echo "Database Created!";
    } 
    if(!CreateDB($dbname)) {
        echo "database don't create!";
    }

?>