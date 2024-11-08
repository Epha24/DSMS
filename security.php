<?php

if(!isset($_SESSION['user_name']) && !isset($_SESSION['role'])){
	header("Location:login.php");
}

?>