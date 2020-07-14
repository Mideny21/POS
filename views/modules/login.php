<div id="back"></div>

<div class="login-page">


<div class="login-box">

  <div class="login-logo">

  <!-- <a href="#"><b>Traik</b>company</a> -->
  <img src="views/dist/img/traik.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

  </div>
</div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

    <form method="post">

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="User" name="loginUser" required>

        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Password" name="loginPass" required>

        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>

      <div class="row">

        <div class="col-md-12">

        <div class="card-footer text-center">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

        </div>

        </div>
       
      </div>

      <?php

        $login = new ControllerUsers();
        $login -> ctrUserLogin();

      ?>

    </form>

  </div>
</div>
</div>

</div>




