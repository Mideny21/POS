<div class="content-wrapper">

   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="logout">Logout</a></li>
             
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

  <section class="content">
<div class="container-fluid">


    <div class="row">
      
      <?php

        if($_SESSION["profile"] == "administrator"){

                      include "home/top-boxes.php";

        }

        ?>

      
    
    </div>
    
    <div class="row">

      <div class="col-lg-12">

      <?php

        if($_SESSION["profile"] =="administrator"){

          include "reports/sales-graph.php";

        }

      ?>
      
      </div>

      <div class="col-lg-6">
        
        <?php

          if($_SESSION["profile"] =="administrator"){

            include "reports/bestseller-products.php";

          }

        ?>

      </div>

       <div class="col-lg-6">
        
        <?php

          if($_SESSION["profile"] =="administrator"){

            include "home/recent-products.php";

          }

        ?>

      </div>

      <div class="col-lg-12">
           
        <?php

        if($_SESSION["profile"] =="special" || $_SESSION["profile"] =="seller"){

           echo '<div class="card card-success">

           <div class="card-header">

           <h1>Welcome ' .$_SESSION["name"].'</h1>

           </div>

           </div>';

        }

        ?>

      </div>

    </div>
    </div>

  </section>

</div>
