<?php

    include "../functions/db_connection.php";

    // test ID to dicover first free ID
    function IdGenerator($ids) {

        for($i = 0; $i < count($ids) + 1; $i++) {
            if($ids[$i] != $i) {
                $newId = $i;
                break;
            }
        }

        return $newId;
    }

    $dbname = "vitor";
    $tbname = "users";

    $ids = GetIdList($dbname, $tbname);

    $id = IdGenerator($ids);

    echo 
    '<nav>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="index.html">Users</a></li>
        </ul>
    </nav>';

    $nome = $_GET["nNome"];
    $tel = $_GET["nTel"];
    $mail = $_GET["nMail"];

    $comm = 'insert into ' . $tbname . ' (id, nome, telefone, email) values ("' . $id . '","' . $nome  . '", "' . $tel . '", "' . $mail . '");';

    echo ComandLine($dbname, $comm);
    
?>