<?php
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("remotemysql.com","jfFxpXyGWk","Dly0LzRmEd","jfFxpXyGWk");


    $del = $_POST['oddaj'];

    $sql = "DELETE FROM wypozyczenia WHERE  wypozyczenia.id_wypozyczenia= $del";
    mysqli_query($conn, $sql);

    header('Location: /admin/index2.php');
?>