<?php

class ProductController{

    // SHOW PRODUCTS
    static public function ctrShowProducts($item, $value){
        $table = "products";

        $response = ModelProducts::mdlShowProducts($table, $item, $value);

        return $response;
    }

    static public function ctrCreateProduct(){
        if (isset($_POST["newDescription"])) {

            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newDescription"]) &&
                preg_match('/^[0-9]+$/', $_POST["newStock"]) &&
                preg_match('/^[0-9.]+$/', $_POST["newBuyingPrice"]) &&
                preg_match('/^[0-9.]+$/', $_POST["newSellingPrice"])
            ) {

                /*=============================================
				VALIDATE IMAGE
				=============================================*/

                $route = "views/img/products/default/anonymous.png";

                if (isset($_FILES["newProdPhoto"]["tmp_name"])) {

                    list($width, $height) = getimagesize($_FILES["newProdPhoto"]["tmp_name"]);

                    $newWidth = 500;
                    $newHeight = 500;

                    /*=============================================
					we create the folder to save the picture
					=============================================*/

                    $folder = "views/img/products/" . $_POST["newCode"];

                    mkdir($folder, 0755);

                    /*=============================================
					WE APPLY DEFAULT PHP FUNCTIONS ACCORDING TO THE IMAGE FORMAT
					=============================================*/

                    if ($_FILES["newProdPhoto"]["type"] == "image/jpeg") {

                        /*=============================================
						WE SAVE THE IMAGE IN THE FOLDER
						=============================================*/

                        $random = mt_rand(100, 999);

                        $route = "views/img/products/" . $_POST["newCode"] . "/" . $random . ".jpg";

                        $origin = imagecreatefromjpeg($_FILES["newProdPhoto"]["tmp_name"]);

                        $destiny = imagecreatetruecolor($newWidth, $newHeight);

                        imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                        imagejpeg($destiny, $route);
                    }

                    if ($_FILES["newProdPhoto"]["type"] == "image/png") {

                        /*=============================================
						WE SAVE THE IMAGE IN THE FOLDER
						=============================================*/

                        $random = mt_rand(100, 999);

                        $route = "views/img/products/" . $_POST["newCode"] . "/" . $random . ".png";

                        $origin = imagecreatefrompng($_FILES["newProdPhoto"]["tmp_name"]);

                        $destiny = imagecreatetruecolor($newWidth, $newHeight);

                        imagecopyresized($destiny, $origin, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

                        imagepng($destiny, $route);
                    }
                }

                $table = "products";

                $data = array(
                    "category_id" => $_POST["newCategory"],
                    "code" => $_POST["newCode"],
                    "description" => $_POST["newDescription"],
                    "stock" => $_POST["newStock"],
                    "buying_price" => $_POST["newBuyingPrice"],
                    "selling_price" => $_POST["newSellingPrice"],
                    "image" => $route
                );

                $answer = ModelProducts::mdlAddProduct($table, $data);

                if ($answer == "ok") {

                    echo '<script>

						swal({
							title: "Good job!",
							text: "You have successfully added a product",
							icon: "success",
							  }).then(function(result){
										if (result) {

										window.location = "products";

										}
									})

						</script>';
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡El Product no puede ir con los campos vacíos o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "products";

							}
						})

			  	</script>';
            }
        }
    }
}