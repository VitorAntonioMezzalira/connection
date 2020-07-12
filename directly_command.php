<?php

    include "functions/db_connection.php";

    $comm = $_GET["nCommand"];
    $dbname = $_GET["nNameDB"];

    echo ComandLine($dbname, $comm);

    echo "<br><p><a href='directly_command.html'>return</a></p>";

?>