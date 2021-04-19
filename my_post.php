<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");


if(!isset($_SESSION['email'])){
	header("location: index.php");
}
?>
<html>
<head>
	<?php
        
		$user = $_SESSION['email'];	
		if(isset($_POST['email'])){	
		$get_user = "SELECT * from users  where email='$user'";
		$r = mysqli_query($conn,$get_user);
	       $row = mysqli_fetch_row($r);
		$email = $row['email'];
		}
	?>
	<title>منشوراتي</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
	<link rel="stylesheet" type="text/css" href="style/cd.css">
</head>
<body>
<div class="row">
<div class="col-sm-12">
<center><h2>منشوراتك الاخيرة</h2></center>
<?php 
        user_posts();
?>
</div>
	
</div>
</body>
</html>