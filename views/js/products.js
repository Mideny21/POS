//LOADING DYNAMIC DATA FROM DATABASE

var hiddenprofile = $("#hiddenprofile").val();

$(".tablesData").DataTable({
  ajax: "ajax/datatable-product_ajax.php?hiddenprofile=" + hiddenprofile,
  defender: true,
  retrieve: true,
  processing: true,
});

$("#newCategory").change(function () {
  var idCategory = $(this).val();

  var data = new FormData();
  data.append("idCategory", idCategory);

  $.ajax({
    url: "ajax/products_ajax.php",
    method: "post",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      if (!response) {
        var newCode = idCategory + "01";
        $("#newCode").val(newCode);
      } else {
        var newCode = Number(response["code"]) + 1;
        $("#newCode").val(newCode);
      }
    },
  });
});

//FOR CALCULATING SELLING PRICE
$("#newBuyingPrice").change(function () {
  if ($(".percentage").prop("checked")) {
    var PercentageValue = $(".newPercentage").val();
    var percentage =
      Number(($("#newBuyingPrice").val() * PercentageValue) / 100) +
      Number($("#newBuyingPrice").val());

    $("#newSellingPrice").val(percentage);
    $("#newSellingPrice").prop("readonly", true);
  }
});

// WHEN THE PERCENTAGE CHANGES
$(".newPercentage").change(function () {
  if ($(".percentage").prop("checked")) {
    var PercentageValue = $(".newPercentage").val();
    var percentage =
      Number(($("#newBuyingPrice").val() * PercentageValue) / 100) +
      Number($("#newBuyingPrice").val());

    $("#newSellingPrice").val(percentage);
    $("#newSellingPrice").prop("readonly", true);
  }
});

//WHEN CHECKBOX IS OFF
if ($(".percentage").prop("checked", false)) {
  $("#newSellingPrice").prop("readonly", false);
}

/*=============================================
UPLOADING PRODUCT IMAGE
=============================================*/

$(".newImage").change(function () {
  var image = this.files[0];

  /*=============================================
  	WE VALIDATE THAT THE FORMAT IS JPG OR PNG
  	=============================================*/

  if (image["type"] != "image/jpeg" && image["type"] != "image/png") {
    $(".newImage").val("");

    swal({
      title: "Error uploading image",
      text: "¡The image should be in JPG o PNG format!",
      type: "error",
      confirmButtonText: "¡Close!",
    });
  } else if (image["size"] > 2000000) {
    $(".newImage").val("");

    swal({
      title: "Error uploading image",
      text: "¡The image shouldn't be more than 2MB!",
      type: "error",
      confirmButtonText: "¡Close!",
    });
  } else {
    var imageData = new FileReader();
    imageData.readAsDataURL(image);

    $(imageData).on("load", function (event) {
      var imagePath = event.target.result;

      $(".preview").attr("src", imagePath);
    });
  }
});

/*=============================================
EDIT PRODUCT
=============================================*/

$(".tablesData tbody").on("click", "button.btnEditProduct", function () {
  var idProduct = $(this).attr("idProduct");

  var datum = new FormData();
  datum.append("idProduct", idProduct);

  $.ajax({
    url: "ajax/products_ajax.php",
    method: "POST",
    data: datum,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (answer) {
      // console.log("answer", answer);

      var categoryData = new FormData();
      categoryData.append("idCategory", answer["category_id"]);

      $.ajax({
        url: "ajax/categories_ajax.php",
        method: "POST",
        data: categoryData,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (answer) {
          $("#editCategory").val(answer["id"]);
          $("#editCategory").html(answer["category"]);
        },
      });

      $("#editCode").val(answer["code"]);

      $("#editDescription").val(answer["description"]);

      $("#editStock").val(answer["stock"]);

      $("#editBuyingPrice").val(answer["buying_price"]);

      $("#editSellingPrice").val(answer["selling_price"]);

      if (answer["image"] != "") {
        $("#currentImage").val(answer["image"]);

        $(".preview").attr("src", answer["image"]);
      }
    },
  });
});

/*=============================================
DELETE PRODUCT
=============================================*/

$(".tablesData tbody").on("click", "button.btnDeleteProduct", function () {
  var idProduct = $(this).attr("idProduct");
  var code = $(this).attr("code");
  var image = $(this).attr("image");

  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then(function (result) {
    if (result) {
      window.location =
        "index.php?route=products&idProduct=" + idProduct + "&Code=" + code;
    }
  });
});
