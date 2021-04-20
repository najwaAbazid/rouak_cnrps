<?php
include("includes/connection.php");
include("functions/functions.php");
?>

<nav class="navbar" >
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
			data-target="#bs-example-navbar-collapse-1" data-toggle="collapse"
			aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="home.php">رواق الصندوق</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav" >		  
		
		<?php 
		$user = $_SESSION['email'];
		$get_user = "select * from users where email='$user'"; 
		$run_user = mysqli_query($conn,$get_user);
		$row=mysqli_fetch_array($run_user);
				
		$user_id = $row['user_id']; 
		$user_name = $row['user_name'];
		$first_name = $row['f_name'];
		$last_name = $row['l_name'];				
		$user_pass = $row['pass'];
		$user_email = $row['email'];
		$city = $row['city'];
		$dir = $row['dir'];
		$birthday = $row['birthday'];
		$image =$row['user_image']	;		
		$cover = $row['cover'];
		$recovery_account = $row['recovery_account'];
		$register_date = $row['reg_date'];
				
			
	$user_posts = "select * from posts where user_id='$user_id'"; 
	$run_posts = mysqli_query($conn,$user_posts); 
	$posts = mysqli_num_rows($run_posts);
	?>

	<li><a href='profile.php?<?php echo "u_id=$user_id" ?>'>
	<?php echo "$first_name"; ?></a></li>
	<li><a href="home.php">Home</a></li>
	<li><a href="members.php">ابحث عن اصدقاء</a></li>
	<li><a href="messages.php?u_id=new">المراسلة </a></li>
			<?php
				echo"

				<li class='dropdown'>
					<a href='#' class='dropdown-toggle' data-toggle='dropdown'
					role='button' aria-haspopup='true' aria-expanded='false'>
					<span><i class='glyphicon glyphicon-chevron-down'>
					</i></span></a>
					<ul class='dropdown-menu'>
						<li>
							<a href='my_post.php?u_id=$user_id'>My Posts <span class='badge badge-secondary'>$posts</span></a>
						</li>
						<li>
							<a href='edit_profile.php?u_id=$user_id'>Edit Account</a>
						</li>
						<li role='separator' class='divider'></li>
						<li>
							<a href='logout.php'>Logout</a>
						</li>
					</ul>
				</li>
				";
			?>
	</ul>
	<ul class="nav navbar-nav navbar-right">
		<li class="dropdown">
			<form class="navbar-form navbar-left" method="get" action="results.php">
				<div class="form-group">
					<input type="text" class="form-control" name="user_query" placeholder="Search">
				</div>
				<button type="submit" class="btn btn-info" name="search">Search</button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>
<div class="row">
	<div class="col-sm-12">
	<marquee style="background:#77773c;" ><h3>
	الصندوق الوطني للتقاعد و الحيطة الاجتماعية</h3></marquee>
	</div>	
	</div>