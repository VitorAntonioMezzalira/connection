<?php

    include "functions/db_connection.php";
    $dbname = "vitor";
    $nome = $_GET["nNome"];
    $tel = $_GET["nTel"];
    $mail = $_GET["nMail"];

    $comm = 'insert into users (nome, telefone, email) values ("' . $nome  . '", "' . $tel . '", "' . $mail . '");';

    echo ComandLine($dbname, $comm);
    
?>