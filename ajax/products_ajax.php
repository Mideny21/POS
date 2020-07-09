<?php

require_once "../controllers/products_controller.php";
require_once "../models/products_model.php";


class AjaxProducts{
    // CREATING AJAX PRODUCTS
    public $idCategory;

    public function ajaxCreatecodeProducts(){

        $item = "category_id";
		$value = $this->idCategory;
		$order = "id";

        $response = ProductController::ctrShowProducts($item, $value, $order);

        echo json_encode($response);
    }

    /*=============================================
 	 EDIT PRODUCT
  	=============================================*/ 

  	public $idProduct;
	public $getProducts;
	public $productName;

  	public function ajaxEditProduct(){

	    if($this->getProducts == "ok"){

	      $item = null;
	      $value = null;
          $order = "id";

        $answer = ProductController::ctrShowProducts($item, $value, $order);

		  echo json_encode($answer);


	    }else if($this->productName != ""){

	      $item = "description";
	      $value = $this->productName;
          $order = "id";

        $answer = ProductController::ctrShowProducts($item, $value, $order);
	      
		  echo json_encode($answer);

	    }else{

	      $item = "id";
	      $value = $this->idProduct;
        $order = "id";

        $answer = ProductController::ctrShowProducts($item, $value, $order);
	      
		  echo json_encode($answer);

	    }

  	}


    
}

if(isset($_POST['idCategory'])){
    $codeProducts = new AjaxProducts();
    $codeProducts -> idCategory = $_POST["idCategory"];
    $codeProducts -> ajaxCreatecodeProducts();
}


/*=============================================
EDIT PRODUCT
=============================================*/ 

if(isset($_POST["idProduct"])){

  $editProduct = new AjaxProducts();
  $editProduct -> idProduct = $_POST["idProduct"];
  $editProduct -> ajaxEditProduct();

}

/*=============================================
GET PRODUCT
=============================================*/ 

if(isset($_POST["getProducts"])){

  $getProducts = new AjaxProducts();
  $getProducts -> getProducts = $_POST["getProducts"];
  $getProducts -> ajaxEditProduct();

}

/*=============================================
GET PRODUCT NAME
=============================================*/ 

if(isset($_POST["productName"])){

  $getProducts = new AjaxProducts();
  $getProducts -> productName = $_POST["productName"];
  $getProducts -> ajaxEditProduct();

}
