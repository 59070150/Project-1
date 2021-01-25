<?php 

    $servername = "localhost";
    $username = "root";
    $password = "12345678";
    $dbname = "register_db";

    //Create Connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //Check Connection
    if (!$conn) {
        # code...
        die("Connection Failed.". mysqli_connect_error());
    }

?>