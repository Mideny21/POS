<?php 
 if($_SESSION["profile"] == "seller"){
   echo '<srcipt>
    window.location = "home";
   </script>';
   return;
 }

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  
   <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Categories Management</h1>
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

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header with-border">
          <button class="btn btn-primary" data-toggle="modal" data-target="#addCategories">Add Category</button>

        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped dt-responsive tables" width="100%">
         
            <thead>
             
             <tr>
               
               <th style="width:10px">#</th>
               <th>Category</th>
               <th>Actions</th>

             </tr> 

            </thead>

            <tbody>
              <?php

                $item = null; 
                $value = null;

                $categories = ControllerCategories::ctrShowCategories($item, $value);

                // var_dump($categories);

                foreach ($categories as $key => $value) {

                  echo '<tr>
                          <td>'.($key+1).'</td>
                          <td class="text-uppercase">'.$value['category'].'</td>
                          <td>

                            <div class="btn-group">
                                
                              <button class="btn btn-warning btnEditCategory" idCategory="'.$value["id"].'" data-toggle="modal" data-target="#editCategories"><i class="fas fa-edit"></i></button>';
                              
                         if($_SESSION["profile"] == "administrator"){

                             echo' <button class="btn btn-danger btnDeleteCategory" idCategory="'.$value["id"].'"><i class="fas fa-times"></i></button>';
                         }
                          echo'  </div>  

                          </td>

                        </tr>';
                }

              ?>
              
            </tbody>

          </table>



        </div>
      
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>


<!--=====================================
=            module add Categories            =
======================================-->

<!-- Modal -->
<div id="addCategories" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="POST">

        <!--=====================================
        MODAL HEADER
        ======================================-->

        
        <div class="modal-header" style="background:#3c8dbc">
          <h5 class="modal-title" style="color:#fff" id="exampleModalLabel">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>


        <div class="modal-body">
          <div class="box-body">

            <!--Input name -->
            <div class="form-group">
              <label for="">Add category:</label>
              <div class="input-group">
              <div class="input-group-prepend">
              <div class="input-group-text">
               <span class="fa fa-th"></span>
              </div>
              </div>
               
                <input class="form-control input-lg" type="text" name="newCategory" placeholder="Add Category" required>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Category</button>
        </div>
      </form>
    </div>

  </div>
</div>

<?php
  
  $createCategory = new ControllerCategories();
  $createCategory -> ctrCreateCategory();
?>


<!--=====================================
=            module edit Categories            =
======================================-->

<!-- Modal -->
<div id="editCategories" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <form role="form" method="POST">

        <!--=====================================
        MODAL HEADER
        ======================================-->

        
        <div class="modal-header" style="background:#3c8dbc">
          <h5 class="modal-title" style="color:#fff" id="exampleModalLabel">Edit Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="box-body">

            <!--Input name -->
            <div class="form-group">
             <label for="">Edit category:</label>
              <div class="input-group">
              <div class="input-group-prepend">
              <div class="input-group-text">
               <span class="fa fa-th"></span>
              </div>
              </div>

                <input class="form-control" type="text" id="editCategory" name="editCategory" required>
                <input type="hidden" name="idCategory" id="idCategory" required>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>

        <?php
  
          $editCategory = new ControllerCategories();
          $editCategory -> ctrEditCategory();
        ?>
      </form>
    </div>

  </div>
</div>

<?php
  
  $deleteCategory = new ControllerCategories();
  $deleteCategory -> ctrDeleteCategory();
?>