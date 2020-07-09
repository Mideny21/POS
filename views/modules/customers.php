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
             <th>I.D Document</th>
             <th>Email</th>
             <th>Phone</th>
             <th>Address</th>
             <th>Birthday</th>
             <th>Total purchases</th>
             <th>Last Purchase</th>
             <th>Last login</th>
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

                      <td>'.$value["idDocument"].'</td>

                      <td>'.$value["email"].'</td>

                      <td>'.$value["phone"].'</td>

                      <td>'.$value["address"].'</td>

                      <td>'.$value["birthdate"].'</td>             

                      <td>'.$value["purchases"].'</td>

                      <td>0000-00-00 00:00:00</td>

                      <td>'.$value["registerDate"].'</td>

                      <td>

                        <div class="btn-group">
                            
                          <button class="btn btn-warning btnEditCustomer" data-toggle="modal" data-target="#modalEditCustomer" idCustomer="'.$value["id"].'"><i class="fas fa-edit"></i></button>

                          <button class="btn btn-danger btnDeleteCustomer" idCustomer="'.$value["id"].'"><i class="fas fa-times"></i></button>

                        </div>  

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
              <div class="input-group">

              <div class="input-group-append">
                <div class="input-group-text">
                 <span class="fa fa-user"></span>
                </div>
              </div>
               
                <input class="form-control input-lg" type="text" name="newCustomer" placeholder="Write name" required>
              </div>
            </div>

            <!-- I.D DOCUMENT INPUT -->

            <div class="form-group">
              <div class="input-group">

              <div class="input-group-append">
                <div class="input-group-text">
                 <span class="fa fa-key"></span>
                </div>
              </div>
              
                <input class="form-control input-lg" type="number" min="0" name="newIdDocument" placeholder="Write your ID" required>
              </div>
            </div>

            <!-- EMAIL INPUT -->

            <div class="form-group">
              <div class="input-group">

              
              <div class="input-group-append">
                <div class="input-group-text">
                 <span class="fa fa-envelope"></span>
                </div>
              </div>
              
                <input class="form-control input-lg" type="text" name="newEmail" placeholder="Email" required>
              </div>
            </div>

            <!-- PHONE INPUT -->

            <div class="form-group">
              <div class="input-group">

              <div class="input-group-append">
                <div class="input-group-text">
                 <span class="fa fa-phone"></span>
                </div>
              </div>
              
                <input class="form-control input-lg" type="text" name="newPhone" placeholder="phone" data-inputmask="'mask':'(999) 999-9999'" data-mask required>
              </div>
            </div>

            <!-- ADDRESS INPUT -->

            <div class="form-group">
              <div class="input-group">

               <div class="input-group-append">
                <div class="input-group-text">
                 <span class="fa fa-map-marker"></span>
                </div>
              </div>
              
                <input class="form-control input-lg" type="text" name="newAddress" placeholder="Address" required>
              </div>
            </div>


             <!-- BIRTH DATE INPUT -->

            <div class="form-group">
              <div class="input-group">

               <div class="input-group-append">
                <div class="input-group-text">
                 <span class="fa fa-calendar"></span>
                </div>
              </div>
      
                <input class="form-control input-lg" type="text" name="newBirthdate" placeholder="Birth Date" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>
              </div>
            </div>

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

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Edit Customer</h4>

        </div>

        <!--=====================================
        MODAL BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- NAME INPUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="editCustomer" id="editCustomer" required>
                <input type="hidden" id="idCustomer" name="idCustomer">
              </div>

            </div>

            <!-- I.D DOCUMENT INPUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" min="0" class="form-control input-lg" name="editIdDocument" id="editIdDocument" required>

              </div>

            </div>

            <!-- EMAIL INPUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span> 

                <input type="email" class="form-control input-lg" name="editEmail" id="editEmail" required>

              </div>

            </div>

            <!-- PHONE INPUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-phone"></i></span> 

                <input type="text" class="form-control input-lg" name="editPhone" id="editPhone" data-inputmask="'mask':'(999) 999-9999'" data-mask required>

              </div>

            </div>

            <!-- ADDRESS INPUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span> 

                <input type="text" class="form-control input-lg" name="editAddress" id="editAddress"  required>

              </div>

            </div>

            <!-- BIRTH DATE INPUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editBirthdate" id="editBirthdate"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

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

      </form>

      <?php

        $EditCustomer = new ControllerCustomers();
        $EditCustomer -> ctrEditCustomer();

      ?>

    

    </div>

  </div>

</div>

<?php

  $deleteCustomer = new ControllerCustomers();
  $deleteCustomer -> ctrDeleteCustomer();

?>