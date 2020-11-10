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
                <a href="index.html"><div class="link">Karty</div></a>
                <a href="logout.php"><div class="link">Wyloguj</div></a>
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
    $conn = new mysqli("sql7.freemysqlhosting.net","sql7373143","ky7DfUhHKN","sql7373143");

    $sql = "SELECT `name`, tytul, id_autor_tytul FROM lib_tytul, lib_autor_tytul, lib_autor WHERE lib_autor_tytul.id_autor=lib_autor.id AND lib_autor_tytul.id_tytul=lib_tytul.id_tytul";

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
        <td>".$row['tytul']."</td>
        <td>
            <form action='delet.php' method='post'>
            <input type='hidden' value='".$row['id_autor_tytul']."' name='id_del'>
            <input type='submit' value='Delet'>
            </form>
        </td>
        </tr>");
    }

    echo("</table>");
    echo("</div>");

    $sql1 = "SELECT wypozyczenia.id, lib_autor.name, lib_tytul.tytul FROM `wypozyczenia`, lib_tytul, lib_autor WHERE lib_tytul.id_tytul=wypozyczenia.id_tytul AND lib_autor.id=wypozyczenia.id_autor";

    $result = $conn->query( $sql1 );
    echo("<div>");
    echo("<h2>Wypożyczenia</h2>");
    echo("<table border=1>");
    echo("<tr>
    <td>Id</td>
    <td>name</td>
    <td>tytul</td>
    </tr>");

    while( $row = $result->fetch_assoc())
    {
        echo("<tr>
        <td>".$row['id']."</td>
        <td>".$row['name']."</td>
        <td>".$row['tytul']."</td>
        ");
    }

    echo("</table>");
    echo("</div>");
?>


</div>
    <div class="right">
        <form action="insert_autorzy.php" method="POST">
            <input type="text" name="name" placeholder="Nazwisko"><br>
            <input type="text" name="tytul" placeholder="Tytuł"><br>
            <input type="submit" value="wyslij">
        </form>
        <form class="login" action="logowanie.php" method="POST">
        
            <input type="text" name="login" placeholder="Login..." required><br>
            <input type="password" name="password" placeholder="Hasło..." required><br>
            <input type="submit" value="Zaloguj"><br>
            <span class="password">admin 1234</span>
    
    </form>
    </div>
    
</div>
    
</body>
<script src="script.js"></script>
</html>