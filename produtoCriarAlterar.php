<?php
    require_once "conexao.php";
    require_once "funcoes.php";

    if (isset($_POST["txtSalvar"]))
        salvar($con, $_POST["txtID"], $_POST["txtCodigo"], $_POST["txtDescricao"]);

    $produto = localizar($con, $_GET["id"]);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Cadastro de produto</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="produtoCriarAlterar.css">
    </head>
    <body>
        <section class="conteudo">
            <h4><center>Cadastro de produto</center></h4>
            <form method="POST" action="produtoCriarAlterar.php">
                <input type="hidden" id="campoID" name="txtID" value="<?=$produto["id"]?>">
                <input type="hidden" name="txtSalvar" value="1">
                <br>
                <label>Código</label>
                <input type="text" id="campoCodigo" name="txtCodigo" class="form-control" value="<?=$produto["codigo"]?>">
                <label>Descricao</label>
                <input type="text" id="campoDescricao" name="txtDescricao" class="form-control" value="<?=$produto["descricao"]?>">
                <br>
                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-secondary" onClick="paginaIndex()">Cancelar</button>
                    </div>
                    <div class="col" id="btnSalvar">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </div>
            </form>
        </section>
        <script src="main.js"></script>
    </body>
</html>