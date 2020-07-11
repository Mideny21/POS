/*=============================================
EDIT CATEGORY
=============================================*/

$(".tables").on("click", ".btnEditCategory", function () {

	var idCategory = $(this).attr("idCategory");

	var datum = new FormData();
	datum.append("idCategory", idCategory);

	$.ajax({
		url: "ajax/categories.ajax.php",
		method: "POST",
		data: datum,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function (answer) {

			// console.log("answer", answer);

			$("#editCategory").val(answer["Category"]);
			$("#idCategory").val(answer["id"]);

		}

	})

})

/*=============================================
DELETE CATEGORY
=============================================*/
$(".tables").on("click", ".btnDeleteCategory", function () {

	var idCategory = $(this).attr("idCategory");

	swal({
		title: "Are you sure?",
		text: "Once deleted, you will not be able to recover",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	}).then(function (result) {

		if (result) {

			window.location = "index.php?route=categories&idCategory=" + idCategory;

		}

	})

})