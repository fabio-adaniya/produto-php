<?php
    function salvar($con, $id, $codigo, $descricao)
    {
        if ($id != "")
            $sql = "UPDATE PRODUTO SET CODIGO = '$codigo', DESCRICAO = '$descricao' WHERE ID = $id";
        else
            $sql = "INSERT INTO PRODUTO(CODIGO, DESCRICAO) VALUES('$codigo', '$descricao')";

        mysqli_query($con, $sql);
        header("location:index.php");
    }

    function localizar($con, $id)
    {
        if ($id > 0)
        {
            $registros = mysqli_query($con, "SELECT * FROM PRODUTO WHERE ID = $id");
            return mysqli_fetch_array($registros);
        }
        else
            return $registros = [
                "id" => "",
                "codigo" => "",
                "descricao" => ""
            ];
    }
?>