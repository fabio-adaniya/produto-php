<?php
    function salvar($notOrm, $produto)
    {
        if($produto['id'])
            $notOrm->produto()->where('ID = '.$produto['id'])->update(array('codigo' => $produto['codigo'], 'descricao' => $produto['descricao']));
        else
            $notOrm->produto()->insert(array('codigo' => $produto['codigo'], 'descricao' => $produto['descricao']));

        header("location:index.php");
    }

    function localizar($notOrm, $id)
    {
        $produto = $notOrm->produto()->where('ID = '.$id)->fetch();
        return $produto;
    }
?>