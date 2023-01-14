<?php
    require_once "conexao.php";

    $id = $_GET["id"];
    mysqli_query($con, "DELETE FROM PRODUTO WHERE ID = $id");
    header("location:index.php");
?>