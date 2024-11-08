<?php 
include 'conn.php';
session_start();

if(isset($_GET['delete-account'])){
	$id = $_GET['delete-account'];
	mysqli_query($conn, "DELETE FROM user WHERE username = '$id'");
	$msg = '<div class="alert alert-danger"> Your Account has been disabled, please contact admin</div>';
	header('Location:admin/account.php?update_account');

}
if(isset($_GET['delete-employee'])){
	$id = $_GET['delete-employee'];
	mysqli_query($conn, "DELETE FROM employee WHERE emp_id = '$id'");
	$msg = '<div class="alert alert-danger"> Your Account has been disabled, please contact admin</div>';
	header('Location:staff/employee.php?update-employee');

}
if(isset($_GET['order-id'])){
	$id = $_GET['order-id'];
	$ext = mysqli_query($conn, "INSERT INTO orders(username, drug, ordered_date) VALUES('".$_SESSION['user_name']."', '$id', '".date('Y-m-d')."')");
	if($ext){header('Location:patient/drug.php?order-drug&success');}else{header('Location:patient/drug.php?order-drug&failure');}

}
if(isset($_GET['change-status'])){
	
	$active = 'Active';
	$Inactive = 'Inactive';
	$id = $_GET['change-status'];
	$qry = "SELECT *FROM users WHERE username = '$id'";
	$ext = mysqli_query($conn,$qry);
	while($row = mysqli_fetch_array($ext)){

		if($row['status'] == $active){
			$qry_update = "UPDATE users SET status = '$Inactive' WHERE username = '$id'";
			$extup = mysqli_query($conn,$qry_update);
			header('Location:admin/account.php?update_account');
		} if($row['status'] == $Inactive){
			$qry_update = "UPDATE users SET status = '$active' WHERE username = '$id'";
			$extup = mysqli_query($conn,$qry_update);
			header('Location:admin/account.php?update_account');
		}
	}

}
?>