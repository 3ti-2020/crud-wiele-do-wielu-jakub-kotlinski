<?php
    session_start();
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("remotemysql.com","jfFxpXyGWk","Dly0LzRmEd","jfFxpXyGWk");

    $ksiazka=$_POST['tytul'];
    $user=$_POST['user'];

    $sql = "INSERT INTO `wypozyczenia`( `ksiazka`, `user`) VALUES ($ksiazka, $user)";

    echo($sql);

    mysqli_query($conn, $sql);
    $conn->close();
    header('Location: /admin/index2.php');

?>