<!DOCTYPE html>
<html>
<head>
  <title>About Us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/icon" href="pic/logo.jpg">
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
  <!-- DataTable -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
     margin-top: 5%;
     margin-left: 7%;
     color:white;
		}
    .text2{
     font-family: "Times New Roman", Times, serif;;
     font-weight: 70;
     margin-top: 5%;
     margin-left: 7%;
     color:white;
     font-size: 25px;
    }
    .text3{
      font-size: 25px;
      font-family: "Times New Roman", Times, serif;;
     font-weight: 70;
    }
    .btn-danger{
      padding:5px 10px 5px 10px;
      font-size: 22px;
    }
		.container-fluid{
         padding-bottom: 30px;
         padding-top: 20px;
         background:url(pic/page-banner-1.jpg);
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center;
         height: 300px;
       }
       .card{
        border-radius: 0px;
       }
       .about-singel-items span{
        font-size: 55px;
        font-style: bold;
        color: gray;
       }
	</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light sticky-top bg-light">
  <a class="navbar-brand" href="index.php" title="Online Medical Appointment Booking System"><span class="header">&nbsp;&nbsp;OMABS</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about-us.php">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contact-us.php">Contact Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-danger" href="help.php">Help</a>
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
<script>
  $(document).ready(function(){
    $('a').tooltip();
  });
</script>