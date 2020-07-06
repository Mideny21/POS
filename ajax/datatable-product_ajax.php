<?php

require_once "../controllers/products_controller.php";
require_once "../models/products_model.php";

require_once "../controllers/categories_controller.php";
require_once "../models/categories_model.php";

class ProductsTable{

    //SHOW PRODUCTS TABLE

    static public function showProductsTable(){
        $item = null;
        $value = null;

        $products = ProductController::ctrShowProducts($item, $value);


        $jasonData = '{
  "data": [';
  for ($i=0; $i < count($products); $i++) {

            $image = "<img src='".$products[$i]["image"]."' alt='image' class='brand-image img-circle elevation-3' width='40px'>";

            $item = "id";
            $value = $products[$i]['category_id'];

            $category = ControllerCategories::ctrShowCategories($item, $value);

            // STOCK BUTTON MANAGEMENT
            if($products[$i]["stock"] <= 10){
                $stock = "<button class='btn btn-danger'>" . $products[$i]["stock"] . "</button>";
                
            }else if($products[$i]["stock"] > 11 && $products[$i]["stock"] <= 15){
                $stock = "<button class='btn btn-warning'>" . $products[$i]["stock"] . "</button>";
                
            }else{
                $stock = "<button class='btn btn-success'>" . $products[$i]["stock"] . "</button>";

            }

            // FOR TRIGGERING BUTTONS
            $button = " <div class='btn-group'></div><button class='btn btn-warning btnEditProduct' idProduct='".$products[$i]["id"]. "' data-toggle='modal' data-target='#modalEditproduct'><i class='fas fa-edit'></i></button><button class='btn btn-danger btnDeleteProduct' idProduct='" . $products[$i]["id"] . "' code='". $products[$i]["code"]."' image='" . $products[$i]["image"]."'><i class='fas fa-times'></i></button>";


       $jasonData .= '[
      "'.($i+1).'",
      "'.$image.'",
      "'.$products[$i]["code"]. '",
      "' . $products[$i]["description"] . '",
      "' . $stock . '",
      "' . number_format($products[$i]["buying_price"],2)  . '",
      "' . number_format($products[$i]["selling_price"],2)  . '",
      "' . $products[$i]["date"] . '",
         "' . $category["category"] . '",
      "' . $button . '"
      ],';
  }
  $jasonData = substr($jasonData, 0, -1);
  $jasonData .= ']
    
    }';

        echo $jasonData;
     }
}

// ACTIVATING PRODUCTS TABLE

$activateProducts = new ProductsTable();
$activateProducts -> showProductsTable();