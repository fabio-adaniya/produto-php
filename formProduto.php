<?php
    require_once "conexao.php";
    require_once "funcoes.php";

    $codigoError = '';
    $descricaoError = '';
    $titulo = 'Cadastrar';
    $produto = null;
    $id = '';
    $codigo = '';
    $descricao = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $salvar = true;

        if(!trim($_POST["codigo"]))
        { 
            $codigoError = 'Código é obrigatório';
            $salvar = false;
        }

        if(!trim($_POST["descricao"]))
        {
            $descricaoError = 'Descrição é obrigatório';
            $salvar = false;
        }

        if($salvar)
            salvar($con, $_POST["id"], $_POST["codigo"], $_POST["descricao"]);
    }
    else
    {
        if(isset($_GET["id"]))
        {
            $produto = localizar($con, $_GET["id"]);

            if($produto)
            {
                if($produto["id"])
                    $titulo =  'Editar';

                $id = $produto["id"] ?? '';
                $codigo = $produto["codigo"] ?? '';
                $descricao = $produto["descricao"] ?? '';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $titulo ?> produto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="bg-light">
        <div class="d-flex justify-content-center vh-100 align-items-center">
            <div class="card m-3" style="width: 500px">
                <div class="card-body">
                    <?php
                        echo "<p class='fs-5 fw-bold text-center'>".$titulo." produto</p>";
                    ?>
                    <form method="POST" action="formProduto.php">
                        <input type="hidden" id="input-id" name="id" value="<?= $id ?? '' ?>">
                        <div class="mb-3">
                            <label class="form-label" for="input-codigo">Código*</label>
                            <input type="text" id="input-codigo" name="codigo" class="form-control" value="<?= $codigo ?? '' ?>" autofocus>
                            <?php
                                if($codigoError)
                                    echo "<p class='text-danger mt-1'>$codigoError</p>";
                            ?>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="input-descricao">Descrição*</label>
                            <input type="text" id="input-descricao" name="descricao" class="form-control" value="<?= $descricao ?? '' ?>">
                            <?php
                                if($descricaoError)
                                    echo "<p class='text-danger mt-1'>$descricaoError</p>";
                            ?>
                        </div>
                        <button type="submit" class="btn btn-primary d-flex ms-auto">
                            <i class="fa-regular fa-floppy-disk p-1"></i> Salvar
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <script src="main.js"></script>
    </body>
</html>