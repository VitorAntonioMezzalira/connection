<?php

    include "../functions/db_connection.php";

    $dbname = $_GET["dbname"];
    $tbname = $_GET["tbname"];
    $id = 2;
    
    print_r(SelectById($dbname, $tbname, $id))

?>