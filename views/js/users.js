/*=============================================
UPLOADING USER PICTURE
=============================================*/
$(document).on("change", ".newPics", function () {
  var newImage = this.files[0];

  /*===============================================
	=            validating image format            =
	===============================================*/

  if (newImage["type"] != "image/jpeg" && newImage["type"] != "image/png") {
    $(".newPics").val("");

    swal({
      type: "error",
      title: "Error uploading image",
      text: "¡Image has to be JPEG or PNG!",
      showConfirmButton: true,
      confirmButtonText: "Close",
    });
  } else if (newImage["size"] > 10000000) {
    $(".newPics").val("");

    swal({
      icon: "error",
      title: "Error uploading image",
      text: "¡Image too big. It has to be less than 10Mb!",
      showConfirmButton: true,
      confirmButtonText: "Close",
    });
  } else {
    var imgData = new FileReader();
    imgData.readAsDataURL(newImage);

    $(imgData).on("load", function (event) {
      var routeImg = event.target.result;

      $(".preview").attr("src", routeImg);
    });
  }

  /*=====  End of validating image format  ======*/
});

/*=============================================
EDITING USER PICTURE
=============================================*/
$(document).on("click", ".btnEditUser", function () {
  var idUser = $(this).attr("idUser");

  var data = new FormData();
  data.append("idUser", idUser);

  $.ajax({
    url: "ajax/users_ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (answer) {
      // console.log("answer", answer);

      $("#EditName").val(answer["name"]);

      $("#EditUser").val(answer["user"]);

      $("#EditProfile").html(answer["profile"]);

      $("#EditProfile").val(answer["profile"]);

      $("#currentPasswd").val(answer["password"]);

      $("#currentPicture").val(answer["photo"]);

      if (answer["photo"] != "") {
        $(".preview").attr("src", answer["photo"]);
      }
    },
  });
});

/*=============================================
ACTIVATE USER
=============================================*/
$(document).on("click", ".btnActivate", function () {
  var userId = $(this).attr("userId");
  var userStatus = $(this).attr("userStatus");

  var datum = new FormData();
  datum.append("activateId", userId);
  datum.append("activateUser", userStatus);

  $.ajax({
    url: "ajax/users_ajax.php",
    method: "POST",
    data: datum,
    cache: false,
    contentType: false,
    processData: false,
    success: function (answer) {
      // console.log("answer", answer);

      swal({
        text: "The user status has been updated",
        icon: "success",
        title: "Good job",
      }).then(function (result) {
        if (result) {
          window.location = "users";
        }
      });
    },
  });

  if (userStatus == 0) {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Deactivated");
    $(this).attr("userStatus", 1);
  } else {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activated");
    $(this).attr("userStatus", 0);
  }
});

/*=============================================
VALIDATE IF USER ALREADY EXISTS
=============================================*/

$("#newUser").change(function () {
  $(".alert").remove();

  var user = $(this).val();

  var data = new FormData();
  data.append("validateUser", user);

  $.ajax({
    url: "ajax/users_ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (answer) {
      // console.log("answer", answer);

      if (answer) {
        $("#newUser")
          .parent()
          .after(
            '<div class="alert alert-warning">This user is already taken</div>'
          );

        $("#newUser").val("");
      }
    },
  });
});

/*=============================================
DELETE USER
=============================================*/

$(document).on("click", ".btnDeleteUser", function () {
  var userId = $(this).attr("userId");
  var userPhoto = $(this).attr("userPhoto");
  var username = $(this).attr("username");

  swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  }).then(function (result) {
    if (result) {
      window.location =
        "index.php?route=users&userId=" +
        userId +
        "&username=" +
        username +
        "&userPhoto=" +
        userPhoto;
    }
  });
});
