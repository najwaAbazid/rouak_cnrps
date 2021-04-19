<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	body{
		overflow-x: hidden;
		background-color:#ffd480 ;
	}
	.main-content{
		width: 50%;
		height: 40%;
		margin: 10px auto;
		background-color: #adad85;
		border: 2px solid #424141;
		padding: 40px 50px;
	}
	.header{
		border: 0px solid #000;
		margin-bottom: 5px;
	}
	.well{
		background-color: #77773c;
	}
	#signup{
		width: 60%;
		border-radius: 30px;
	}

</style>
<body>
<div class="row">
	<div class="col-sm-12">
		<div class="well">
			<center><h1 style="color: white;">رواق الصندوق</h1></center>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<div class="main-content">
			<div class="header">
				<h3 style="text-align: center;"><strong>انضم الى الرواق</strong></h3>
				<hr>
			</div>
			<div class="l-part">
				<form action="" method="post">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control" placeholder="First Name" name="f_name" required="required">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon">						
						<i class="glyphicon glyphicon-pencil"></i></span>
						<input type="text" class="form-control"
						placeholder="last name" name="l_name" required="required">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon">
						<i class="glyphicon glyphicon-lock"></i></span>
						<input id="password" type="password" class="form-control"
						placeholder="Password" name="pass" required="required">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="email" type="email" class="form-control" placeholder="Email" name="email" required="required">
					</div><br>				
					
<!--country -->
<div class="input-group">
	<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
	<select class="form-control" name="city" required="required">
		<option disabled>اختر مدينة</option>
							<option>تونس</option>
							<option>صفاقس</option>
							<option>مدنين</option>
							<option>سوسة</option>
							<option>نابل</option>
							<option>سيدي بوزيد</option>
							<option>القصرين</option>
							<option>الكاف</option>
							<option>جندوبة</option>
							<option>القيروان</option>
							<option>زغوان</option>
							<option>بنزرت</option>
							<option>قفصة </option>
							<option>قابس</option>
							<option>باجة</option>
							<option>المنستير</option>
							<option>المهدية</option>
							<option>تطاوين</option>
							<option>زغوان</option>
							<option>سليانة</option>
							<option>بن عروس</option>
							<option>اريانة</option>
							<option>النفيضة</option>
							<option>مكنين</option>
						</select>
					</div><br>
					<!-- الادارة -->
<div class="input-group">
	<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
	<select class="form-control input-md" name="dir" required="required">
		<option disabled>Select your dir</option>
							<option>affile</option>
							<option>puntion</option>
							<option>Others</option>
						</select>
					</div><br>
					
	 
		<!-- href if he has account -->
		<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
						<input type="date" class="form-control input-md" placeholder="birthday" name="birthday" required="required">
					</div><br>
					<a style="text-decoration: none;float: right;color: #77773c;" 
					data-toggle="tooltip" title="Signin" href="signin.php">Already have an account?</a><br><br>

					<center><button id="signup" class="btn btn-info btn-lg" 
					name="sign_up">Signup</button></center>
					<?php include("insert_user.php"); ?>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
</html>