<?php

session_start();
include '../security.php';
include'user.php';
include '../conn.php';
$msg = "";

 if($_SESSION['role'] != 'pharmacist'){
     header("Location:../logout.php");
 }

if(isset($_POST['send'])){


             $username = mysqli_escape_string($conn,$_POST['username']);
             $comment = mysqli_escape_string($conn,$_POST['comment']);


              $qry_insert = "INSERT INTO comment(username, comment) VALUES('$username', '$comment')";
              $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Sent successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Not Sent !!!</center></strong>
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
  <link rel="icon" type="image/icon" href="../logo.jpg">
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
  <!-- DataTable -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
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
    .active{
      border-radius: 0px;
      background-color: #00151A;
      border-left: 2px solid orange;
    }
    #act{
      border-radius: 0px;
      background-color: #00151A;
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
          <li class="nav-item has-treeview active">
            <a href="report.php" class="nav-link" id="act">
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
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Generate Report</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
         <?=$msg;?>
         <?php if(!isset($_GET['report_daily'])){ ?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Generate Report</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="report.php" method="POST">
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <div class="form-group col-sm-12">
                   <a href="report.php?report_daily" class="btn btn-info">Generate Today's Report</a>
                  </div>
                </div>
                </div>
              </form>
            </div> <?php } if(isset($_GET['report_daily'])){ ?>
            <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Available Drug</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <?php $qry_s = mysqli_query($conn, "SELECT *FROM drug");
                  while($row_sl = mysqli_fetch_array($qry_s)){ ?>
                  <div class="form-group col-sm-12">
                   <input type="text" value="=> <?php echo "Drug Name : ".$row_sl['dname']." | Batch : ".$row_sl['bno']." | Dosage : ".$row_sl['dosage']." | Avialable Number : ".$row_sl['tnum'] ?>" class="form-control" readonly>
                  </div> <?php } ?>
                </div>
                </div>
              </form>
            </div>
            <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Ordered Drug</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <?php $qry_s = mysqli_query($conn, "SELECT *FROM orders WHERE ordered_date = '".date("Y-m-d")."'"); ?>
                  <div class="form-group col-sm-12">
                   <input type="text" value="=> Total Ordered Drug : <?php echo mysqli_num_rows($qry_s); ?>" class="form-control" readonly>
                  </div>
                </div>
                </div>
              </form>
            </div>
            <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Sold Drug</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <?php $qry_s = mysqli_query($conn, "SELECT *FROM orders WHERE app_date = '".date("Y-m-d")."' AND status = 'Approved'"); ?>
                  <div class="form-group col-sm-12">
                   <input type="text" value="=> Total sold Drug : <?php echo mysqli_num_rows($qry_s); ?>" class="form-control" readonly>
                  </div>
                </div>
                </div>
              </form>
            </div> <a href="pdf.php?daily" class="btn btn-info" target="_blank"><i class="fa fa-file-pdf"></i> Generate Report</a><br><br>
            <?php } ?>
      
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
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- DataTables -->
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
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

<script>
  function change_role(){
     var xmlhttp = new XMLHttpRequest();
     var dep = document.getElementById("dep").value;
     xmlhttp.open("GET","../select.php?dep="+dep,false);     
     xmlhttp.send(null);
     document.getElementById("email").innerHTML = xmlhttp.responseText;
}
</script>