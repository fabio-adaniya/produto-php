<?php
    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/NotORM.php';

    class Conexao{
        public function conectar()
        {
            define('DB_HOST', 'host.docker.internal');
            define('DB_PORT', '3306');
            define('DB_DATABASE', 'produto_php');
            define('DB_USERNAME', 'root');
            define('DB_PASSWORD', '');

            $conexao = new PDO('mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_DATABASE, DB_USERNAME, DB_PASSWORD);
            $notOrm = new NotORM($conexao);
            return $notOrm;
        }
    }
?>
