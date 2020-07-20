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
    $dbname = $_GET["nDb"];
    $tbname = $_GET["nTb"];

    $row = SelectById($dbname, $tbname, $id);

    // old row datas
    $columnsname[0] = "id";
    $columnsname[1] = "nome";
    $columnsname[2] = "telefone";
    $columnsname[3] = "email";

    // new row datas
    $newrows[0] = $_GET["nId"];
    $newrows[1] = $_GET["nNome"];
    $newrows[2] = $_GET["nTel"];
    $newrows[3] = $_GET["nMail"];

    $diferences = 0;
    $changes = []; // is the array of all changes doing in the row

    for($i = 0; $i < count($row); $i++) {
        if($row[$columnsname[$i]] !== $newrows[$i]){ // compare old rows with news
            
            $changes[$diferences] = $newrows[$i]; // changes receive the new data
            $column[$diferences] = $columnsname[$i]; // column receibe the name of respective change
            $diferences += 1; // count the number of changes
        }
    }

    for($i = 0; $i < count($changes); $i++) {

        $sql = "UPDATE " . $tbname . // table name
          " SET " . $column[$i] . " =  '" . $changes[$i] . // column name and change
          "' WHERE id = " . $id . ";"; // row ID

          ComandLine($dbname, $sql); // send the changes for the database 
    }

    echo '<button onclick="goBack()">return</button> 
    <script>
        function goBack() {
            window.location.href = document.referrer;
        }
    </script>';

?>