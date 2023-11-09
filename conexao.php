<?php
    require_once __DIR__ . '\vendor\autoload.php';
    require_once __DIR__ . '\NotORM.php';

    class Conexao{
        public function conectar()
        {
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
            $dotenv->load();

            $conexao = new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_DATABASE'].";", $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            $notOrm = new NotORM($conexao);
            return $notOrm;
        }
    }
?>
