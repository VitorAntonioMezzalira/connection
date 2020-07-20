<?php

    include "../functions/db_connection.php";

    echo 
    '<nav>
        <ul>
            <li><a href="../index.html">Home</a></li>
            <li><a href="index.html">Users</a></li>
        </ul>
    </nav>';

    $dbname = $_GET["dbname"];
    $tbname = $_GET["tbname"];

    $result = SelectAll($dbname, $tbname);

    $style = 
    "<style>
        td, th {
            border: 1px solid black;
        }
    </style>";

    if ($result->num_rows > 0) {

        $text = "<table><tr><th> ID </th><th> NOME </th><th> TELEFONE </th><th> E-MAIL </th></tr>";

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

        echo $text;
        echo $style;

        } else {
            echo "0 results";
        }

    echo "<br><a href='index.html'>return</a>";

?>