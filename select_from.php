<?php

    include "functions/db_connection.php";

    $dbname = "vitor";
    $tbname = "users";

    //echo $text;

    SelectAll($dbname, $tbname);
    echo "<style>
    .delete {
        background-color: red;
        color: black;
        padding: 0px;
        margin: 0px;
    }

    .update {
        background-color: yellow;
        color: black;
        padding: 0px;
        margin: 0px;
    }

    .delete a {
        color: black;
        text-decoration: none;
        padding: 5px;
    }

    .update a {
        color: black;
        text-decoration: none;
        padding: 5px;
    }
    </style>";
?>