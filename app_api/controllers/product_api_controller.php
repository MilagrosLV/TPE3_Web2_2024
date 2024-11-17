<?php
require_once './app_api/models/product_model.php';
require_once './app_api/views/json_view.php';

class productApiController {
    private $ProductModel;
    private $view;

    public function __construct() {
        $this->ProductModel = new ProductModel();
        $this->view = new JSONView();
    }

    // /api/productos
    public function getAll($req) { 

        $filtrarOfertas = null;
        if(isset($req->query->ofertadas)) {
            $filtrarOfertas = $req->query->ofertadas;
        }
        $orderBy = false;
        if(isset($req->query->orderBy)){
            $orderBy = $req->query->orderBy;
        }
        
        $products = $this->ProductModel->getProducts($filtrarOfertas, $orderBy);
        return $this->view->response($products);
    }

    public function get($req, $res) {
        $id = $req->params->id;
        $product = $this->ProductModel->getProduct($id);
        if(!$product) {
            return $this->view->response("El producto con el id=$id no existe", 404);
        }
        return $this->view->response($product);
    }


    

}
