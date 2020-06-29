<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Product management

    </h1>

    <ol class="breadcrumb">

      <li><a href="home"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Dashboard</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#addProduct">Add Product</button>

      </div>

      <div class="box-body">

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

          <div class="box-body">


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