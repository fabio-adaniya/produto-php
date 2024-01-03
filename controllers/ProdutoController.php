<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/../models/ProdutoModel.php'; 

    class ProdutoController
    {
        private $produto_model;
        private $twig;

        public function __construct()
        {
            $this->produto_model = new ProdutoModel();

            $loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
            $this->twig = new \Twig\Environment($loader);
        }

        public function index()
        {
            $template = $this->twig->load('consultar.html.twig');

            $produtos = $this->produto_model->searchAll();
            $pesquisar = '';

            if(isset($_GET["pesquisar"]))
            {
                $pesquisar = $_GET["pesquisar"];
                $produtos = $produtos->where("CODIGO LIKE '%".$pesquisar."%'");
                $produtos = $produtos->or("DESCRICAO LIKE '%".$pesquisar."%'");
            }

            $produtos_count = $produtos ? count($produtos) : 0;

            echo $template->render(['produtos' => $produtos, 'produtos_count' => $produtos_count, 'pesquisar' => $pesquisar]);
        }

        public function create($errors = null, $produto = null)
        {
            $template = $this->twig->load('form.html.twig');

            echo $template->render(['titulo' => 'Cadastrar', 'errors' => $errors ?? [], 'produto' => $produto ?? [], 'method' => 'POST']);
        }

        public function edit($id, $errors = null, $produto_request = null)
        {
            $template = $this->twig->load('form.html.twig');
            $produto = $this->produto_model->search($id);

            echo $template->render(['titulo' => 'Editar', 'errors' => $errors ?? [], 'produto' => $produto_request ?? $produto, 'method' => 'PUT']);
        }

        public function store($request)
        {
            $errors = $this->validate_request($request);
            $produto = $this->get_request_fields($request);

            if(!(count($errors) > 0))
            {
                $this->produto_model->store($produto);
                $this->index();
            }
            else
                $this->create($errors, $produto);
        }

        public function update($request)
        {
            $errors = $this->validate_request($request);
            $produto = $this->get_request_fields($request);

            if(!(count($errors) > 0))
            {
                $this->produto_model->update($produto);
                $this->index();
            }
            else
                $this->edit($request['id'], $errors, $produto);
        }

        public function delete($request)
        {
            $this->produto_model->delete($request);
            $this->index();
        }

        public function validate_request($request)
        {
            $errors = [];

            if(!trim($request['codigo']))
                $errors['codigo'] = 'Código é obrigatório';

            if(!trim($request['descricao']))
                $errors['descricao'] = 'Descrição é obrigatório';

            return $errors;
        }

        public function get_request_fields($request)
        {
            $produto = [];

            $produto['id'] = isset($request['id']) ? $request['id'] : null;
            $produto['codigo'] = $request['codigo'];
            $produto['descricao'] = $request['descricao'];

            return $produto;
        }
    }
?>