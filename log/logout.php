<?php

    session_start();
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("sql7.freemysqlhosting.net","sql7373143","ky7DfUhHKN","sql7373143");

    unset($_SESSION['login']);

    //header('Location: /index.php');
    header('Location: https://jakub-kotlinski.herokuapp.com/');

?>