<div class="content-wrapper">

  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sales Management</h1>
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

    <div class="card">

      <div class="card-header with-border">
     
        <a href="create-sales">
          <button class="btn btn-primary" >
        
            Add sale
  
          </button>
        </a>

        <button type="button" class="btn btn-default float-sm-right" id="daterange-btn">
           
            <span>
              <i class="fa fa-calendar"></i> Date Range
            </span>

            <i class="fa fa-caret-down"></i>

        </button>
      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
            <th style="width:10px">#</th>
             <th>Bill code</th>
             <th>Customer</th>
             <th>Seller</th>
             <th>Payment method</th>
             <th>Net cost</th>
             <th>Total cost</th>
             <th>Date</th>
             <th>Actions</th>

           </tr> 

          </thead>

          <tbody>

       <?php

          if(isset($_GET["initialDate"])){

            $initialDate = $_GET["initialDate"];
            $finalDate = $_GET["finalDate"];

          }else{

            $initialDate = null;
            $finalDate = null;

          }

          $answer = ControllerSales::ctrSalesDatesRange($initialDate, $finalDate);

          foreach ($answer as $key => $value) {
           

           echo '<td>'.($key+1).'</td>

                  <td>'.$value["code"].'</td>';

                  $itemCustomer = "id";
                  $valueCustomer = $value["idCustomer"];

                  $customerAnswer = ControllerCustomers::ctrShowCustomers($itemCustomer, $valueCustomer);

                  echo '<td>'.$customerAnswer["name"].'</td>';

                  $itemUser = "id";
                  $valueUser = $value["idSeller"];

                  $userAnswer = ControllerUsers::ctrShowUsers($itemUser, $valueUser);

                  echo '<td>'.$userAnswer["name"].'</td>

                  <td>'.$value["paymentMethod"].'</td>

                  <td>Tsh '.number_format($value["netPrice"],2).'</td>

                  <td>Tsh '.number_format($value["totalPrice"],2).'</td>

                  <td>'.$value["Date"].'</td>

                  <td>

                    <div class="btn-group">
                        
                   
                        
                        <button class="btn btn-info btnPrintBill" saleCode="'.$value["code"].'">

                        <i class="fa fa-print"></i>

                      </button>

                        <button class="btn btn-warning btnEditSale" idSale="'.$value["id"].'"><i class="fa fa-edit"></i></button>

                        <button class="btn btn-danger btnDeleteSale" idSale="'.$value["id"].'"><i class="fa fa-times"></i></button>
                   </div>  

                  </td>

                </tr>';
            }

        ?>



          </tbody>

        </table>
       <?php

          $deleteSale = new ControllerSales();
          $deleteSale -> ctrDeleteSale();

          ?>
      </div>
    
    </div>

  </section>

</div>


<!--=====================================
=            module add user            =
======================================-->

<!-- Modal -->
<div id="addUser" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->

    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/formdata">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background: #3c8dbc; color: #fff">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Add user</h4>

        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--Input name -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input class="form-control input-lg" type="text" name="newName" placeholder="Add name" required>

              </div>

            </div>

            <!-- input username -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <input class="form-control input-lg" type="text" name="newUser" placeholder="Add username" required>

              </div>

            </div>

            <!-- input password -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input class="form-control input-lg" type="text" name="newPasswd" placeholder="Add password" required>

              </div>

            </div>

            <!-- input profile -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-key"></i></span>

                <select class="form-control input-lg" name="newProfile">

                  <option value="">Select profile</option>
                  <option value="administrator">Administrator</option>
                  <option value="special">Special</option>
                  <option value="seller">Seller</option>

                </select>

              </div>

            </div>

            <!-- input password -->

            <div class="form-group">

              <div class="panel">Upload image</div>

              <input id="newPhoto" type="file" name="newPhoto">

              <p class="help-block">Maximum size 200Mb</p>

              <img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Save</button>

        </div>

      </form>

    </div>

  </div>

</div>

<!--====  End of module add user  ====-->
