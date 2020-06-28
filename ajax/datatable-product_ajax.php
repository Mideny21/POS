<?php

require_once "../controllers/products_controller.php";
require_once "../models/products_model.php";

require_once "../controllers/categories_controller.php";
require_once "../models/categories_model.php";

class ProductsTable{

    //SHOW PRODUCTS TABLE

    static public function showProductsTable(){
        echo '';
    }
}

// ACTIVATING PRODUCTS TABLE

$activateProducts = new ProductsTable();
$activateProducts -> showProductsTable();