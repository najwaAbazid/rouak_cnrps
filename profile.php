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
		$get_user = "select * from users where email='$user'";
		$run_user = mysqli_query($conn,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
	?>
	
	<title><?php echo "$user_name"; ?></title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
	#cover-img{
		height: 400px;
		width: 100%;
	}#profile-img{
		position: absolute;
		top: 160px;
		left: 20px;
	}
	#update_profile{
		position: relative;
		top: -20px;
		cursor: pointer;
		left: 93px;
		border-radius: 4px;
		background-color:#fd7e14;
		transform: translate(-50%, -50%);
	}
	#button_profile{
		position: absolute;
		top: 82%;
		left: 50%;
		cursor: pointer;
		transform: translate(-50%, -50%);
	}
	#own_posts{
		border:2px solid #424141;
		padding: 40px 50px  ;
		float:right;
		width: 60%;
			}
			#post_img{
				height:300px;
				width:60%;
				float:right;
			}
</style>
<body>

<div class="row">
	<div class="col-sm-2" ></div>
	<div class="col-sm-8">
		<?php	echo"<div>
				<div><img id='cover-img' class='img-rounded' src='cover/$cover'
			alt='cover'></div>
				<form action='profile.php?u_id=$user_id' method='post'
				enctype='multipart/form-data'>
				<ul class='nav pull-left' style='position:absolute;top:10px;left: 40px;'>
					<li class='dropdown'>
						<button class='dropdown-toggle btn btn-default' data-toggle='dropdown'>
						غير  الصورة الخلفية</button>
						<div class='dropdown-menu'>
							<center><p>اضغط على <strong>اختر خلفية</strong> 
							ثم اضغط  <br> <strong>تثبيت</strong></p>
							<label class='btn btn-info'> اختر صورة
							<input type='file' name='u_cover' size='30' />
							</label><br><br>
							<button name='submit' class='btn btn-info'>تثبيت الخلفية</button>
							</center>
						</div>
					</li>
				</ul>

				</form>
			</div>
			<div id='profile-img'>
				<img src='users/$image' alt='Profile' class='img-circle' width='180px' 
				height='185px'>
				<form action='profile.php?u_id='$user_id' method='post'
				enctype='multipart/form-data'>
				<label id='update_profile'> اختر صورة شخصية
				<input type='file' name='u_image' size='60' />
				</label><br><br>
				<button id='button_profile' name='update' class='btn btn-info'>تثبيت صورتك</button>
				</form>
			</div><br>
			";
		?>
		<?php
	if(isset($_POST['submit'])){
		$u_cover = $_FILES ['u_cover']['name'];
		$image_tmp = $_FILES['u_cover']['tmp_name'];
		$random_number = rand(1,100);

		if($u_cover==''){
			echo "<script>alert('رجاء اختر صورة للخلفية')</script>";
			echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
			
		}else{
			move_uploaded_file($image_tmp ,"cover/$u_cover.$random_number");
			$update = "UPDATE users set cover='$u_cover.$random_number'
			where user_id='$user_id'";

			$run = mysqli_query($conn, $update);

			if($run){
			echo "<script>alert('تم تحديث صورة الخلفية')</script>";
			echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
			}
			exit();
		}
			}
	?>
	</div>
	<?php
		if(isset($_POST['update'])){

				$u_image = $_FILES['u_image']['name'];
				$image_tmp = $_FILES['u_image']['tmp_name'];
				$random_number = rand(1,100);

				if($u_image==''){
					echo "<script>alert('اختر صورة للبروفايل')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
				
				}else{
					move_uploaded_file($image_tmp, "users/$u_image.$random_number");
					$update = "UPDATE users set user_image='$u_image.$random_number' where user_id='$user_id'";

					$run = mysqli_query($conn, $update);

					if($run){
					echo "<script>alert('تم تحديث صورتك')</script>";
					echo "<script>window.open('profile.php?u_id=$user_id' , '_self')</script>";
					}
				}
				exit();
			}
	?>
	<div class="col-sm-2">
	</div>
