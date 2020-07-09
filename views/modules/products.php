<div class="content-wrapper">

  <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Products Management</h1>
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

        <button class="btn btn-primary" data-toggle="modal" data-target="#addProduct">Add Product</button>

      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tablesData" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Image</th>
              <th>Code</th>
              <th>Description</th>
              <th>Stock</th>
              <th>buying price</th>
              <th>selling price</th>
              <th>Date added</th>
              <th>Category</th>
              <th>Actions</th>

            </tr>

          </thead>



        </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
=            module add Product            =
======================================-->

<!-- Modal -->
<div id="addProduct" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc">
          <h5 class="modal-title" style="color:#fff" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="card-body">


            <!-- input category -->
            <div class="form-group">

              <div class="input-group">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-th"></span>
                  </div>
                </div>

                <select class="form-control input-lg" id="newCategory" name="newCategory" required>

                  <option value="">Select Category</option>
                  <?php

                  $item = null;
                  $value = null;


                  $categories = ControllerCategories::ctrShowCategories($item, $value);

                  foreach ($categories as $key => $value) {
                    echo '<option value="' . $value["id"] . '">' . $value['category'] . '</option>';
                  }
                  ?>


                </select>

              </div>

            </div>

            <!--Input Code -->
            <div class="form-group">

              <div class="input-group">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-code"></span>
                  </div>
                </div>

                <input class="form-control input-lg" type="text" id="newCode" name="newCode" placeholder="Add Code" required readonly>

              </div>

            </div>

            <!-- input description -->
            <div class="form-group">

              <div class="input-group">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-th"></span>
                  </div>
                </div>


                <input class="form-control input-lg" type="text" id="newDescription" name="newDescription" placeholder="Add Description" required>

              </div>

            </div>

            <!-- input Stock -->
            <div class="form-group">

              <div class="input-group">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-check"></span>
                  </div>
                </div>

                <input class="form-control input-lg" type="number" id="newStock" name="newStock" placeholder="Add Stock" min="0" required>

              </div>

            </div>

            <!-- INPUT BUYING PRICE -->
            <div class="form-group row">

              <div class="col-xs-12 col-sm-6">

                <div class="input-group">

                  <input type="number" class="form-control input-lg" id="newBuyingPrice" name="newBuyingPrice" step="any" min="0" placeholder="Buying price" required>

                </div>

              </div>

              <!-- INPUT SELLING PRICE -->
              <div class="col-xs-12 col-sm-6">

                <div class="input-group">


                  <input type="number" class="form-control input-lg" id="newSellingPrice" name="newSellingPrice" step="any" min="0" placeholder="Selling price" required>

                </div>

                <br>

                <!-- CHECKBOX PERCENTAGE -->
                <div class="col-xs-6">

                  <div class="form-group">

                    <label>

                      <input type="checkbox" class="minimal percentage" checked>

                      Use percentage

                    </label>

                  </div>

                </div>

                <!-- INPUT PERCENTAGE -->
                <div class="col-xs-6" style="padding:0">

                  <div class="input-group">

                    <input type="number" class="form-control input-lg newPercentage" min="0" value="40" required>

                    <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                  </div>

                </div>

              </div>

            </div>

            <!-- input image -->
            <div class="form-group">

              <div class="panel">Upload image</div>

              <input id="newProdPhoto" type="file" class="newImage" name="newProdPhoto">

              <p class="help-block">Maximum size 2Mb</p>

              <img src="views/img/products/default/anonymous.png" class="img-thumbnail preview" alt="" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Save product</button>

        </div>

      </form>
      <?php
      $CreateProduct = new ProductController();
      $CreateProduct->ctrCreateProduct();
      ?>

    </div>

  </div>

</div>

<!--====  End of module add Product  ====-->

<!--=====================================
EDIT PRODUCT
======================================-->

<div id="modalEditProduct" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Edit product</h4>

        </div>

        <!--=====================================
         BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- Select Category -->
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="editCategory" readonly required>
                  
                  <option id="editCategory"></option>

                </select>

              </div>

            </div>

            <!-- INPUT FOR THE CODE -->          
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-code"></i></span> 

                <input type="text" class="form-control input-lg" id="editCode" name="editCode" readonly required>

              </div>

            </div>

            <!-- INPUT FOR THE DESCRIPTION -->
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-product-hunt"></i></span> 

                <input type="text" class="form-control input-lg" id="editDescription" name="editDescription" required>

              </div>

            </div>

             <!-- INPUT FOR THE STOCK -->
             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-check"></i></span> 

                <input type="number" class="form-control input-lg" id="editStock" name="editStock" min="0" required>

              </div>

            </div>

             <!-- INPUT FOR BUYING PRICE -->
             <div class="form-group row">

                <div class="col-xs-12 col-sm-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-up"></i></span> 

                    <input type="number" class="form-control input-lg" id="editBuyingPrice" name="editBuyingPrice" step="any" min="0" required>

                  </div>

                </div>

                <!-- INPUT FOR SELLING PRICE -->
                <div class="col-xs-12 col-sm-6">
                
                  <div class="input-group">
                  
                    <span class="input-group-addon"><i class="fa fa-arrow-down"></i></span> 

                    <input type="number" class="form-control input-lg" id="editSellingPrice" name="editSellingPrice" step="any" min="0" readonly required>

                  </div>
                
                  <br>

                  <!-- PERCENTAGE CHECKBOX -->
                  <div class="col-xs-6">
                    
                    <div class="form-group">
                      
                      <label>
                        
                        <input type="checkbox" class="minimal percentage" checked>
                        
                        Use Percentage

                      </label>

                    </div>

                  </div>

                  <!-- INPUT FOR PORCENTAJE -->
                  <div class="col-xs-6" style="padding:0">
                    
                    <div class="input-group">
                      
                      <input type="number" class="form-control input-lg newPercentage" min="0" value="40" required>

                      <span class="input-group-addon"><i class="fa fa-percent"></i></span>

                    </div>

                  </div>

                </div>

            </div>

            <!-- INPUT TO UPLOAD IMAGE -->
             <div class="form-group">
              
              <div class="panel">Upload Image</div>

              <input type="file" class="newImage" name="editImage">

              <p class="help-block">2MB max</p>

              <img src="views/img/products/default/anonymous.png" class="img-thumbnail preview" width="100px">

              <input type="hidden" name="currentImage" id="currentImage">

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Save changes</button>

        </div>

      </form>

        <?php

          $editProduct = new ProductController();
          $editProduct -> ctrEditProduct();

        ?>      

    </div>

  </div>

</div>
