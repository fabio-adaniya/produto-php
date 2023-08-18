<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Listagem de produto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="bg-light">
        <h4 class="text-center pt-4">Listagem de produtos</h4>
        <div class="card m-3 bg-light border-0">
            <div class="card-body">
                <form action="" method="GET" class="d-flex justify-content-center flex-wrap">
                    <div class="d-flex flex-wrap" style="width: 400px">
                        <label for="">Pesquisar por:</label>
                        <input type="text" name="pesquisar" class="form-control-sm ms-2 flex-fill" value="<?= isset($_GET["pesquisar"]) ? $_GET["pesquisar"] : '' ?>">
                    </div>
                    <button type="submit" class="btn btn-success btn-sm ms-2">
                        <i class="fa-solid fa-magnifying-glass"></i> Pesquisar
                    </button>
                </form>
            </div>
        </div>
        <div class="card m-3">
            <div class="card-body">
                <div class="d-flex flex-wrap">
                    <button type="Button" class="btn btn-primary btn-sm ms-auto" id="btnCadastrar" onClick="abrirTela()">
                        <i class="fa-solid fa-plus"></i> Cadastrar Produto
                    </button>
                </div>
                <?php
                    require_once "conexao.php";

                    $filtro = "";

                    if(isset($_GET["pesquisar"]))
                        $filtro = "WHERE CODIGO LIKE '%".$_GET["pesquisar"]."%' OR DESCRICAO LIKE '%".$_GET["pesquisar"]."%'";

                    $registros = mysqli_query($con, "SELECT * FROM PRODUTO ".$filtro);
                    $linhas = mysqli_num_rows($registros);

                    echo "<br>";
                    echo "<div class='table-responsive'>";
                        echo "<table class='table table-sm'>";
                            echo "<thead>";
                                echo "<tr>";
                                    echo "<th style='width:1%'>ID</th>";
                                    echo "<th>Código</th>";
                                    echo "<th>Descrição</th>";
                                    echo "<th style='width:1%'></th>";
                                    echo "<th style='width:1%'></th>";
                                echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";

                                $contador = 0;

                                while ($contador < $linhas)
                                {
                                    $produto = mysqli_fetch_array($registros);
                                    $id = $produto["id"];
                                    $codigo = $produto["codigo"];
                                    $descricao = $produto["descricao"];

                                    echo "<tr>";
                                        echo "<td>$id</td>";
                                        echo "<td>$codigo</td>";
                                        echo "<td>$descricao</td>";
                                        echo "<td>";
                                            echo "<button type='button' class='btn btn-warning btn-sm d-flex' onClick='abrirTela($id)'>";
                                                echo "<i class='fa-regular fa-pen-to-square p-1'></i> Editar";
                                            echo "</button>";
                                        echo "</td>";
                                        echo "<td>";
                                            echo "<button type='button' class='btn btn-danger btn-sm d-flex' onClick='deletar($id)'>";
                                                echo "<i class='fa-solid fa-trash-can p-1'></i> Deletar";
                                            echo "</button>";
                                        echo "</td>";
                                    echo "</tr>";

                                    $contador++;
                                }

                            echo "</tbody>";
                        echo "</table>";
                    echo "</div>";

                    if ($linhas > 0)
                        echo "<div class='text-success text-center fw-bold'>Total de registros: $linhas</div>";
                    else
                        echo "<div class='text-center fw-bold'>Nenhum produto foi localizado!</div>";
                ?>
            </div>
        </div>
        <script src="main.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>