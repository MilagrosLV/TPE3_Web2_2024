<?php
    
    require_once 'libs/router.php';

    require_once 'api/controllers/productApiController.php';
   
    $router = new Router();

    #                 endpoint                      verbo       controller              metodo
    $router->addRoute('productos'      ,            'GET',     'productApiController',   'getAll');
    $router->addRoute('productos'      ,            'GET',     'productApiController',   'get');
  
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
