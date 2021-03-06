<?php 
 if($_SESSION["profile"] == "special" || $_SESSION["profile"] == "seller"){
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
            <h1 class="m-0 text-dark">User Management</h1>
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

        <button class="btn btn-primary" data-toggle="modal" data-target="#addUser">

          Add user

        </button>

      </div>

      <div class="card-body">

        <table class="table table-bordered table-striped dt-responsive tables" width="100%">

          <thead>

            <tr>

              <th style="width:10px">#</th>
              <th>Name</th>
              <th>Username</th>
              <th>Photo</th>
              <th>Profile</th>
              <th>Status</th>
              <th>Last login</th>
              <th>Actions</th>

            </tr>

          </thead>

          <tbody>

            <?php

            $item = null;
            $value = null;

            $users = ControllerUsers::ctrShowUsers($item, $value);

            // var_dump($users);

            foreach ($users as $key => $value) {

              echo '

                  <tr>
                    <td>' . ($key + 1) . '</td>
                    <td>' . $value["name"] . '</td>
                    <td>' . $value["user"] . '</td>';

              if ($value["photo"] != "") {

                echo '<td><img src="' . $value["photo"] . '" class="img-thumbnail" width="40px"></td>';
              } else {

                echo '<td><img src="views/img/users/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
              }

              echo '<td>' . $value["profile"] . '</td>';

              if ($value["status"] != 0) {

                echo '<td><button class="btn btn-success btnActivate btn-xs" userId="' . $value["id"] . '" userStatus="0">Activated</button></td>';
              } else {

                echo '<td><button class="btn btn-danger btnActivate btn-xs" userId="' . $value["id"] . '" userStatus="1">Deactivated</button></td>';
              }

              echo '<td>' . $value["lastLogin"] . '</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditUser" idUser="' . $value["id"] . '" data-toggle="modal" data-target="#editUser"><i class="fas fa-edit"></i></button>

                        <button class="btn btn-danger btnDeleteUser" userId="' . $value["id"] . '" username="' . $value["user"] . '" userPhoto="' . $value["photo"] . '"><i class="fas fa-times"></i></button>

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
=            module add user            =
======================================-->

<!-- Modal -->
<div id="addUser" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

        <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc">
          <h5 class="modal-title" style="color:#fff" id="exampleModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--Input name -->
            <div class="form-group">
              <label for="">Name:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                <input class="form-control input-lg" type="text" name="newName" placeholder="Add name" required>

              </div>

            </div>

            <!-- input username -->
            <div class="form-group">
               <label for="">Username:</label>
              <div class="input-group">

                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>

                <input class="form-control input-lg" type="text" id="newUser" name="newUser" placeholder="Add username" required>

              </div>

            </div>

            <!-- input password -->
            <div class="form-group">
                 <label for="">Password:</label>
              <div class="input-group">

                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>

                <input class="form-control input-lg" type="password" name="newPasswd" placeholder="Add password" required>

              </div>

            </div>

            <!-- input profile -->
            <div class="form-group">
                 <label for="">Profile:</label>
              <div class="input-group">

                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-key"></span>
                  </div>
                </div>

                <select class="form-control input-lg" name="newProfile">

                  <option value="">Select profile</option>
                  <option value="administrator">Administrator</option>
                  <option value="special">Special</option>
                  <option value="seller">Seller</option>

                </select>

              </div>

            </div>

            <!-- Uploading image -->
            <div class="form-group">

              <div class="panel">Upload image</div>

              <input class="newPics" type="file" name="newPhoto">

              <p class="help-block">Maximum size 2Mb</p>

              <img class="preview" src="views/img/users/default/anonymous.png" width="100px">

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

        <?php
        $createUser = new ControllerUsers();
        $createUser->ctrCreateUser();
        ?>

      </form>

    </div>

  </div>

</div>
<!--====  End of module add user  ====-->

<!--=====================================
=            module edit user            =
======================================-->

<!-- Modal -->
<div id="editUser" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <form role="form" method="POST" enctype="multipart/form-data">

         <!--=====================================
        HEADER
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc">
          <h5 class="modal-title" style="color:#fff" id="exampleModalLabel">Edit User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!--=====================================
        BODY
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!--Input name -->
            <div class="form-group">

             <label for="">Name:</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>

                <input class="form-control input-lg" type="text" id="EditName" name="EditName" placeholder="Edit name" required>

              </div>

            </div>

            <!-- input username -->
            <div class="form-group">

              <label for="">Username:</label>
              <div class="input-group">

                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>


                <input class="form-control input-lg" type="text" id="EditUser" name="EditUser" placeholder="Edit username" readonly>

              </div>

            </div>

            <!-- input password -->
            <div class="form-group">

                <label for="">Password:</label>
              <div class="input-group">

                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>

                <input class="form-control input-lg" type="password" name="EditPasswd" placeholder="Add new password">

                <input type="hidden" name="currentPasswd" id="currentPasswd">

              </div>

            </div>

            <!-- input profile -->
            <div class="form-group">

        <label for="">Profile:</label>
              <div class="input-group">

                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <span class="fas fa-key"></span>
                  </div>
                </div>


                <select class="form-control input-lg" name="EditProfile">

                  <option value="" id="EditProfile"></option>
                  <option value="administrator">Administrator</option>
                  <option value="special">Special</option>
                  <option value="seller">Seller</option>

                </select>

              </div>

            </div>

            <!-- Uploading image -->
            <div class="form-group">

              <div class="panel">Upload image</div>

              <input class="newPics" type="file" name="editPhoto">

              <p class="help-block">Maximum size 2Mb</p>

              <img class="thumbnail preview" src="views/img/users/default/anonymous.png" alt="" width="100px">

              <input type="hidden" name="currentPicture" id="currentPicture">

            </div>

          </div>

        </div>

        <!--=====================================
        FOOTER
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>

          <button type="submit" class="btn btn-primary">Edit User</button>

        </div>

        <?php
        $editUser = new ControllerUsers();
        $editUser->ctrEditUser();
        ?>

      </form>

    </div>

  </div>

</div>

<?php

$deleteUser = new ControllerUsers();
$deleteUser->ctrDeleteUser();

?>