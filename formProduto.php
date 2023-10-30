<?php
    require_once "vendor/autoload.php";
    require_once "conexao.php";
    require_once "funcoes.php";

    $loader = new \Twig\Loader\FilesystemLoader('templates');
    $twig = new \Twig\Environment($loader);
    $template = $twig->load('formProduto.html.twig');

    $titulo = 'Cadastrar';
    $errors = [];
    $produto = [];

    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $salvar = true;

        if(!trim($_POST['codigo']))
        {
            $errors['codigo'] = 'Código é obrigatório';
            $salvar = false;
        }

        if(!trim($_POST['descricao']))
        {
            $errors['descricao'] = 'Descrição é obrigatório';
            $salvar = false;
        }

        $produto['id'] = $_POST['id'];
        $produto['codigo'] = $_POST['codigo'];
        $produto['descricao'] = $_POST['descricao'];

        if($salvar)
            salvar($notOrm, $produto);
    }
    else
    {
        if(isset($_GET['id']))
        {
            $produto = localizar($notOrm, $_GET['id']);

            if($produto)
                if($produto['id'])
                    $titulo = 'Editar';
        }
    }

    echo $template->render(['titulo' => $titulo, 'errors' => $errors, 'produto' => $produto]);
?>