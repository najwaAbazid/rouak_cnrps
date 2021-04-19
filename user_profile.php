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
	<title>Find  people</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
	<link rel="stylesheet" type="text/css" href="style/cd.css">
</head>
<style>
#own_post{
    border:5px solid #77773c;
     padding:40px 50px;
     width:90%;
        }
        
</style>
<body>
<div class="row">
<?php
if(isset($_GET['u_id'])){
    $u_id =$_GET['u_id'];
}
if($u_id< 0 || $u_id=""){
    echo "<script>window.open('home.php','_self')</script>";
}else{
   

?>
<div class="col-sm-12">
<?php
if(isset($_GET['u_id'])){
    global $conn;
    $user_id = $_GET['u_id'];
    $select = "SELECT * from users where user_id='$user_id'";
    $run = mysqli_query($conn,$select);
    $row = mysqli_fetch_array($run);

    $name = $row['user_name'];
}
?>
<?php 
if(isset($_GET['u_id'])){
    global $conn ;

    $user_id = $_GET['u_id'];
    $select = " SELECT * from users where user_id='$user_id'";
    $run = mysqli_query($conn,$select);
    $row = mysqli_fetch_array($run);

    $id = $row['user_id'];
    $image = $row['user_image'];
    $f_name = $row['f_name'];    
    $l_name = $row['l_name'];
    $name = $row['user_name'];
    $city = $row['city'];   
    $dir = $row['dir'];
    $reg_date = $row['reg_date']; 
    echo "<div class='row'>   
    <div class='col-sm-1'>
    </div>
    <center>
    <div style='background:#77773c' class='col-sm-3'>
    <h2>معلومات عن </h2>
    <img class='img-circle' src= 'users/$image' width='150' height='150'><br><br>
    <ul class='list-group'>
    <li='list-group-item' title='Username'><strong>$f_name $l_name</strong></li>
        <li='list-group-item' title='dirction'><strong>$dir</strong></li>
    <li='list-group-item' title='User city'><strong>$city</strong></li>  
    <li='list-group-item' title='Regetration date'><strong>$reg_date</strong></li>
    </ul>
   ";
    $user = $_SESSION['email'];
    $get_user = "SELECT * from users where email='$user'";
    $run_user =mysqli_query($conn,$get_user);
    $row = mysqli_fetch_array($run_user);
    $userown_id =$row['user_id'];

    if($user_id == $userown_id){
        echo "<a href='edit_profile.php?u_id=$userown_id' 
        class='btn btn-success'>Edit profile'</a><br><br>";
    }
    echo "</div></center>";

}

?>
<div class="col-sm-8">
<center><h1><strong><?php echo"$f_name $l_name "?></strong>posts</h1></center>
<?php
global $conn;

if(isset($_GET['u_id'])){
    $u_id= $_GET['u_id'];
    }
    $get_posts = "SELECT  * from posts where user_id='$u_id' ORDER by 1 DESC limit 5";
    $run_posts = mysqli_query($conn , $get_posts);
    while($row_posts =mysqli_fetch_array($run_posts)) {
        $post_id = $row_posts['post_id'];
        $user_id = $row_posts['user_id'];
        $content = $row_posts['post_content']; 
        $upload_image = $row_posts['upload_image'];
        $post_date = $row_posts['post_date'];

        $user ="SELECT * from users where user_id='$user_id' AND posts='yes'";

        $run_user = mysqli_query($conn,$user);
        $row_user = mysqli_fetch_array($run_user);

        $user_name=$row_user['user_name'];
        $f_name=$row_user['f_name'];
        $l_name=$row_user['l_name'];
        $image=$row_user['user_image'];
        if($content=="No" && strlen($upload_image) >= 1){ 
echo "<div id'own_post'>
    <div class='row'>
        <div class='col-sm-2'>
        <p><img src='users/n.jpg.65' class='img-circle' width='100px' height='100px'></p>
        </div>
        <div class='col-sm-6'>
            <h3><a style='text-decoration:none; cursor:pointer;color #424141;'
            href='user_profile.php?u_id='$user_id'>$user_name</a></h3>
            <h4><small style='color:black;'>تعديل المنشور <strong>$post_date</strong>
            </small></h4>
        </div>
        <div class='col-sm-4'>
        </div>
    </div>
    <div class='row'>
    <div class='col-sm-12'>
    <img  id='post-img'src='imagepost/$upload_image' style='height:350px;'
    </div>
    </div><br>
    <a href='functions/single.php?post_id='$post_id'style='float:right;'>
    <button class='btn btn-info'>view</button></a>
    <a href='functions/delete.php?post_id='$post_id'style='float:right;'>
    <button class='btn btn-danger'>Delete</button></a>

    </div>

";
        }
        elseif(strlen($content) >= 1 && strlen($upload_image) >= 1 ){
            echo "
            <div id='own_posts'>
            <div class='row'>
            <div class='col-sm-2'><p><img src='users/image'
            class='img-circle' width='100px' height='100px'></p>
                </div>
                <div class='col-sm-6'><h3><a style='text-decoration:none;
                cursor:pointer;color #424141;' href='user_profile.php?u_id=$user_id'>
                $user_name</a></h3>
                <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4></div>
                </div>
            <div class='col-sm-4'>
            </div>
            </div>
            <div class='row'>
            <div class='col-sm-12'>
            <h3>$content</h3>
            <img id='post_img' src='imagepost/$upload_image' style='hight:350; width:350;'>
            </div>
            </div><br>
            <a href='single.php?post_id=$post_id' style='float:right;'>
            <button class='btn-btn-success'>View<button></a><br>
            <a href='functions/delete_post.php?post_id=$post_id' style='float:right;'>
            <button class='btn-btn-danger'>Delete<button></a>
            </div>
            ";
        } 
        else{
            echo "	<div id='own_posts'>
            <div class='row'>
            <div class='col-sm-2'><p><img src='users/image'
        class='img-circle' width='100px' height='100px'></p>
            </div>
            <div class='col-sm-6'><h3><a style='text-decoration:none;
            cursor:pointer;color #424141;' href='user_profile.php?u_id=$user_id'>
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

    } 
?>
</div>
</div>
</div>
<?php  } ?>
</body>
</html>