<?php
if (!isset($_SESSION)){
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="../../contents/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../contents/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../contents/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../contents/css/style.css" <!-- End layout styles -->

  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto" style="background-color: #7c151f">
              <div class="auth-form-light text-left p-5" style="background-color: rgba(2,10,8,0.94)">
                  <?php
                  if(isset($_SESSION["errorMessageForLogin"])){

                      echo $_SESSION["errorMessageForLogin"];
                      unset($_SESSION["errorMessageForLogin"]);
                  }
                  if(isset($_SESSION["success"])){

                      echo $_SESSION["success"];
                      unset($_SESSION["success"]);
                  }
                  ?>
                <div class="brand-logo">
                  <img src="../../contents/img/baby-care-icon-15.jpg">
                </div>
                <form class="pt-3" ACTION="../process/data_process.php" method="post">

                     <div class="form-group">
                    <input type="email"name="email" autocomplete="off" class="form-control form-control-lg text-light" id="exampleInputEmail1" placeholder="Email">
                  </div>

                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-lg text-light" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button class="btn btn-block btn-success btn-rounded btn-lg font-weight-medium auth-form-btn" name="login">SIGN</button>
                    <a href="../payment/payment.php" class="w-50 btn btn-block btn-primary btn-outline-success btn-rounded btn-lg auth-form-btn" name="login">DONATION</a>
                  </div>
                </form>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                      <div class="row">
                          <div class="">
                              <a href="forgot-password.php" class="auth-link text-black" style="color: white">Forgot password?</a>
                          </div>


                  </div>

                  <div class="text-center mt-4 font-weight-light" style="color: white"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="../../contents/js/vendor.bundle.base.js"></script>
    <script src="../../contents/js/off-canvas.js"></script>
    <script src="../../contents/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>