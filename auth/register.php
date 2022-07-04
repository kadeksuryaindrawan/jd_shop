<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome-all.min.css">

    <title>JDShop - The biggest fashion sale</title>
  </head>
  <body class="bg-success" style="overflow-x: hidden;>
    <div class="wrapper">
      
      <div class="container-fluid">
        <div class="center-register">
          <div class="modal-content content-register">
            <div class="modal-header">
              <a href="../index.php"><h4 class="modal-title m-auto text-success" style="letter-spacing: 1px; font-weight: 600; font-size: 25px;">JD SHOP</h4></a>
             </div>
            <div class="modal-body">
              <form action="../process/register.process.php" method="POST">
                <div class="form-group">
                  <label for="exampleInputName1">Full Name</label>
                  <input type="text" id="exampleInputName1" name="input_fullname" class="form-control" placeholder="Enter Full name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email Address</label>
                  <input type="email" id="exampleInputEmail1" name="input_email" class="form-control" placeholder="Enter Email" required>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" id="exampleInputPassword1" name="input_password" class="form-control" placeholder="Enter Password" required>  
                  </div>
                  <div class="form-group col-lg-6">
                    <label for="exampleInputPassword2">Re-password</label>
                    <input type="password" id="exampleInputPassword2" name="input_repassword" class="form-control" placeholder="Enter Re-password" required>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
              <input type="submit" name="input_register" class="btn btn-success m-auto" value="REGISTER" style="letter-spacing: 1px;">
              </form>
            </div>
            <p class="m-auto register-login">Sudah punya akun? <a href="./login.php"> Login </a></p>
          </div>
        </div>
      </div>
    </div><!-- /WRAPPER -->
        
        

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>