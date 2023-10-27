<?php
    include "NotORM.php";
    $conexao = new PDO("mysql:host=localhost;dbname=produto_php;", "root", "");
    $notOrm = new NotORM($conexao);
?>
