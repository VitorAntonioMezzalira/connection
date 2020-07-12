<?php

    include "functions/db_connection.php";

    $id = $_GET["nId"];
    $dbname = $_GET["dbname"];
    $tbname = $_GET["tbname"];

    $row = SelectById($dbname, $tbname, $id);

    echo 
        '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <style>
                .hiden {
                    display:none;
                }
            </style>
        </head>
        <body> 
            
            <form method="GET" action="update01.php"><legend>Modo de edição</legend>
            
            <p class="hiden"><input type="text" id="iDb" name="nDb" value="' . $dbname . '"></p>
            <p class="hiden"><input type="text" id="iTb" name="nTb" value="' . $tbname . '"></p>
            <p class="hiden"><input type="text" id="iId" name="nId" value="' . $id . '"></p>

            <p><label for="iNome">Nome:</label><input value="' . $row["nome"] . '" type="text" id="iNome" name="nNome"></p>
            <p><label for="iTel">Telefone:</label><input value="' . $row["telefone"] . '" type="text" id="iTel" name="nTel"></p>
            <p><label for="iMail">E-mail:</label><input value="' . $row["email"] . '" type="text" id="iMail" name="nMail"></p>
            <input type="submit" value="Salvar">
            
        </form>



        </body>
        </html>';



?>






