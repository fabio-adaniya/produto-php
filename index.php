<?php
    require_once "vendor/autoload.php";
    require_once "conexao.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    $template = $twig->load('index.html.twig');

    $produtos = $notOrm->produto();
    $produtos_count = count($produtos);

    $pesquisar = '';

    if(isset($_GET["pesquisar"]))
    {
        $pesquisar = $_GET["pesquisar"];
        $produtos = $produtos->where("CODIGO LIKE '%".$pesquisar."%'");
        $produtos = $produtos->or("DESCRICAO LIKE '%".$pesquisar."%'");
    }

    echo $template->render(['produtos' => $produtos, 'produtos_count' => $produtos_count, 'pesquisar' => $pesquisar]);
?>