<?php

    include "../functions/db_connection.php";

    echo 
    '<nav>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="index.html">Users</a></li>
        </ul>
    </nav>';

    // receive data search
    $search_nome = $_GET['nSearchNome'];
    $search_tel = $_GET['nSearchTel'];
    $search_mail = $_GET['nSearchMail'];

    // Database/table names
    $dbname = "vitor";
    $tbname = "users";

    // SQL command
    $sql = 'SELECT * FROM ' . $tbname . ' WHERE nome LIKE "%' . $search_nome . 
    '%" AND telefone LIKE "%' . $search_tel . 
    '%" AND email LIKE "%' . $search_mail . '%";';

    // receive the rows to database from function
    $result = Search($dbname, $sql);

    // if rows more then zero
    if($result->num_rows > 0) {
        $text = "<table>";
        while($row = $result->fetch_assoc()) {

            $text .= "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["nome"] . "</td>
            <td>" . $row["telefone"] . "</td>
            <td>" . $row["email"] . "</td>
            <td class='update'><a href='update.php?nId=" . $row["id"] . "&dbname=" . $dbname . "&tbname=" . $tbname . "'>editar</a></td> 
            <td class='delete'><a href='delete.php?nId=" . $row["id"] . "'>deletar</a></td>
            </tr>";

        }
        $text .= "</table>";
    } else {
        $text = "no results";
    }

    // show result
    echo $text;
?>