<?php
    require_once __DIR__ . '\vendor\autoload.php';
    require_once __DIR__ . '\controllers\ProdutoController.php';
    
    $klein = new \Klein\Klein();
    
    $klein->respond('GET', '/', function(){
        $controller = new ProdutoController();
        $controller->index();
    });
    $klein->respond('GET', '/create', function(){
        $controller = new ProdutoController();
        $controller->create();
    });
    $klein->respond('GET', '/edit/[:id]', function($request){
        $controller = new ProdutoController();
        $controller->edit($request->id);
    });
    $klein->respond('POST', '/', function($request){
        $controller = new ProdutoController();
        $controller->store($request);
    });
    $klein->respond('PUT', '/', function($request){
        $controller = new ProdutoController();
        $controller->update($request);
    });
    $klein->respond('DELETE', '/delete/[:id]', function($request){
        $controller = new ProdutoController();
        $controller->delete($request);
    });
    
    $klein->dispatch();
?>