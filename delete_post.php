<?php
$conn = mysqli_connect("localhost","root","password","rouak_cnrps")or die("Connection not established");
if(isset($_GET['post_id'])){
    $post_id = $_GET['post_id'];
    $delete_post = "DELETE from posts where post_id='$post_id'";

    $run_delete=mysqli_query($conn,$delete_post);
    if($run_delete){
        echo "<script>alert('تم حذف المنشور من بياناتك')</script>";
        echo "<script>window.open('../home.php','_self')</script>";
    }
    
}

?>
