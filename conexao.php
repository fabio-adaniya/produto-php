<?php
    $server = "localhost";
    $port = "3306";
    $user = "root";
    $password = "";
    $database = "produto_php";

    $con = mysqli_connect($server, $user, $password, $database, $port);

    if(!$con)
        echo 'Falha ao realizar conexão com o banco de dados. Erro: ' . mysqli_connect_error();
?>
