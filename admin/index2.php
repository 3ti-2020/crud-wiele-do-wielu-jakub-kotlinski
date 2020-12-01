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
    <link rel="stylesheet" href="/style.css">
</head>
<body>
<div class="container">
    <div class="head">
        <div class="a">
        <a href="https:github.com/3ti-2020/crud-wiele-do-wielu-jakub-kotlinski"><div class="git"></div></a>
        </div>
        <div class="b">
            <h1>Jakub Kotliński</h1>
            <div class="linki">
                <a href="/log/logout.php"><div class="link">Wyloguj</div></a>
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

    $sql = "SELECT `name`, tytul, id_autor_tytul FROM lib_tytul, lib_autor_tytul, lib_autor WHERE lib_autor_tytul.id_autor=lib_autor.id AND lib_autor_tytul.id_tytul=lib_tytul.id_tytul";

    $result = $conn->query( $sql );
    echo("<div>");
    echo("<h2>Biblioteka</h2>");
    echo("<table border=1>");
    echo("<tr>
    <td>Autor</td>
    <td>Tytul</td>
    <td>Usuń</td>
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

    $sql1 = "SELECT wypozyczenia.id_wypozyczenia, lib_autor.name, lib_tytul.tytul, users.username AS 'user' FROM wypozyczenia, lib_tytul,lib_autor_tytul,lib_autor, users WHERE lib_autor.id=lib_autor_tytul.id_autor AND lib_tytul.id_tytul=lib_autor_tytul.id_tytul AND lib_autor_tytul.id_autor_tytul=wypozyczenia.ksiazka AND users.id=wypozyczenia.user";

    $result = $conn->query( $sql1 );

    echo("<div>");
    echo("<table border=1>");
    echo("<h2>WYPOŻYCZENIA</h2>");
    echo("<tr>
        <td>Autor</td>
        <td>Tytul</td>
        <td>Użytkownik</td>
        <td>Oddaj</td>
    </tr>");
    while( $row = $result->fetch_assoc())
    {
        echo("<tr>");
        echo("<td>".$row['name']."</td><td>".$row['tytul']."</td><td>".$row['user']."</td>
        
        
            <td>
                <form action='/admin/delet_wyp.php' method='POST'>
                <input type='hidden' name='oddaj' value='".$row['id_wypozyczenia']."'>
                <input type='submit' value='oddaj'>
                </form>
            </td>"
        
        );
        echo("</tr>");
    }
    echo("</table>");
    echo("</div>");
?>


</div>
    <div class="right">
        <div><h2>Admin Panel</h2></div>
        <form action="/admin/insert_autorzy.php" method="POST">
            <h3>Dodaj Książke</h3>
            <input type="text" name="name" placeholder="Nazwisko"><br>
            <input type="text" name="tytul" placeholder="Tytuł"><br>
            <input type="submit" value="wyslij">
        </form>

        
        <form action="/log/dodaj_user.php" method="POST">
            <h3>Dodaj Użytkownika</h3>
            <input type="text" name="oddaj"  placeholder="User"><br>
            <input type="submit" value="Dodaj">
        </form>

        <form action="/log/wyp.php" method="POST">
        <h3>Wypożycz książke</h3>
        <p>wybierz książkę:</p>
        <?php
            $result3 = $conn->query("SELECT id_autor_tytul , `name`, tytul FROM lib_tytul, lib_autor_tytul, lib_autor WHERE lib_tytul.id_tytul = lib_autor_tytul.id_tytul AND lib_autor.id=lib_autor_tytul.id_autor");
            echo("<select name='tytul'>");
            while($wiersz3 = $result3->fetch_assoc()){
                echo("<option value='".$wiersz3['id_autor_tytul']."' name='tytul'>".$wiersz3['name'].":  ".$wiersz3['tytul']."</option>");
            }
            echo("</select>");
        ?>
        <p>wybierz uzytkownika:</p> 
        <?php
            $result4 = $conn->query("SELECT id, username FROM users");
            echo("<select name='user'>");
            while($wiersz4 = $result4->fetch_assoc()){
                echo("<option value='".$wiersz4['id']."' name='user'>".$wiersz4['username']."</option>");
            }
            echo("</select>");
        ?>
        <input type="submit" value="WYPOŻYCZ">
    </form>
    </div>
    
</div>
    
</body>
<script src="script.js"></script>
</html>