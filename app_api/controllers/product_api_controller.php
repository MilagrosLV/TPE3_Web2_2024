<?php
require_once './app_api/models/product_model.php';
require_once './app_api/views/json_view.php';

class productApiController {
    private $ProductModel;
    private $JSONView;

    public function __construct() {
        $this->ProductModel = new ProductModel();
        $this->JSONView = new JSONView();
    }

    // /api/productos
    public function getAll($request) { 

        /*$filtrarOfertas = null;
        if(isset($request->query->ofertadas)) {
            $filtrarOfertas = $request->query->ofertadas;
        }
        $orderBy = false;
        if(isset($request->query->orderBy)){
            $orderBy = $request->query->orderBy;
        }*/
        
        $products = $this->ProductModel->getProducts();
        return $this->JSONView->response($products);
    }

    // ./api/productos/:id
    public function get($request) {
        $id = $request->params->id;
        $product = $this->ProductModel->getProduct($id);
        if(!$product) {
            return $this->JSONView->response("El producto con el id=$id no existe", 404);
        }
        return $this->JSONView->response($product);
    }


    

}
