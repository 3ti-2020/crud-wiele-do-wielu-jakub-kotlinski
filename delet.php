<?php
    //$conn = new mysqli("localhost","root","","zadania");
    $conn = new mysqli("sql7.freemysqlhosting.net","sql7373143","ky7DfUhHKN","sql7373143");

    $del = $_POST['id_del'];

    $sql = "DELETE FROM lib_autor_tytul WHERE id_autor_tytul=$del";
    mysqli_query($conn, $sql);

    //header('Location: /php/cos/index2.php');
    header('Location: https://jakub-kotlinski.herokuapp.com/index2.php');
?>