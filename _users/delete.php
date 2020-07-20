<?php

    include "../functions/db_connection.php";

    echo 
    '<nav>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="index.html">Users</a></li>
        </ul>
    </nav>';

    $id = $_GET["nId"];
    $dbname = "vitor";
    $tbname = "users";

    echo DeleteRow($dbname, $tbname, $id);

    echo "<br><a href='select_from.php?dbname=vitor&tbname=users'>return</a>";


?>