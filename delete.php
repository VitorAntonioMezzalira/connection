<?php

    include "functions/db_connection.php";

    $id = $_GET["nId"];
    $dbname = "vitor";
    $tbname = "users";


    echo DeleteRow($dbname, $tbname, $id);

?>