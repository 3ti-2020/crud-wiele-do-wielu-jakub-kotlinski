<?php
    session_start();
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("remotemysql.com","jfFxpXyGWk","Dly0LzRmEd","jfFxpXyGWk");

    $user = $_POST['oddaj'];

    $sql = "INSERT INTO users (id, username, userpass, id_uprawnienia) VALUES (NULL,'".$user."','abc',3)";


    mysqli_query($conn, $sql);
    $conn->close();
    header('Location: /admin/index2.php');

?>