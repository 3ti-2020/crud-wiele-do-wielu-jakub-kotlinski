<?php

    session_start();
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("remotemysql.com","jfFxpXyGWk","Dly0LzRmEd","jfFxpXyGWk");


    unset($_SESSION['login']);
    header('Location: /index.php');

?>