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


    $sql = "SELECT `name`, tytul FROM lib_tytul, lib_autor_tytul, lib_autor WHERE lib_autor_tytul.id_autor=lib_autor.id AND lib_autor_tytul.id_tytul=lib_tytul.id_tytul";

    $result = $conn->query( $sql );
    echo("<div>");
    echo("<h2>Biblioteka</h2>");
    echo("<table border=1>");
    echo("<tr>
    <td>name</td>
    <td>tytul</td>
    </tr>");

    while( $row = $result->fetch_assoc())
    {
        echo("<tr>
        <td>".$row['name']."</td>
        <td>".$row['tytul']."</td>");
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
            <span class="password">admin a</span>
    
    </form>

    </div>
    
</div>
    
</body>
<script src="script.js"></script>
</html>