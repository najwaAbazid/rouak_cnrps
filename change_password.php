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
<h3 style="text-align:center;">بدل كلمة السر</h3>
</div>
<div class=l_pass>
<form action="" method="POST">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
<input id="password" type="password" name="pass" class="form-control" placeholder="ادخل كلمة السر"
 required>
</div><br>

<div class="input-group"><span class="input-group-addon">
<i class="glyphicon glyphicon-lock"></i></span>
<input id="password" type="password" class="form-control" placeholder="اعد كتابة كلمة السر"
 name="pass1" required><br> 
 <center><button id="change" class="btb btn-info btn-lg" name="submit">change</button></center>
</div>
</form></div>
</div>
</div>
</div>
</body>
</html>
<?php 
if(isset($_POST['change'])){
    $pass = htmlentities(mysqli_real_escape_string($conn,$_POST['pass']));
    $pass1 = htmlentities(mysqli_real_escape_string($conn,$_POST['pass1']));
    if($pass=$pass1){
       if(strlen($pass)>=6 && strlen($pass)<=60){
           $update ="UPDATE users set pass='$pass' where user_id='$user_id'";
           $run = mysqli_query($conn,$update);
           echo "<script>alert('لقد تم تبديل كلمة السر')</script>";
           echo "<script>window.open('home.php','_self')</script>";
       } else{ echo "<script>alert('يجب ان تكون كلمة السر اكبر من 6كلمات')</script>";}
    }
}
?>
