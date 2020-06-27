<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="views/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="views/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="views/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Sweet Alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <!--====  End of views/views/plugins CSS  ====-->



</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <!-- Site wrapper -->
  <div class="wrapper">

    <?php

    // if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == "ok") {

    // echo '<div class="wrapper">';


    /*=============================================
      =            header          =
      =============================================*/

    include "modules/header.php";

    /*=============================================
      =            sidebar          =
      =============================================*/

    include "modules/sidebar.php";

    /*=============================================
      =            Content          =
      =============================================*/

    if (isset($_GET["route"])) {

      if (
        $_GET["route"] == 'home' ||
        $_GET["route"] == 'users' ||
        $_GET["route"] == 'categories' ||
        $_GET["route"] == 'products' ||
        $_GET["route"] == 'customers' ||
        $_GET["route"] == 'manage-sales' ||
        $_GET["route"] == 'create-sales' ||
        $_GET["route"] == 'sales-report' ||
        $_GET["route"] == 'logout'
      ) {

        include "modules/" . $_GET["route"] . ".php";
      } else {

        include "modules/404.php";
      }
    } else {

      include "modules/home.php";
    }

    /*=============================================
      =            Footer          =
      =============================================*/

    include "modules/footer.php";

    // echo '</div>';
    // } else {
    /*=============================================
      =            login          =
      =============================================*/

    // include "modules/login.php";
    // }

    ?>

  </div>
  <!-- ./wrapper -->

  <script src="views/js/template.js"></script>
  <script src="views/js/users.js"></script>
  <script src="views/js/categories.js"></script>


  <!-- jQuery -->
  <script src="views/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="views/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 4 -->
  <script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="views/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="views/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="views/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="views/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="views/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="views/plugins/moment/moment.min.js"></script>
  <script src="views/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="views/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="views/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="views/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="views/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="views/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="views/dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script>
    $(function() {

      $('.tables').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "responsive": true,
      });
    });
  </script>
</body>

</html>