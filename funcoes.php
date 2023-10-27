<?php
    function salvar($notOrm, $id, $codigo, $descricao)
    {
        if($id)
            $notOrm->produto()->where('ID = '.$id)->update(array("codigo"=>$codigo,"descricao"=>$descricao));
        else
            $notOrm->produto()->insert(array("codigo"=>$codigo,"descricao"=>$descricao));

        header("location:index.php");
    }

    function localizar($notOrm, $id)
    {
        $produto = $notOrm->produto()->where('ID = '.$id)->fetch();
        return $produto;
    }

    function old($field, $value = null)
    {
        if(isset($_POST[$field]))
            return $_POST[$field];
        else if($value)
            return $value;
        else
            return "";
    }
?>