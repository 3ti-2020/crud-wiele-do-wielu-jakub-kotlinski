<?php

    session_start();
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("remotemysql.com","jfFxpXyGWk","Dly0LzRmEd","jfFxpXyGWk");

    if ($conn->query("SELECT * FROM `users` WHERE `username` = '".$_POST['login']."' AND `userpass` = '".$_POST['password']."'")->fetch_assoc()) $_SESSION['login'] = $_POST['login'];

    //header('Location: /admin/index2.php');
    header('Location: /admin/index2.php');

?>
