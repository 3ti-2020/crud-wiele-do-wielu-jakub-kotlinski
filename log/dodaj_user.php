<?php
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("remotemysql.com","jfFxpXyGWk","Dly0LzRmEd","jfFxpXyGWk");

    $user = $_POST['oddaj'];

    $sql = "INSERT INTO users (id, username, userpass) VALUES (NULL,'".$user."','a')";


    mysqli_query($conn, $sql);
    $conn->close();
    header('Location: /admin/index2.php');

?>