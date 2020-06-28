<?php

require_once "../controllers/products_controller.php";
require_once "../models/products_model.php";


class AjaxProducts{
    // CREATING AJAX PRODUCTS
    public $idCategory;

    public function ajaxCreatecodeProducts(){

        $item = "category_id";
        $value = $this->idCategory;

        $response = ProductController::ctrShowProducts($item, $value);

        echo json_encode($response);
    }
}

if(isset($_POST['idCategory'])){
    $codeProducts = new AjaxProducts();
    $codeProducts -> idCategory = $_POST["idCategory"];
    $codeProducts -> ajaxCreatecodeProducts();
}