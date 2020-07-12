<?php

    include "functions/db_connection.php";

    $id = $_GET["nId"];
    $dbname = $_GET["nDb"];
    $tbname = $_GET["nTb"];

    $row = SelectById($dbname, $tbname, $id);

    count($row); // return array length

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

    for($i = 0; $i < count($row); $i++) {
        if($row[$columnsname[$i]] !== $newrows[$i]){
            
            $changes[$diferences] = $newrows[$i];
            $column[$diferences] = $columnsname[$i];
            $diferences += 1;

        }
    }

    $sql = "";

    for($i = 0; $i < count($changes); $i++) {
        $sql = "UPDATE " . $tbname . " SET " . $column[$i] . " = " . $changes[$i] . " WHERE id = " . $id . ";";
    }

    echo ComandLine($dbname, $sql);

    //update users 
    //set 

    //print_r($changes);
    //print_r($column)
?>