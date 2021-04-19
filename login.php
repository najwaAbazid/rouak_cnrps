<?php
session_start();

include("includes/connection.php");

	if (isset($_POST['login'])) {

		$email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
		$pass = htmlentities(mysqli_real_escape_string($conn, $_POST['pass']));

		$select_user = "SELECT * from users where email='$email' AND pass='$pass' ";
		$query= mysqli_query($conn, $select_user);
		$check_user = mysqli_num_rows($query);

		if($check_user == 1){
			$_SESSION['email'] = $email;

			echo "<script>window.open('profile.php', '_self')</script>";
		}else{
			echo"<script>alert('البريد الالكتروني او كلمة السر غير صحيحة')</script>";
		}
	}
?>