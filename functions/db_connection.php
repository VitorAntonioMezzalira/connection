<?php

    // starts the connection with MySQL
    function OpenCon($dbname) {

        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        return $conn;
    }

    // shutdown the connection with MySQL
    function CloseCon($conn) {
        $conn->close();
    }

    // test if the connection is works
    function TestCon($dbname) {
        
        $conn = OpenCon($dbname);

        if($conn->connect_error) {
            die("connection error: " . $conn->connect_error);
        }
        echo "connection sucessfully!";

        $conn = CloseCon($conn);
    }

    // create and drop the database | $dbact is "drop" or "create" | $dbname is que name of database
    function CreateDropDB($dbact, $dbname) {

        if($dbact == "create") {
            $conn = OpenCon("");
        } else {
            $conn = OpenCon($dbname);
        }
        
        $sql =  $dbact . " database " . $dbname . ";";
        
        if(mysqli_query($conn, $sql)) {
            return "Database " . $dbact . "!";
        } else {
            return "failed: ". mysqli_error($conn);
        }
        $conn = CloseCon($conn);
    }

    // directly command line method
    function ComandLine($dbname, $comm) {
        
        $conn = OpenCon($dbname);

        $sql = $comm;

        if(mysqli_query($conn, $sql)) {
            return "success!";
        } else {
            return "failed: ". mysqli_error($conn);
        }

        $conn = CloseCon($conn);
    }

    // select * from ref_tr
    function SelectAll($dbname, $tbname) {

        $conn = OpenCon($dbname);

        $sql = "SELECT * FROM $tbname";

        $style = "<style>
            td, th {
                border: 1px solid black;
            }
        
        </style>";

        $result = $conn->query($sql);

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

          $conn = CloseCon($conn);
    }

    function SelectById($dbname, $tbname, $id) {

        $conn = OpenCon($dbname);

        $sql = "SELECT * FROM $tbname WHERE id ='" . $id . "';";

        $result = $conn->query($sql);

        return $result->fetch_assoc();

        $conn = CloseCon($conn);

    }

    function DeleteRow($dbname, $tbname, $id) {

        $conn = OpenCon($dbname);

        $sql = "DELETE FROM " . $tbname . " WHERE id = '" . $id . "';";

        if(mysqli_query($conn, $sql)) {
            return "Success!";
        } else {
            return "failed: ". mysqli_error($conn);
        }

        $conn = CloseCon($conn);

    }

?>