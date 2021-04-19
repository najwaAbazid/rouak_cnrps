<!DOCTYPE html>
<html>
<head>	
	<title>forget password</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<style>
body{
	overflow-x: hidden;
}
.main-content{
	width: 50%;
	height: 40%;
	margin: 10px auto ;
	background-color:#ddddbb;
	border: 2px solid #77773c;
}
#signup{ width:60%}
</style>
<body>
<div class="row">
<div class="col-sm-12">
<div class="well">
<center><h1 style="background:#77773c;color:white;">رواق الصندوق</h1></center></div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="main-content">
<div class="header">
<h3 style="text-align:center;">نسيت كلمة السر؟</h3>
</div>
<div class=l_pass>
<form action="" method="POST">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input id="email" type="email" name="email" class="form-control" placeholder="ادخل بريدك الالكتروني"
 required>
</div><br><hr>
<pre class="text">ادخل اسم صديقك المفضل في المرحلةالاعدادية</pre>
<div class="input-group"><span class="input-group-addon">
<i class="glyphicon glyphicon-pencil"></i></span>
<input id="msg" type="text" class="form-control" placeholder="صديقي هو"
 name="recovery_account" required><br>
 <a href="signin.php" data-toggle="tooltip">رجوع الى صفحة الدخول</a><br>
 <center><button id="signup" class="btb btn-info btn-lg" name="submit">submit</button></center>
</div>
</form></div>
</div>
</div>
</div>
</body>
</html>
<?php
session_start();

include("includes/connection.php");

	if (isset($_POST['submit'])) {

		$email = htmlentities(mysqli_real_escape_string($conn, $_POST['email']));
		$recovery_account = htmlentities(mysqli_real_escape_string($conn,$_POST['recovery_account']));
		$select_user = "SELECT * from users where email='$email' AND recovery_account='$recovery_account' ";
		$query= mysqli_query($conn, $select_user);
		$check_user = mysqli_num_rows($query);

		if($check_user == 1){
			$_SESSION['email'] = $email;

			echo "<script>window.open('chang_password.php', '_self')</script>";
		}else{
			echo"<script>alert('البريد الالكتروني او كلمة السر غير صحيحة')</script>";
		}
	}
?>