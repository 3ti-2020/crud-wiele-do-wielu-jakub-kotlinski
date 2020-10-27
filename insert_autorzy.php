<?php 

$conn = new mysqli("localhost","root","","zadania");
$imie = $_POST["name"];
$tytul = $_POST["tytul"];

$conn->query("DELETE FROM `lib_autor` WHERE `name` LIKE '".$imie."';");

//$conn->query("insert into `pracownicy` (`id_pracownicy`,`imie`,`dzial`,`zarobki`,`data_urodzenia`) values (NULL,'".$imie."','".$dzial."','".$zarobki."','".$data_urodzenia."');");

header('Location: /php/autorzy.php');

$conn->close(); 

?>