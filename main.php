<!DOCTYPE html>
<html>
<head>
	<title>رواق الصندوق للتواصل </title>
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
	
	#signup{
		background:#664d00;
		color: #ffcc80;
		width: 60%;
		border-radius: 30px;
	}
	#login{
		width: 60%;
		background-color: #77773c;
		border: 1px solid #77773c;
		color: #ffcc80;
		border-radius: 30px;
	}
	#login:hover{
		width: 60%;
		background-color: #fff;
		color: #77773c;
		border: 2px solid #77773c;
		border-radius: 30px;
	}
	.well{
		background-color: #55552b;
	}

</style>
<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="well">
				<center><h1 style="color: white;">رواق الصندوق</h1></center>
			</div>
		</div>
		<div class="row">
		<div class="col-sm-12">
		<marquee  style="background: #77773c;"><center><h1 style="color: #ffff;">بـــلاغ حول التمديد في آجال دفع مساهمات فترات التعاون الفني للمرة الثالثة
		</h1></center></marquee>				
			</div>
		</div>
	</div>
	<div class="row">
	<div class="row">
		<div class="col-sm-6" style="left:0.5%;">
			<img src="images/logo (1).jpg" class="img-rounded" title="Coding cafe" width="650px" height="565px">
			<div id="centered1" class="centered"><h3 style="color:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Follow Your Interests.</strong></h3></div>
			<div id="centered2" class="centered"><h3 style="color:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Hear what People are talking about.</strong></h3></div>
			<div id="centered3" class="centered"><h3 style="color:white;"><span class="glyphicon glyphicon-search"></span>&nbsp&nbsp<strong>Join the Conversation.</strong></h3></div>
		</div>
		<div class="col-sm-6" style="left:8%:">
			<img src="images/dr.jpg" class="img-rounded" title="Coding cafe" width="80px" height="80px">
			<h2><strong>اطرح مشاكل العمل <br> شاركنا باقتراح الحل</strong></h2><br><br>
			<h4><strong>انضم لرواق الصندوق الان .</strong></h4>
			<form method="post" action="">
				<button id="signup" class="btn btn-info btn-lg" name="signup">Sign up</button><br><br>
				<?php
					if(isset($_POST['signup'])){
						echo "<script>window.open('signup.php','_self')</script>";
					}
				?>
				<button id="login" class="btn btn-info btn-lg" name="login">Login</button><br><br>
				<?php
					if(isset($_POST['login'])){
						echo "<script>window.open('signin.php','_self')</script>";
					}
				?>
			</form>
		</div>
	</div>
</body>
</html>