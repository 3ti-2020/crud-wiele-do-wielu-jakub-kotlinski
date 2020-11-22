<?php

    session_start();
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("remotemysql.com","jfFxpXyGWk","Dly0LzRmEd","jfFxpXyGWk");

    if ($conn->query("SELECT * FROM `users`, `uprawnienia` WHERE `username` = '".$_POST['login']."' AND `userpass` = '".$_POST['password']."' AND uprawnienia.id=users.id_uprawnienia AND uprawnienie='admin'")->fetch_assoc())
    {   
        header('Location: /admin/index2.php');
        $_SESSION['login'] = $_POST['login'];
    }
    else if($conn->query("SELECT * FROM `users`, `uprawnienia` WHERE `username` = '".$_POST['login']."' AND `userpass` = '".$_POST['password']."' AND uprawnienia.id=users.id_uprawnienia AND uprawnienie='autor'")->fetch_assoc())
    {
        header('Location: /autor/index3.php');
        $_SESSION['login'] = $_POST['login'];
    }
    else if($conn->query("SELECT * FROM `users`, `uprawnienia` WHERE `username` = '".$_POST['login']."' AND `userpass` = '".$_POST['password']."' AND uprawnienia.id=users.id_uprawnienia AND uprawnienie='user'")->fetch_assoc())
    {
        header('Location: /user/index4.php');
        $_SESSION['login'] = $_POST['login'];
    }
    else
    {
        header('Location: /index.php');
    }
    

    

?>
