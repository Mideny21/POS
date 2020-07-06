<?php

require_once "../controllers/products_controller.php";
require_once "../models/products_model.php";

class productsTableSales{

	/*=============================================
 	 SHOW PRODUCTS TABLE
  	=============================================*/ 
	
	public function showProductsTableSales(){

		$item = null;
		$value = null;

		$products = ProductController::ctrShowProducts($item, $value);

		if(count($products) == 0){

			$jsonData = '{"data":[]}';

			echo $jsonData;

			return;
		}

		$jsonData = '{
			
			"data":[';

				for($i=0; $i < count($products); $i++){


					/*=============================================
					We bring the image
					=============================================*/
					
					$image = "<img src='".$products[$i]["image"]."' width='40px'>";

					/*=============================================
					Stock
					=============================================*/
				  	
				  	if($products[$i]["stock"] <= 10){

		  				$stock = "<button class='btn btn-danger'>".$products[$i]["stock"]."</button>";

		  			}else if($products[$i]["stock"] > 11 && $products[$i]["stock"] <= 15){

		  				$stock = "<button class='btn btn-warning'>".$products[$i]["stock"]."</button>";

		  			}else{

		  				$stock = "<button class='btn btn-success'>".$products[$i]["stock"]."</button>";

		  			}

		  			/*=============================================
		 	 		ACTION BUTTONS
		  			=============================================*/ 

		  			$buttons =  "<div class='btn-group'><button class='btn btn-primary addProductSale recoverButton' idProduct='".$products[$i]["id"]."'>Add</button></div>";



					$jsonData .='[
						"'.($i+1).'",
						"'.$image.'",
						"'.$products[$i]["code"].'",
						"'.$products[$i]["description"].'",
						"'.$stock.'",
						"'.$buttons.'"
					],';
				}

				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= '] 

			}';

		echo $jsonData;
	}
}


/*=============================================
ACTIVATE PRODUCTS TABLE
=============================================*/ 
$activateProductsSales = new productsTableSales();
$activateProductsSales -> showProductsTableSales();