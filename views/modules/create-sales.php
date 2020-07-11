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
     <hr>

  <section class="content">

    <div class="row">
      
      <!--=============================================
      THE FORM
      =============================================-->
      <div class="col-lg-5 col-xs-12">
        
        <div class="card card-success">

          <div class="card-header with-border"></div>

          <form role="form" method="post" class="saleForm">

            <div class="card-body">
                
                <div class="box">

                    <!--=====================================
                    =            SELLER INPUT           =
                    ======================================-->
                  
                    
                    <div class="form-group">

                      <div class="input-group">
                      <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>

                        <input type="text" class="form-control" name="newSeller" id="newSeller" value="<?php echo $_SESSION["name"]; ?>" readonly>

                        <input type="hidden" name="idSeller" value="<?php echo $_SESSION["id"]; ?>">

                      </div>

                    </div>


                    <!--=====================================
                    CODE INPUT
                    ======================================-->
                  
                    
                    <div class="form-group">

                      
                      <div class="input-group">
                      <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fa fa-key"></span>
                  </div>
                </div>
                      
                        <?php 
                          $item = null;
                          $value = null;

                          $sales = ControllerSales::ctrShowSales($item, $value);

                          if(!$sales){

                            echo '<input type="text" class="form-control" name="newSale" id="newSale" value="10001" readonly>';
                          }
                          else{

                            foreach ($sales as $key => $value) {
                              
                            }

                            $code = $value["code"] +1;

                            echo '<input type="text" class="form-control" name="newSale" id="newSale" value="'.$code.'" readonly>';

                          }

                        ?>

                      </div>


                    </div>


                    <!--=====================================
                    =            CUSTOMER INPUT           =
                    ======================================-->
                  
                    
                    <div class="form-group">

                          <div class="input-group">
                      <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>

                       
                        <select class="form-control p-1" name="selectCustomer" id="selectCustomer" required>
                          
                            <option value="">Select customer</option>

                            <?php 

                            $item = null;
                            $value = null;

                            $customers = ControllerCustomers::ctrShowCustomers($item, $value);

                            foreach ($customers as $key => $value) {
                              echo '<option value="'.$value["id"].'">'.$value["name"].'</option>';
                            }


                            ?>

                        </select>

                        <span class="input-group-append"><button type="button" class="btn btn-primary p-1" data-toggle="modal" data-target="#addCustomer" data-dismiss="modal">Add Customer</button></span>

                      </div>

                    </div>

                    <!--=====================================
                    =            PRODUCT INPUT           =
                    ======================================-->
                  
                    
                    <div class="form-group row newProduct">


                    </div>

                    <input type="hidden" name="productsList" id="productsList">

                    <!--=====================================
                    =            ADD PRODUCT BUTTON          =
                    ======================================-->
                    
                    <button type="button" class="btn btn-default hidden-lg btnAddProduct">Add Product</button>

                    <hr>

                    <div class="row">

                      <!--=====================================
                        TAXES AND TOTAL INPUT
                      ======================================-->

                      <div class="col-xs-8 pull-right">

                        <table class="table">
                          
                          <thead>
                            
                            <th>Taxes</th>
                            <th>Total</th>

                          </thead>


                          <tbody>
                            
                            <tr>
                              
                              <td style="width: 50%">

                                <div class="input-group">
                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                     <span class="fa fa-percent"></span>
                                    </div>
                                  </div>
                                  
                                  <input type="number" class="form-control" name="newTaxSale" id="newTaxSale" placeholder="0" min="0" readonly>

                                  <input type="hidden" name="newTaxPrice" id="newTaxPrice" required>

                                  <input type="hidden" name="newNetPrice" id="newNetPrice" required>

                                </div>
                              </td>

                              <td style="width: 50%">

                                <div class="input-group">
                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                     <span class="ion ion-social-usd"></span>
                                    </div>
                                  </div>
                                 
                                  
                                  <input type="number" class="form-control" name="newSaleTotal" id="newSaleTotal" placeholder="00000" totalSale="" readonly required>

                                  <input type="hidden" name="saleTotal" id="saleTotal" required>

                                </div>

                              </td>

                            </tr>

                          </tbody>

                        </table>
                        
                      </div>

                      <hr>
                      
                    </div>

                    <hr>

                    <!--=====================================
                      PAYMENT METHOD
                      ======================================-->

                    <div class="form-group row">
                      
                      <div class="col-md-6" style="padding-right: 0">

                        <div class="input-group">
                      
                          <select class="form-control" name="newPaymentMethod" id="newPaymentMethod" required>
                            
                              <option value="">Select payment method</option>
                              <option value="cash">Cash</option>
                              <option value="CC">Credit Card</option>
                              <option value="DC">Debit Card</option>

                          </select>

                        </div>

                      </div>

                      <div class="paymentMethodBoxes" style="display:contents;"></div>

                      <input type="hidden" name="listPaymentMethod" id="listPaymentMethod" required>

                    </div>

                    <br>
                    
                </div>

            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary pull-right">Save sale</button>
            </div>
          </form>

       <?php

            $saveSale = new ControllerSales();
            $saveSale -> ctrCreateSale();
            
          ?>

        </div>

      </div>


      <!--=============================================
      =            PRODUCTS TABLE                   =
      =============================================-->


      <div class="col-lg-7 hidden-md hidden-sm hidden-xs">
        
          <div class="card card-warning">
            
            <div class="card-header with-border"></div>

            <div class="card-body">
              
              <table class="table table-bordered table-striped dt-responsive salesTable width="100%"">
                  
                <thead>

                   <tr>
                     
                     <th style="width:10px">#</th>
                     <th style="width:30px">Code</th>
                     <th>Description</th>
                     <th>Stock</th>
                     <th>Actions</th>

                   </tr> 

                </thead>

              </table>

            </div>

          </div>


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