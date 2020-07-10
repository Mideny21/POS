<?php

if($_SESSION["profile"] == "special" || $_SESSION["profile"] == "seller"){

  echo '<script>

    window.location = "home";

  </script>';

  return;

}

?>
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sales report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home">Home</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <section class="content">

    <div class="card">

      <div class="card-header with-border">

        <div class="input-group">

          <button type="button" class="btn btn-default" id="daterange-btn2">
           
            <span>
              <i class="fa fa-calendar"></i> Date range
            </span>

            <i class="fa fa-caret-down"></i>

          </button>

        </div>

        <div class="card-tools pull-right">

        <?php

        if(isset($_GET["inicialDate"])){

          echo '<a href="views/modules/download-report.php?report=report&inicialDate='.$_GET["inicialDate"].'&finalDate='.$_GET["finalDate"].'">';

        }else{

           echo '<a href="views/modules/download-report.php?report=report">';

        }         

        ?>
           
           <button class="btn btn-success" style="margin-top:5px">Export to Excel</button>

          </a>

        </div>
         
      </div>

      <div class="card-body">
        
        <div class="row">

          <div class="col-lg-12 col-md-12 col-xs-12">
            
            <?php

            include "reports/sales-graph.php";

            ?>

          </div>

           <div class="col-md-6 col-xs-12">
             
            <?php

            include "reports/bestseller-products.php";

            ?>

          </div>

          <div class="col-md-6 col-xs-12">
           
            <?php

            include "reports/sellers.php";

            ?>

         </div>

         <div class="col-md-6 col-xs-12">
           
            <?php

            include "reports/buyers.php";

            ?>

         </div>
          
        </div>

      </div>
      
    </div>

  </section>
 
 </div>
