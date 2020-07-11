/*=============================================
EDIT CUSTOMER
=============================================*/

$(".tables").on("click", "tbody .btnEditCustomer", function () {

  var idCustomer = $(this).attr("idCustomer");

  var datum = new FormData();
  datum.append("idCustomer", idCustomer);

  $.ajax({

    url: "ajax/customers_ajax.php",
    method: "POST",
    data: datum,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (answer) {

      $("#idCustomer").val(answer["id"]);
      $("#editCustomer").val(answer["name"]);
      $("#editIdDocument").val(answer["idDocument"]);
      $("#editEmail").val(answer["email"]);
      $("#editPhone").val(answer["phone"]);
      $("#editAddress").val(answer["address"]);
      $("#editBirthdate").val(answer["birthdate"]);
    }

  })

})

/*=============================================
DELETE CUSTOMER
=============================================*/

$(".tables").on("click", "tbody .btnDeleteCustomer", function () {

  var idCustomer = $(this).attr("idCustomer");

  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then(function (result) {
    if (result) {

      window.location = "index.php?route=customers&idCustomer=" + idCustomer;
    }

  })

})