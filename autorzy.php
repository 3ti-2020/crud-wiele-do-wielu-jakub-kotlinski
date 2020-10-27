<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="head"></div>
    <div class="left">
    <?php
    $conn = new mysqli("localhost","root","","zadania");

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
<form action="insert_autorzy.php" method="POST">
    <input type="text" name="name">
    <input type="submit" value="delet">
</form>
</div>
    <div class="right"></div>
    
</div>
    
</body>
</html>