<?php
    session_start();
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("remotemysql.com","jfFxpXyGWk","Dly0LzRmEd","jfFxpXyGWk");

    $del = $_POST['id_del'];

    $sql = "DELETE FROM lib_autor_tytul WHERE id_autor_tytul=$del";
    mysqli_query($conn, $sql);

    header('Location: /autor/index3.php');
?>