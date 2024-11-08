 <?php
    include'conn.php';
    //include'college.php';
    $msg = "";
    $p = "";
    $pass = "";
    session_start();
    if(isset($_POST['login'])){
      $username = mysqli_real_escape_string($conn,$_POST['username']);
      $password = mysqli_real_escape_string($conn,$_POST['password']);
      
    
      $sql = "SELECT *FROM users WHERE username = '".$username."'";
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
    if($num > 0){ while($row = mysqli_fetch_array($result)){

      $pass = md5($password);
      if($row['password'] == $pass){
      
      $_SESSION['user_name'] = $row['username'];
      $_SESSION['role'] = $row['role'];
	  
	  if($_SESSION['role'] == "admin"){
      header('Location:admin/index.php');
	  }
    if($_SESSION['role'] == "manager"){
      header('Location:manager/index.php');
    }
    if($_SESSION['role'] == "patient"){
      header('Location:patient/index.php');
    }
    if($_SESSION['role'] == "accountant"){
      header('Location:accountant/index.php');
    }
    if($_SESSION['role'] == "pharmacist"){
      header('Location:pharmacist/index.php');
    }

  }else{
     $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Incorrect Username / Password</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
  }
}
}
  else{
         $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Incorrect Username / Password</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
    }
}

   ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LOG IN | ARBA MINCH GENERAL HOSPITAL WBDSIMS</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style type="text/css">
    .login-page{
         background:url(img/pic.jpg);
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center;
       }
  </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php" title="ARBA MINCH NECH SAR PRIMARY HOSPITAL" style="color: orange;"><b> <?php //echo college_short_name(); ?> AMNSPH | WBDSIMS</b></a>
  </div>
  <!-- /.login-logo -->
  <?=$msg;?>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in</p>

      <form action="login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required style="border-radius: 0px;">
          <div class="input-group-append">
            <div class="input-group-text" style="border-radius: 0px;">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required style="border-radius: 0px;">
          <div class="input-group-append">
            <div class="input-group-text" style="border-radius: 0px;">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" name="login" class="btn btn-primary btn-block" style="border-radius: 0px;">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div> 
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</body>
</html>
