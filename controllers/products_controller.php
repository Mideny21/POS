<?php

class ProductController{

    // SHOW PRODUCTS
    static public function ctrShowProducts($item, $value){
        $table = "products";

        $response = ModelProducts::mdlShowProducts($table, $item, $value);

        return $response;
    }
}