<?php
include("includes/connection.php") ;

	if(isset($_POST['sign_up'])){

		$f_name = htmlentities(mysqli_real_escape_string($conn,$_POST['f_name']));
		$l_name = htmlentities(mysqli_real_escape_string($conn,$_POST['l_name']));
		$pass = htmlentities(mysqli_real_escape_string($conn,$_POST['pass']));
		$email = htmlentities(mysqli_real_escape_string($conn,$_POST['email']));
		$city = htmlentities(mysqli_real_escape_string($conn,$_POST['city']));
		$dir = htmlentities(mysqli_real_escape_string($conn,$_POST['dir']));
		$birthday = htmlentities(mysqli_real_escape_string($conn,$_POST['birthday']));
		$status = "verified";
		$posts = "no";		

		$username = $f_name . "_" . $l_name ;
		
		$check_username_query = "SELECT user_name from users where email='$email'";
		$run_username = mysqli_query($conn,$check_username_query);

		if(strlen($pass) <9 ){
			echo"<script>alert('Password should be minimum 9 characters!')</script>";
			exit();
		}		
		$rand = rand(1, 3); //Random number between 1 and 3

			if($rand == 1)
				$profile_pic = "images/1.jpg";
			else if($rand == 2)
				$profile_pic = "images/d.jpg";
			else if($rand == 3)
				$profile_pic = "images/p.jpg";

		$insert = "insert into users (f_name,l_name,user_name,
		pass,email,city,dir,birthday,user_image,cover,reg_date,status,posts,
		recovery_account)values('$f_name','$l_name','$username',
		'$pass','$email','$city','$dir','$birthday','$profile_pic','default_cover.jpg',NOW(),'$status','$posts','Iwanttoputading intheuniverse.')";
		
		$query = mysqli_query($conn, $insert);

		if($query){
			echo "<script>alert('Well Done $f_name, you are good to go.')</script>";
			echo "<script>window.open('signin.php', '_self')</script>";

		}
		$check_email = "select * from users where email='$email'";
		$run_email = mysqli_query($conn,$check_email);
		

		$check = mysqli_num_rows($run_email);

		if($check == 1){
			echo "<script>alert('Email already exist, Please try using another email')</script>";
			echo "<script>window.open('signup.php', '_self')</script>";
			exit();
		}

		 else{
			echo "<script>alert('Registration failed, please try again!')</script>";
			echo "<script>window.open('signin.php', '_self')</script>";
		} 
	}
?>