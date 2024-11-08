<?php

session_start();
$msg = "";
include '../security.php';
include '../conn.php';
include 'user.php';
if($_SESSION['role'] != 'pharmacist'){
    header("Location:../logout.php");
}

   if(isset($_POST['change'])){

   $oldpassword = md5($_POST['oldpassword']);
   $newpassword = $_POST['newpassword'];
   $confpassword = $_POST['confpassword'];

   $qry = "SELECT *FROM users WHERE password = '$oldpassword' AND username = '".$_SESSION['user_name']."'";
   $ext = mysqli_query($conn,$qry);
   $num = mysqli_num_rows($ext);

   if($num > 0){
   if($newpassword == $confpassword){
   if(strlen($newpassword) > 6){
    $enc = md5($newpassword);
   $insert_query = "UPDATE users SET password = '$enc' WHERE password = '$oldpassword' AND username = '".$_SESSION['user_name']."'";
   $ext_insert = mysqli_query($conn,$insert_query);

   if($ext_insert){
   $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <strong><center>Password changed successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
 }else{
 $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong><center>Not Changed</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
}
 }else{
 $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong><center>Password length should be Greater than 6</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
}
 }else{
 $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong><center>The new password do not Match</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
}
 }else{
 $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong><center>Old Password do not Matchs</center></strong>
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
  <title>Pharmacist | WBDSMS For Nech Sar Hospital</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .form-control, .card, .mn{
      border-radius: 0px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <?php /*$qry_select = "SELECT *FROM report WHERE receiver = '".$_SESSION['email']."' AND rn = '1'";
                            $ext_select = mysqli_query($conn,$qry_select);
                            $num = mysqli_num_rows($ext_select);
                             if($num > 0){ */?>
      <?php //} ?>
      <li class="dropdown user user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="../img/user.PNG" class="user-image" alt="User Image"></span></a>
          <ul class="dropdown-menu">
            <li class="user-header bg-info">
              <img src="../img/user.PNG" class="img-circle" alt="User Image">
              <p><span id="user"><?php echo user(); ?></span> - Pharmacist</p>
            </li>
            <li class="user-body">
              <div class="row">
                <div class="pull-left">
                <a href="chpassword.php" class="btn btn-default btn-flat">Change Password</a>
              </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <div class="pull-right"> 
                <a href="../logout.php" class="btn btn-default btn-flat">Logout</a>
              </div>
              </div>
            </li>
          </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link" title="Web Based Drag Store Management System for Nech Sar Primary Hospital">
      &nbsp;<span class="brand-text font-weight-light"> NSPH - Arba Minch</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="profile.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th-list"></i>
              <p>
                Drug
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="drug.php?view-drug" class="nav-link">
                  &nbsp;&nbsp;
                  <i class="nav-icon fa fa-eye"></i>
                  <p>View Drug</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="drug.php?prescribe-drug" class="nav-link">
                  &nbsp;&nbsp;
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Prescribe Drug</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="report.php" class="nav-link">
              <i class="nav-icon fas fa-file-pdf"></i>
              <p>
                Report
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i></a> / <a href="#" style="cursor: unset;">Change Password</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?=$msg;?>
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Change Your Password</h5>
              </div>
                <form role="form" action="chpassword.php" method="POST">
                  <div class="card-body">
                  <div class="form-row">
                    <div class="form-group col-sm-4">
                    <input type="Password" name="oldpassword" placeholder="Enter old Password" class="form-control">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="Password" name="newpassword" placeholder="Enter new Password" class="form-control">
                  </div>
                  <div class="form-group col-sm-4">
                    <input type="Password" name="confpassword" placeholder="Confirm new Password" class="form-control">
                  </div>
                </div>
                  </div>
                  <div class="card-footer">
                  <button type="submit" name="change" class="btn btn-primary">Submit</button>
                </div>
                </form>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="index.php">Arba Minch Nech Sar Primary Hospital</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Developers</b>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
<script>
  $(document).ready(function(){
    $('a').tooltip();
  });
</script>