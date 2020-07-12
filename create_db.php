<?php

    include "functions/db_connection.php";

    $dbname = $_GET["nNameCreate"];
    $dbact = $_GET["nAction"];

    echo CreateDropDB($dbact, $dbname);

?>