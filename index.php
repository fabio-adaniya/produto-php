<?php
    require_once __DIR__ . '/controllers/ProdutoController.php';

    $produtoController = new ProdutoController();

    if(isset($_POST['create']))
        $produtoController->create();
    else if(isset($_POST['store']))
    {
        $values = [
            'codigo' => isset($_POST['codigo']) ? $_POST['codigo'] : null,
            'descricao' => isset($_POST['descricao']) ? $_POST['descricao'] : null
        ];

        $produtoController->store($values);
    }
    else if(isset($_POST['edit']))
    {
        $id = isset($_POST['id']) ? $_POST['id'] : null;

        $produtoController->edit($id);
    }
    else if(isset($_POST['update']))
    {
        $values = [
            'id' => isset($_POST['id']) ? $_POST['id'] : null,
            'codigo' => isset($_POST['codigo']) ? $_POST['codigo'] : null,
            'descricao' => isset($_POST['descricao']) ? $_POST['descricao'] : null
        ];

        $produtoController->update($values);
    }
    else if(isset($_POST['delete']))
    {
        $id = isset($_POST['id']) ? $_POST['id'] : null;

        $produtoController->delete($id);
    }
    else
        $produtoController->index();
?>