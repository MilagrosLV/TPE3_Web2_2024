<?php
    //print_r($_SERVER); //Para debug
    require_once 'libs/router.php';
    require_once 'app_api/controllers/product_api_controller.php';
   
    $router = new Router();

    //                 Endpoint                     Verbo      Controller                Metodo
    $router->addRoute('productos'      ,            'GET',     'productApiController',   'getAll');
    $router->addRoute('productos/:id'  ,            'GET',     'productApiController',   'get');
    $router->addRoute('productos/:id'  ,            'DELETE',  'productApiController',   'delete');
    $router->addRoute('productos'  ,                'POST',    'productApiController',   'create');
    $router->addRoute('productos/:id'  ,            'PUT',     'productApiController',   'update');
    $router->addRoute('productos/:id/oferta'  ,     'PUT',     'productApiController',   'setSale');

    $router->addRoute('categoria'      ,            'GET',     'categoryApiController',   'getAll');
    $router->addRoute('categoria/:id'  ,            'GET',     'categoryApiController',   'get');
    $router->addRoute('categoria/:id'  ,            'DELETE',  'categoryApiController',   'delete');
    $router->addRoute('categoria'  ,                'POST',    'categoryApiController',   'create');
    $router->addRoute('categoria/:id'  ,            'PUT',     'categoryApiController',   'update');
  
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); //Hace mach la ruta
