<?php
    class Funcoes{
        public function redirect($url)
        {
            header('Location: '.$url);
            exit();
        }
    }
?>