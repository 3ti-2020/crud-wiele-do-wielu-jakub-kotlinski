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
        <h1>Jakub Kotliński</h1>
        <a href="index.html"><div class="link">Karty</div></a>
        <a href=""><div class="link">Logowanie</div></a>
    </div>
    <div class="left">
    <?php
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("sql7.freemysqlhosting.net","sql7373143","ky7DfUhHKN","sql7373143");

    $sql = "SELECT `name`, tytul FROM lib_tytul, lib_autor_tytul, lib_autor WHERE lib_autor_tytul.id_autor=lib_autor.id AND lib_autor_tytul.id_tytul=lib_tytul.id_tytul";

    $result = $conn->query( $sql );
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
        ");
    }

    echo("</table>");
?>

</div>
    <div class="right">
        <form action="insert_autorzy.php" method="POST">
            <input type="text" name="name">Nazwisko
            <input type="text" name="tytul">Tytul <br>
            <input type="submit" value="wyslij">
        </form>
    </div>
    
</div>
    
</body>
</html>