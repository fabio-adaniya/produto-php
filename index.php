<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Listagem de produto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <header>
            <h4>Listagem de produto</h4>
            <button type="Button" class="btn btn-primary" id="btnCadastrar" onClick="abrirTela()">Cadastrar</button>
        </header>
        <section class="conteudo">
            <?php
                require_once "conexao.php";

                $registros = mysqli_query($con, "SELECT * FROM PRODUTO");
                $linhas = mysqli_num_rows($registros);

                if ($linhas > 0)
                    echo "<center class='alert alert-success'>Total de registros: $linhas</center>";
                else
                    echo "<div class='alert alert-warning'>Nenhum registro foi localizado no banco de dados. Busca finalizada!</div>";

                echo "<br>";
                echo "<table class='table table-bordered'>";
                echo "<thead class='thead-dark'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Código</th>";
                echo "<th>Descrição</th>";
                echo "</tr>";
                echo "</thead>";

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
                    echo "<td><button type='button' class='btn btn-warning' onClick='abrirTela($id)'>Alterar</button></td>";
                    echo "<td><button type='button' class='btn btn-danger' onClick='excluir($id)'>Excluir</button></td>";
                    echo "</tr>";

                    $contador++;
                }

                echo "</table>";
            ?>
        </section>
        <script src="main.js"></script>
    </body>
</html>