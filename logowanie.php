<?php

    session_start();
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("sql7.freemysqlhosting.net","sql7373143","ky7DfUhHKN","sql7373143");

    if ($conn->query("SELECT * FROM `users` WHERE `username` = '".$_POST['login']."' AND `userpass` = '".$_POST['password']."'")->fetch_assoc()) $_SESSION['login'] = $_POST['login'];
    

    //header('Location: /php/cos/index2.php');
    header('Location: https://jakub-kotlinski.herokuapp.com/index2.php');

?>