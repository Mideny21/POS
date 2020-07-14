<?php

 class ControllerCategories{

 	/*=============================================
	CREATE CATEGORY
	=============================================*/
	
	static public function ctrCreateCategory(){

		if(isset($_POST['newCategory'])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newCategory"])){

				$table = 'categories';

				$data = $_POST['newCategory'];

				$answer = CategoriesModel::mdlAddCategory($table, $data);
				// var_dump($answer);

				if($answer == 'ok'){

					echo '<script>

						
						swal({
							title: "Good job!",
							text: "The category has been saved",
							icon: "success",

							}).then(function(result){
								if (result) {

									window.location = "categories";

								}
							});
						
						
					</script>';
				}
				

			}else{

				echo '<script>

						
						swal({
							icon: "error",
							title: "No especial characters or blank fields",
							showConfirmButton: true,
							confirmButtonText: "Close"
				
							 }).then(function(result){

								if (result) {
									window.location = "categories";
								}
							});
						
						
				</script>';
				
			}
		}
	}

	/*=============================================
	SHOW CATEGORIES
	=============================================*/

	static public function ctrShowCategories($item, $value){

		$table = "categories";

		$answer = CategoriesModel::mdlShowCategories($table, $item, $value);

		return $answer;
	}

	/*=============================================
	EDIT CATEGORY
	=============================================*/

	static public function ctrEditCategory(){

		if(isset($_POST["editCategory"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editCategory"])){

				$table = "categories";

				$data = array("category"=>$_POST["editCategory"],
							   "id"=>$_POST["idCategory"]);

				$answer = CategoriesModel::mdlEditCategory($table, $data);
				

				if($answer == "ok"){

					echo'<script>

				
						swal({
							title: "Good job!",
							text: "The category has been edited",
							icon: "success",

							}).then(function(result){
								if (result) {

									window.location = "categories";

								}
							});
						

					</script>';

				}


			}else{

				echo'<script>

					
					swal({
						  icon: "error",
						  title: "No especial characters or blank fields",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result) {

							window.location = "categories";

							}
						})
					

			  	</script>';

			}

		}

	}

	/*=============================================
	DELETE CATEGORY
	=============================================*/

	static public function ctrDeleteCategory(){

		if(isset($_GET["idCategory"])){

			$table ="categories";
			$data = $_GET["idCategory"];

			$answer = CategoriesModel::mdlDeleteCategory($table, $data);
			// var_dump($answer);

			if($answer == "ok"){

				echo'<script>

				
					swal({
						  icon: "success",
						  text: "The category has been successfully deleted",
						  title: "Good job",
						  }).then(function(result){
									if (result) {

									window.location = "categories";

									}
								})
							

					</script>';
			}
		
		}
		
	}

}