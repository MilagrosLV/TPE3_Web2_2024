<?php
require_once './api/models/product_model.php';
require_once './api/views/json.view.php';

class productApiController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProductModel();
        $this->view = new JSONView();
    }

    // /api/tareas
    public function getAll($req, $res) {
       
        $products = $this->model->getProducts();
        // mando las tareas a la vista
        return $this->view->response($products);
    }

    public function get($req, $res) {
        // obtengo el id de la tarea desde la ruta
        $id = $req->params->id;

        // obtengo la tarea de la DB
        $product = $this->model->getProduct($id);

        if(!$task) {
            return $this->view->response("La tarea con el id=$id no existe", 404);
        }

        // mando la tarea a la vista
        return $this->view->response($task);
    }


    

}
