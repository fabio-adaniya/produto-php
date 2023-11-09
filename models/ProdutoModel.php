<?php
    require_once __DIR__ . '\..\vendor\autoload.php';
    require_once __DIR__ . '\..\conexao.php';

    class ProdutoModel{
        private $notOrm;

        public function __construct()
        {
            $conexao = new Conexao();
            $this->notOrm = $conexao->conectar();
        }

        public function search($id)
        {
            return $this->notOrm->produto()->where('ID = '.$id)->fetch();
        }

        public function searchAll()
        {
            return $this->notOrm->produto();
        }

        public function store($produto)
        {
            $this->notOrm->produto()->insert(array('codigo' => $produto['codigo'], 'descricao' => $produto['descricao']));    
        }

        public function update($produto)
        {
            $this->search($produto['id'])->update(array('codigo' => $produto['codigo'], 'descricao' => $produto['descricao']));
        }

        public function delete($id)
        {
            $this->search($id)->delete();
        }
    }
?>