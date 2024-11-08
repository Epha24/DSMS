<?php
include'conn.php';
$msg = "";
if(isset($_POST['register'])){

  if(empty($_POST['sex'])){
      $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Please Fill All Feilds !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
        }else{

             $username = mysqli_escape_string($conn,$_POST['username']);
             $password = mysqli_escape_string($conn,$_POST['password']);
             $confpassword = mysqli_escape_string($conn,$_POST['confpassword']);
             $role = "patient";
             $fname = mysqli_escape_string($conn,$_POST['fname']);
             $mname = mysqli_escape_string($conn,$_POST['mname']);
             $lname = mysqli_escape_string($conn,$_POST['lname']);
             $age = mysqli_escape_string($conn,$_POST['age']);
             $sex = mysqli_escape_string($conn,$_POST['sex']);
             $phone = mysqli_escape_string($conn,$_POST['phone']);
             $address = mysqli_escape_string($conn,$_POST['address']);

             if($password != $confpassword){
              $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Password do not match !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
             }else if(strlen($password) < 7){

                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Password length should be greater than 6 !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";

             }else if(strlen($phone) < 10 || strlen($phone) > 10){

                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Incorrect phone number. It should be 10 digit !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";

             }else{

              $enc_password = md5($password);
              //$role = "passenger";
              $status = "Active";
              $chech_qry = "SELECT *FROM users WHERE username = '$username'";
              $ext_chech = mysqli_query($conn,$chech_qry);
              $num = mysqli_num_rows($ext_chech);
              if($num > 0){
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>User Already Exists !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
              $qry_insert = "INSERT INTO users VALUES('$username', '$enc_password','$fname', '$mname','$lname','$age','$sex','$address','$phone','$role','$status')";
              $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Registered successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Not created !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
            }
             }


}
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>HOME | ARBA MINCH NECH SAR PRIMARY HOSPITAL WBDSIMS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/icon" href="pic/logo.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css.style.css">
  <link rel="stylesheet" type="text/css" href="css.style.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- DataTable -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTable -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAegi-gvPpygGwfl_tIaZyn2o2UmFmb7kA&callback=initMap"
  type="text/javascript"></script>
	<style type="text/css">
		.navbar-brand img{
      border-radius: 50%;
    }
    .navbar{
      border-bottom:1px solid #c9c6bb;
    }
  .navbar a{
       font-size: 21px;
      font-family: "Times New Roman", Times, serif;
      font-style:bold;
		}
    .btn-danger{
      padding:5px 10px 5px 10px;
      font-size: 22px;
    }

	</style>
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
  <a class="navbar-brand" href="index.php" title="Web Based Drag Store Information Management System"><span class="header">&nbsp;&nbsp; <i class="fa fa-hospital" style="color: orange;"></i> NSPHDS</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">HOME</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about-us.php">ABOUT US</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact-us.php">CONTACT US</a>
    </li>
  </ul>
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="login.php"><span class="text-secondary"><i class="fa fa-sign-in"></i> Login</span></a>
      </li>
     <li class="nav-item">
        <a class="nav-link" href="register.php"><span class="text-danger"><i class="fa fa-user-plus"></i> Register</span></a>
      </li>
    </ul>
  </div>
</nav>
<br><br>
	<div class="container"> 
     <?=$msg;?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title"><strong>Register</strong></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="register.php" method="POST">
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <div class="form-group col-sm-6">
                    <label>First Name : </label>
                    <input type="text" class="form-control" name="fname" placeholder="Enter first name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Middle Name : </label>
                    <input type="text" class="form-control" name="mname" placeholder="Enter middle name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Last Name : </label>
                    <input type="text" class="form-control" name="lname" placeholder="Enter last name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Gender : </label>
                    <select name="sex" class="form-control">
                      <option selected="selected" disabled="disabled">Select Gender</option>
                      <!--<option value="passenger">Passenger</option>-->
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Age : </label>
                    <input type="number" class="form-control" name="age" placeholder="Enter age" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Address : </label>
                    <input type="text" class="form-control" name="address" placeholder="Enter address" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Phone : </label>
                    <input type="text" class="form-control" name="phone" placeholder="Enter phone number" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Username : </label>
                    <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Password : </label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Confirm Password : </label>
                    <input type="password" class="form-control" name="confpassword" placeholder="Confirm Password" required>
                  </div>
                </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="register" class="btn btn-primary mn">Save</button>
                </div>
              </form>
            </div>
	</div>
  <div class="container">
    <div class="card text-center pt-2 pb-2 "><?php echo date("Y")?> &copy; All rights Reserved</div>
  </div>
  <script src="https://js.stripe.com/v3/"></script>
</body>
</html>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
</body>
</html>

<script type="text/javascript">
$(function () {
    $(".example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
  </script>
  <script>
  $(document).ready(function(){
    $('a').tooltip();
  });
</script>