</div>
<div class="row">
<div class="col-sm-2">
	</div>
	<div class="col-sm-2" style="background-color: #77773c;text-align:center;left: 0.7%;border-radius: 5px;">
		<?php
		echo"
			<center><h2><strong>بعض المعلومات عن</strong></h2></center>
			<center><h4><strong>$first_name $last_name</strong></h4></center>
			<p><strong><i style='color:grey;'>انا باصرار وعناد افعل ما لا تفعله الرجال</i></strong></p><br>
			<p><strong>حالة العلاقات: </strong> كن من المقربين</p><br>
			<p><strong>اعيش في : </strong> $city</p><br>
			<p><strong>منضم للرواق منذ: </strong> $register_date</p><br>
			<p><strong>الادارة العامة التي اعمل بها: </strong> $dir</p><br>
			<p><strong>ولدت بتاريخ : </strong> $birthday</p><br>
			
		";

		?>
	</div>
	
	<div class="col-sm-6">
		<?php
		global $conn ;
		if(isset($_GET['u_id'])){
		$u_id = $_GET['u_id'];
		}
		$get_posts = "SELECT * from posts where user_id='$user_id' ORDER by 1 DESC LIMIT 5 ";
		$run_posts =mysqli_query($conn,$get_posts);
	while($row_posts =mysqli_fetch_array($run_posts)){
			$post_id =$row_posts['post_id'];
			$content =$row_posts['post_content'];
			$upload_image =$row_posts['upload_image'];
			$post_date =$row_posts['post_date'];

	$user ="SELECT * from users where user_id ='$user_id' AND posts='yes'";

	$run_user =mysqli_query($conn,$user);
			$row_user = mysqli_fetch_array($run_user);

			$user_name =$row_user['user_name'];					
			$image=$row_user['user_image'];
			
			if($content== "No" && strlen($upload_image) >= 1 ){
				echo "
				<div id='own_posts'>
				<div class='row'>
				<div class='col-sm-2'><p>
				<img src='users/$image'class='img-circle' width='100px'
				height='100px'></p>
				</div>
				<div class='col-sm-6'><h3>
				<a style='text-decoration:none;
				cursor:pointer;color #424141;' href='user_profile.php?u_id=$user_id'>
				$user_name</a></h3>
				<h4><small style='color:black;'>تحديث المنشور <strong>$post_date</strong></small></h4></div>
				</div>
				<div class='col-sm-4'>
				</div>
				</div>			
				<div class='row'>
				<div class='col-sm-12>			
				<img id='post_img' src='imagepost/$upload_image' 
				style='hight:300px;'>
				</div>
				</div><br>
				</div>
				
				";
			}
			elseif(strlen($content) >= 1 && strlen($upload_image) >= 1 ){
				echo "
				<div id='own_posts'>
				<div class='row'>
				<div class='col-sm-2'><p><img src='users/$image'
			class='img-circle' width='100px' height='100px'></p>
				</div>
				<div class='col-sm-6'><h3>
				<a style='text-decoration:none;
				cursor:pointer;color #424141;' href='user_profile.php?u_id=$user_id'>
				$user_name</a></h3>
				<h4><small style='color:black;'>تحديث المنشور <strong>$post_date</strong></small></h4></div>
				</div>				
				</div>
				<div class='row'>
				<div class='col-sm-12'>
				<h3>$content</h3>
				<img id='post_img' src='imagepost/$upload_image' style='hight:350; width:350;'>
				</div>
				</div><br>
				
				";
			}
			else{
				echo "	<div id='own_posts'>
				<div class='row'>
				<div class='col-sm-2'><p><img src='users/$image'
			class='img-circle' width='100px' height='100px'></p>
				</div>
				<div class='col-sm-6'>
				<h3><a style='text-decoration:none;
				cursor:pointer;color #424141;' 
				href='user_profile.php?u_id=$user_id'>
				$user_name</a></h3>
				<h4><small style='color:black;'>تحديث المنشور <strong>$post_date</strong></small></h4></div>
				</div>				
				</div>
				<div class='row'>
				<div class='col-sm-2'>
				</div>
				<div class='col-sm-6'>
				<h3>$content</h3>				
				</div>
				<div class='col-sm-4'>
				</div>
				</div><br>
				
				";
			}

				global $conn ;
		if(isset($_GET['u_id'])){
		$u_id = $_GET['u_id'];
						
				$get_posts = "SELECT email from users where  user_id='$u_id'";
				$run_user = mysqli_query($conn, $get_posts);
				$row = mysqli_fetch_array($run_user);
				$user_email = $row['email'];
			}
				$user =$_SESSION['email'];
				$get_user = "SELECT * from users where email='$user_email'";
				$run_user = mysqli_query($conn,$get_user);
				$row = mysqli_fetch_array($run_user);

				$user_id =$row['user_id'];
				$u_email = $row['email'];
				if($u_email != $user_email){
					echo "<script>window.open('profile.php?u_id=$user_id','_self')</script>";
				}else{echo "<a href='single.php?post_id=$post_id' style='float:right;'>
					<button class='btn btn-success'>اظهر المنشور<button></a><br>
					<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'>
					<button class='btn btn-danger'>احذف<button></a>
					<a href='functions/edite_post.php?post_id=$post_id' style='float:right;'>
					<button class='btn btn-info'>عدل<button></a>
					</div><br><br>
					";}
		
			include("functions/delete_post.php");

		}
		?>

	</div>
	<div class="col-sm-2">
	</div>

</div>
</body>
</html>