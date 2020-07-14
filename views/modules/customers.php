<?php 
 if($_SESSION["profile"] == "special"){
   echo '<srcipt>
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
            <h1 class="m-0 text-dark">Customers Management</h1>
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

     <hr>

  <section class="content">

    <div class="card">

      <div class="card-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#addCustomer">

        Add Customer

        </button>

      </div>
      <div class="card-body">
        <table class="table table-bordered table-striped dt-responsive tables" width="100%">
       
          <thead>
           
           <tr>
             
             <th style="width:10px">#</th>
             <th>Name</th>
             <th>Email</th>
             <th>Phone</th>
             <th>Address</th>
             <th>Total purchases</th>
      
             <th>Last sale</th>
             <th>Actions</th>

           </tr> 

          </thead>

          <tbody>
          
          <?php

            $item = null;
            $valor = null;

            $Customers = controllerCustomers::ctrShowCustomers($item, $valor);

            foreach ($Customers as $key => $value) {
              

              echo '<tr>

                      <td>'.($key+1).'</td>

                      <td>'.$value["name"].'</td>

                      

                      <td>'.$value["email"].'</td>

                      <td>'.$value["phone"].'</td>

                      <td>'.$value["address"].'</td>

                                

                      <td>'.$value["purchases"].'</td>


                      <td>'.$value["registerDate"].'</td>

                      <td>

                        <div class="btn-group">
                            
                          <button class="btn btn-warning btnEditCustomer" data-toggle="modal" data-target="#modalEditCustomer" idCustomer="'.$value["id"].'"><i class="fas fa-edit"></i></button>';
   
                          if($_SESSION["profile"] == "administrator"){

                         echo' <button class="btn btn-danger btnDeleteCustomer" idCustomer="'.$value["id"].'"><i class="fas fa-times"></i></button>';
                          }
                        echo'</div>  

                      </td>

                    </tr>';
            
              }

          ?>
            
          </tbody>

        </table>

      </div>
    
    </div>

  </section>

</div>

<!--=====================================
MODAL ADD CUSTOMER
======================================-->

<div id="addCustomer" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST">

        <!--=====================================
        MODAL HEADER
        ======================================-->

        
        <div class="modal-header" style="background:#3c8dbc">
          <h5 class="modal-title" style="color:#fff" id="exampleModalLabel">Add Customers</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!--=====================================
        MODAL BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

             <!-- NAME INPUT -->

            <div class="form-group">
              <label for="">Name/Company name:</label>

              <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                 <span class="fa fa-user"></span>
                </div>
              </div>
               
                <input class="form-control" type="text" name="newCustomer" placeholder="Name" required>
              </div>
            </div>

            <!-- I.D DOCUMENT INPUT -->
<!-- 
            <div class="form-group">
              <div class="input-group">

              <div class="input-group-prepend">
                <div class="input-group-text">
                 <span class="fa fa-key"></span>
                </div>
              </div>
              
                <input class="form-control input-lg" type="number" min="0" name="newIdDocument" placeholder="Write your ID" required>
              </div>
            </div> -->

            <!-- EMAIL INPUT -->

            <div class="form-group">
              <label for="">Email:</label>
              <div class="input-group">

              
              <div class="input-group-prepend">
                <div class="input-group-text">
                 <span class="fa fa-envelope"></span>
                </div>
              </div>
              
                <input class="form-control" type="text" name="newEmail" placeholder="Email" required>
              </div>
            </div>

            <!-- PHONE INPUT -->

            <div class="form-group">
              <label for="">Phone number:</label>
              <div class="input-group">

              <div class="input-group-prepend">
                <div class="input-group-text">
                 <span class="fa fa-phone"></span>
                </div>
              </div>
              
                <input class="form-control" type="text" name="newPhone" placeholder="phone" data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']" data-mask required>
              </div>
            </div>

            <!-- ADDRESS INPUT -->

            <div class="form-group">
              <label for="">Address:</label>
              <div class="input-group">

               <div class="input-group-prepend">
                <div class="input-group-text">
                 <span class="fa fa-map-marker"></span>
                </div>
              </div>
              
                <input class="form-control input-lg" type="text" name="newAddress" placeholder="Address" required>
              </div>
            </div>


             <!-- BIRTH DATE INPUT -->
<!-- 
            <div class="form-group">
              <div class="input-group">

               <div class="input-group-prepend">
                <div class="input-group-text">
                 <span class="fa fa-calendar"></span>
                </div>
              </div>
      
                <input class="form-control input-lg" type="text" name="newBirthdate" placeholder="Birth Date" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
              </div>
            </div> -->

          </div>

        </div>

        <!--=====================================
        MODAL FOOTER
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Customer</button>
        </div>
      </form>

      <?php

        $createCustomer = new ControllerCustomers();
        $createCustomer -> ctrCreateCustomer();

      ?>
    </div>

  </div>

</div>


<!--=====================================
MODAL EDIT CUSTOMER
======================================-->

<div id="modalEditCustomer" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        MODAL HEADER
        ======================================-->

        
        <div class="modal-header" style="background:#3c8dbc">
          <h5 class="modal-title" style="color:#fff" id="exampleModalLabel">Edit Customers</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!--=====================================
        MODAL BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- NAME INPUT -->
            
            <div class="form-group">
              
              <label for="">Name/Company name:</label>

              <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                 <span class="fa fa-user"></span>
                </div>
              </div>

                <input type="text" class="form-control" name="editCustomer" id="editCustomer" required>
                <input type="hidden" id="idCustomer" name="idCustomer">
              </div>

            </div>

            

            <!-- EMAIL INPUT -->
            
            <div class="form-group">
              
                 <label for="">Email:</label>
              <div class="input-group">

              
              <div class="input-group-prepend">
                <div class="input-group-text">
                 <span class="fa fa-envelope"></span>
                </div>
              </div>

                <input type="email" class="form-control" name="editEmail" id="editEmail" required>

              </div>

            </div>

            <!-- PHONE INPUT -->
            
            <div class="form-group">
              
              <label for="">Phone number:</label>
              <div class="input-group">

              <div class="input-group-prepend">
                <div class="input-group-text">
                 <span class="fa fa-phone"></span>
                </div>
              </div>

                <input type="text" class="form-control" name="editPhone" id="editPhone" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ADDRESS INPUT -->
            
            <div class="form-group">
              
                <label for="">Address:</label>
              <div class="input-group">

               <div class="input-group-prepend">
                <div class="input-group-text">
                 <span class="fa fa-map-marker"></span>
                </div>
              </div>

                <input type="text" class="form-control" name="editAddress" id="editAddress"  required>

              </div>

            </div>

          
  
          </div>

        </div>

        <!--=====================================
        MODAL FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Save changes</button>

        </div>

        <?php

        $EditCustomer = new ControllerCustomers();
        $EditCustomer -> ctrEditCustomer();

      ?>

      </form>

      

    

    </div>

  </div>

</div>

<?php

  $deleteCustomer = new ControllerCustomers();
  $deleteCustomer -> ctrDeleteCustomer();

?>