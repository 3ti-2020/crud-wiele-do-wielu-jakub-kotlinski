<?php
    session_start();
    error_reporting( E_ALL );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jakub Kotlinski gr2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="head">
        <div class="a">
        <a href="https://github.com/3ti-2020/crud-wiele-do-wielu-jakub-kotlinski"><div class="git"></div></a>
        </div>
        <div class="b">
            <h1>Jakub Kotliński</h1>
            <div class="linki">
                <a href="/card/index.html"><div class="link">Karty</div></a>
                <a href="/egzamin/index.html"><div class="link">Egzamin</div></a>
                <a href="/todo/index.html"><div class="link">Lista ToDo</div></a>
            </div>
        </div>
        <div class="c">
            <button class="zmiana_koloru" type="button" >Tryb Noir</button>
            <button class="zmiana_koloru_1" type="button" >Tryb Blue</button>
            <?php

                echo(isset($_SESSION['login']) ? "zalogowano" : "niezalogowano");
            ?>
        </div>
        
       
        
    </div>
    <div class="left">
    
    <?php
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("remotemysql.com","jfFxpXyGWk","Dly0LzRmEd","jfFxpXyGWk");


    $sql = "SELECT username, userpass, uprawnienie FROM `users`, uprawnienia WHERE uprawnienia.id=users.id_uprawnienia";

    $result = $conn->query( $sql );
    echo("<div>");
    echo("<h2>User</h2>");
    echo("<table border=1>");
    echo("<tr>
    <td>Username</td>
    <td>Userpass</td>
    <td>Uprawnienie</td>
    </tr>");

    while( $row = $result->fetch_assoc())
    {
        echo("<tr>
        <td>".$row['username']."</td>
        <td>".$row['userpass']."</td>
        <td>".$row['uprawnienie']."</td>");
    }

    echo("</table>");
    echo("</div>");
?>


</div>
    <div class="right">
        <form class="login" action="/log/logowanie.php" method="POST">
        
            <input type="text" name="login" placeholder="Login..." required><br>
            <input type="password" name="password" placeholder="Hasło..." required><br>
            <input type="submit" value="Zaloguj"><br>
    
    </form>

    </div>
    
</div>
    
</body>
<script src="script.js"></script>
</html>