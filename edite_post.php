<!DOCTYPE html>
<?php 
include("../includes/connection.php");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل منشور</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">

<?php

global $conn;
if(isset($_GET['post_id'])){

    $get_id = $_GET['post_id'];

    $get_post = "SELECT * from posts where post_id='$get_id'";
    $run_post = mysqli_query($conn,$get_post);
    $row = mysqli_fetch_array($run_post);

    $post_con =$row['post_content'];
    }
?>
<form action="" method="post" id="f">
<center><h2>عدل المنشور</h2></center><br>
<textarea class="form-control" col="83" name="content" rows="4"><?php echo"$post_con"?></textarea>
 <input type="submit" name="update" value="update post" class="btn btn-info"/>
</form>
<?php
if(isset($_post['update'])){
    $content = $_post['content'];
    $update_post = "UPDATE posts set post_content='$content' where post_id='$get_id'";
    $run_update = mysqli_query($conn,$update_post);
    if($run_update){
        echo "<script>alert('تم تعديل منشورك')</script>";
        echo "<script>window.open('../home.php','_self')</script>";
    }else{
        echo "<script>alert('لم يتم التعديل')</script>";
        echo "<script>window.open('../home.php','_self')</script>";
    }

}
?>
</div>
<div class="col-sm-3"></div>
</div>
    
</body>
</html>