<?php 

//$conn = new mysqli("localhost","root","","zadania");
$conn = new mysqli("sql7.freemysqlhosting.net","sql7373143","ky7DfUhHKN","sql7373143");
$imie = $_POST["name"];
$tytul = $_POST["tytul"];

$conn->query("INSERT INTO `lib_autor`(`id`, `name`) VALUES (NULL,'".$imie."');");

$conn->query("INSERT INTO `lib_autor`(`id`, `tytul`) VALUES (NULL,'".$tytul."');");


//header('Location: /php/cos/index.php');
header('Location: https://jakub-kotlinski.herokuapp.com/');

$conn->close(); 


?>