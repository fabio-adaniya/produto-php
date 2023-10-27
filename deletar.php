<?php
    require_once "conexao.php";

    $notOrm->produto()->where('ID = '.$_GET["id"])->delete();
    header("location:index.php");
?>