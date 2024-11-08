<?php

session_start();
include '../security.php';
include'user.php';
include '../conn.php';
$msg = "";

 if($_SESSION['role'] != 'manager'){
     header("Location:../logout.php");
 }

if(isset($_POST['register'])){


             $dname = mysqli_escape_string($conn,$_POST['dname']);
             $edate = mysqli_escape_string($conn,$_POST['edate']);
             $tnum = mysqli_escape_string($conn,$_POST['tnum']);
             $price = mysqli_escape_string($conn,$_POST['price']);
             $mdate = mysqli_escape_string($conn,$_POST['mdate']);
             $dosage = mysqli_escape_string($conn,$_POST['dosage']);
             $bno = mysqli_escape_string($conn,$_POST['bno']);

             if($price <= 0){
              $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Incorrect Price !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
             }else{

              $qry_insert = "INSERT INTO drug(bno, dname, dosage, edate, mdate, tnum, price) VALUES('$bno', '$dname', '$dosage', '$edate','$mdate', '$tnum', '$price')";
              $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Add successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Not added !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
             }

}
        if(isset($_POST['update_detail'])){
             $old_bno = mysqli_escape_string($conn,$_POST['old_bno']);
             $old_dosage = mysqli_escape_string($conn,$_POST['old_dosage']);
             $dname = mysqli_escape_string($conn,$_POST['dname']);
             $edate = mysqli_escape_string($conn,$_POST['edate']);
             $tnum = mysqli_escape_string($conn,$_POST['tnum']);
             $price = mysqli_escape_string($conn,$_POST['price']);
             $mdate = mysqli_escape_string($conn,$_POST['mdate']);
             $dosage = mysqli_escape_string($conn,$_POST['dosage']);
             $bno = mysqli_escape_string($conn,$_POST['bno']);

             if($price <= 0){
              $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Incorrect Price !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
             }else{

              $qry_insert = "UPDATE drug SET bno = '$bno', dname = '$dname', edate = '$edate', tnum = '$tnum', price = '$price', mdate = '$mdate', dosage = '$dosage' WHERE bno = '$old_bno' AND dosage = '$old_dosage'";
              $ext = mysqli_query($conn,$qry_insert);

              if($ext){
                 $msg = "<div class='alert alert-success alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Updated successfully</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }else{
                $msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert' style='border-radius:0px;'>
                  <strong><center>Not updated !!!</center></strong>
                       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                       <span aria-hidden='true'>&times;</span>
                 </button></div>";
              }
             }
  }


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Manager | WBDISMS For Nech Sar Primary Hospital</title>
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
      <?php                 $num = 0;
                            $qry_select = "SELECT *FROM drug";
                            $ext_select = mysqli_query($conn,$qry_select);
                            while($row = mysqli_fetch_array($ext_select)){
                              if(strtotime($row['edate']) <= strtotime(date("Y-m-d"))){
                                $num++;
                              }

                            }
                             if($num > 0){ ?>
                            
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge"><?php echo $num; ?></span>
        
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="background-color: red;">
          <a href="notification.php" class="dropdown-item text-white">
            <i class="fas fa-envelope mr-2 text-white"></i> <?php echo $num; ?> Expired Drugs
          </a>
        </div>
      </li>
      <?php } ?>
      <li class="dropdown user user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="../img/user.PNG" class="user-image" alt="User Image"></span></a>
          <ul class="dropdown-menu">
            <li class="user-header bg-info">
              <img src="../img/user.PNG" class="img-circle" alt="User Image">
              <p><span id="user"><?php echo user(); ?></span> - Manager</p>
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
          <li class="nav-item has-treeview active">
            <a href="#" class="nav-link" id="act">
              <i class="nav-icon fa fa-th-list"></i>
              <p>
                Drug
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="drug.php?add-drug" class="nav-link">
                  &nbsp;&nbsp;
                  <i class="nav-icon fa fa-plus"></i>
                  <p>Add Drug</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="drug.php?update-drug" class="nav-link">
                  &nbsp;&nbsp;
                  <i class="nav-icon fas fa-edit"></i>
                  <p>Update Drug</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="order.php" class="nav-link">
              <i class="nav-icon fa fa-th-list"></i>
              <p>
                Orders
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="report.php" class="nav-link">
              <i class="nav-icon fa fa-th-list"></i>
              <p>
                Reports
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="comment.php" class="nav-link">
              <i class="nav-icon fa fa-comment"></i>
              <p>
                Comments
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
        <?php if(isset($_GET['add-drug'])){;?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.html"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Drug </a> / <a href="#" style="cursor: unset;">Add Drug</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
        <div class="row"> 
        <div class="col-md-3">
            <a href="drug.php?add-drug" class="btn btn-info btn-block mb-3 mn"><i class="fas fa-plus"></i> Add Drug</a>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Drug</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="drug.php?add-drug" class="nav-link">
                      <i class="fas fa-plus"></i> Add Drug
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="drug.php?update-drug" class="nav-link">
                      <i class="far fa-edit"></i> Update Drug
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div> 
        <div class="col-md-9">
          <?=$msg;?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Add Drug</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="drug.php?add-drug" method="POST">
                <div class="card-body">
                 <!--  <?=$msg ?> -->
                 <div class="form-row">
                  <div class="form-group col-sm-6">
                    <label>Batch Number : </label>
                    <input type="text" class="form-control" name="bno" placeholder="Enter batch number" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Drug Name : </label>
                    <input type="text" class="form-control" name="dname" placeholder="Enter drug name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Dosage (Mg) :</label>
                    <input type="text" class="form-control" name="dosage" placeholder="Enter dosage (mg)" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Expire Date :</label>
                    <input type="date" class="form-control" name="edate" title="Expire date" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Manufactured Date :</label>
                    <input type="date" class="form-control" name="mdate" title="Enter manufactured date" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Number of Drugs Available :</label>
                    <input type="text" class="form-control" name="tnum" placeholder="Enter total number" title="Enter total number" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Price of one Drug : </label>
                    <input type="text" class="form-control" name="price" placeholder="Enter price of one drug" required>
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
        </div>
      <?php }
      if(isset($_GET['update-drug'])){;?>
         <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> / </a><a href="#" style="cursor: unset;">Drug / </a> <a href="#" style="cursor: unset;">Update Drug</a></li>
            </ol>
          </div>
        </div>
        </div>
        </div> 
        <?=$msg;?>
        <div class="card"> 
        <div class="card-header">
              <h3 class="card-title">Update Drug</h3>
              <a href="drug.php?add-drug" class="float-sm-right" title="Add Drug"><i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered table-striped example1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Batch No</th>
                  <th>Drug Name</th>
                  <th>Dosage</th>
                  <th>Expire Date</th>
                  <th>Manufactured Date</th>
                  <th>Total Number</th>
                  <th>price</th>
                  <th>Action</th>                  
                </tr>
                </thead>
                <tbody>
                  <?php
                  $num = 1;
                   $qry = "SELECT *FROM drug ORDER BY dname";
                   $ext = mysqli_query($conn,$qry);

                   while($row = mysqli_fetch_array($ext)){
                  ?>
                <tr>
                  <td><?php echo $num; ?></td>
                  <td><?php echo $row['bno'];?></td>
                  <td><?php echo $row['dname'];?></td>
                  <td><?php echo $row['dosage'];?></td>
                  <td><?php echo $row['edate']?></td>
                  <td><?php echo $row['mdate'];?></td>
                  <td><?php echo $row['tnum'];?></td>
                  <td><?php echo $row['price']." <span class='text-danger'>( ".$row['price'] * $row['tnum']." Total Price )</span> ";?></td>
                 <td><a href="drug.php?update-detail=<?php echo $row['bno']; ?>&dosage=<?php echo $row['dosage']; ?>"><i class="fa fa-edit" style="color: blue;" title="Update Drug"></i></a></td>
                </tr><?php $num++;
              }?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Batch No</th>
                  <th>Drug Name</th>
                  <th>Dosage</th>
                  <th>Expire Date</th>
                  <th>Manufactured Date</th>
                  <th>Total Number</th>
                  <th>price</th>
                  <th>Action</th>  
                </tr>
                </tfoot>
              </table>
            </div>
        </div>
      <?php } if(isset($_GET['update-detail'])){

        $_SESSION['id'] = $_GET['update-detail'];
        $id = $_SESSION['id'];
        ?>
      <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i></a> / <a href="#" style="cursor: unset;">Drug </a> / <a href="#" style="cursor: unset;">Update Drug</a></li>
            </ol>
          </div><!-- /.col -->
        </div>
        </div>
        </div> 
          <?=$msg;?>
        <div class="card card-light">
              <div class="card-header">
                <h3 class="card-title">Update Detail</h3>
                <a href="drug.php?update-drug" class="float-sm-right" title="Update Other Drug"><i class="fa fa-edit"></i></a>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="drug.php?update-drug" method="POST">
                <div class="card-body">
                 <!--  <?=$msg ?> -->

              <div class="form-row">
                <?php
                    $qry = "SELECT *FROM drug WHERE bno = '$id' AND dosage = '".$_GET['dosage']."'";
                    $ext = mysqli_query($conn,$qry);
                    while($row = mysqli_fetch_array($ext)){
                  ?>
                  <div class="form-group col-sm-6">
                    <label>Batch Number : </label>
                    <input type="text" class="form-control" name="bno" value="<?php echo $row['bno']; ?>" placeholder="Enter batch number" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Drug Name : </label>
                    <input type="text" class="form-control" name="dname" value="<?php echo $row['dname']; ?>"  placeholder="Enter drug name" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Dosage (Mg) :</label>
                    <input type="text" class="form-control" name="dosage" value="<?php echo $row['dosage']; ?>"  placeholder="Enter dosage (mg)" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Expire Date :</label>
                    <input type="date" class="form-control" name="edate" value="<?php echo $row['edate']; ?>"  title="Expire date" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Manufactured Date :</label>
                    <input type="date" class="form-control" name="mdate" value="<?php echo $row['mdate']; ?>"  title="Enter manufactured date" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Number of Drugs Available :</label>
                    <input type="text" class="form-control" name="tnum" value="<?php echo $row['tnum']; ?>"  placeholder="Enter total number" title="Enter total number" required>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Price of one Drug : </label>
                    <input type="text" class="form-control" name="price" value="<?php echo $row['price']; ?>"  placeholder="Enter price of one drug" required>
                  </div>
                  <input type="hidden" class="form-control" name="old_bno" value="<?php echo $row['bno']; ?>"  placeholder="Enter price of one drug" required>
                  <input type="hidden" class="form-control" name="old_dosage" value="<?php echo $row['dosage']; ?>"  placeholder="Enter price of one drug" required>
                </div>             
                  <?php }?>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="update_detail" class="btn btn-primary mn">Submit</button>
                </div>
              </form>
            </div>
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