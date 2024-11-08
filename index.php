<?php
include'conn.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title>HOME | NECH SARPRIMARY HOSPITAL</title>
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
		.text1{
		 font-family: fantasy;
		 font-size: 30px;
     margin-top: 19%;
     marg/in-left: 30%;
     color:orange;
     text-align: center;
		}
    .text2{
     font-family: "Times New Roman", Times, serif;;
     font-weight: 70;
     margin-top: 5%;
     margin-left: 47%;
     color:white;
    }
    .btn-danger{
      padding:5px 10px 5px 10px;
      font-size: 22px;
    }
		.container-fluid{
         padding-bottom: 30px;
         padding-top: 20px;
         background:url(img/d4.jpg);
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center;
         height: 561px;
       }
       .card, .card-header, .card-body{
        border-radius: 0px;
       }
       #ma/p{
        width: 400px;
        height: 200px;
       }
	</style>
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
  <a class="navbar-brand" href="index.php" title="Nech Sar Primary Hospital Drug Store Management System"><span class="header">&nbsp;&nbsp; <i class="fa fa-hospital" style="color: orange;"></i> NSPHDS</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link text-danger" href="index.php">HOME</a>
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
        <a class="nav-link" href="register.php"><span class="text-secondary"><i class="fa fa-user-plus"></i> Register</span></a>
      </li>
    </ul>
  </div>
</nav>
	<div class="container-fluid"> 
		
      <div class="text1">Welcome To Arba Minch Nech Sar Primary Hospital Drag Store Management System</div>
      <div><span class="text2"><a href="contact-us.php" class="btn btn-danger">Contact Us</a></span></div>
	</div>
  <div class="container">
      <!--<div class="row">
      <div class="alert alert-success alert-dismissible fade show col-sm-7 ml-2 mr-3" role="alert">
             <strong>Hello Welcome!</strong> You can search using departure and destination city and reserve.
    </div>
  </div>-->
  <div>
  <br><br><br>
  <section class="about-us">
    <h1 style="font-size: 45px; font-style: bold; font-weight: 900;"><center>About Us</center></h1>
    <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h3>Welcome to Arba Minch GHDSIMS </h3>
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p align="justify">This website assists arba minch general hospital drug store manager, pharmacist, accountant, patient and administrator by allowing almost all process through online. Arba Minch General Hospital is found in Arba Minch city which is located in Gamo Gofa Zone. It is a big hospital and provides a wide variety of servicesincluding a gigantic pharmacy.Through this web site pateints who have registered can check available drags, order drug online. This website assists arba minch general hospital drug store manager, pharmacist, accountant, patient and administrator by allowing almost all process through online. Arba Minch General Hospital is found in Arba Minch city which is located in Gamo Gofa Zone. </p>
                    </div>
                </div> <!-- about cont -->
                <div class="col-lg-7">
                    <div class="about-image mt-50">
                        <img src="img/ns2.jpg" alt="About" style="height: 300px; width:100%">
                    </div>  <!-- about imag -->
                </div> 
            </div> <!-- row -->
  </section>
  <br><br>
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