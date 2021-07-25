
<?php 

$conn = mysqli_connect("localhost","root","","rouak_cnrps");
include("cmd.php");
include("asidebar.php");


?>
<?php

$user = $_SESSION['email'];
	
		$run_user = mysqli_query($conn,"select * from users where email='$user' ");
		while($row = mysqli_fetch_assoc($run_user)){


        $user_name =$row['user_name'];
        $email = $row['email'];
        $user_id=$row['user_id'];
        $post=$row['posts'];
    


 
        $run_posts = mysqli_query($conn, "SELECT * from posts  ");
        $posts_num = mysqli_num_rows($run_posts);
        

        
        $run_users = mysqli_query($conn,"SELECT * from users ");
        $users_num = mysqli_num_rows($run_users);

        $run_comments = mysqli_query($conn,"SELECT * from comments ");
        $comments_num = mysqli_num_rows($run_comments);
        }

?>



<article class="col-lg-9">
<div class="col-lg-12">
<div class="row"> 
<div class="col-sm-4">
    <div class="panel panel-info">
    <?php $run_user = mysqli_query($conn,"select * from users where email='$user' ");
		$row = mysqli_fetch_assoc($run_user);

        $user_name =$row['user_name'];
        $email = $row['email'];
        $user_id=$row['user_id'];
        $post=$row['posts'];
        ?>
        <div class="panel-heading">اهلا بك يا <?php echo $row['user_name']; ?></div>
            <div class="panel-body">
                <div class="text-center">
              <?php echo"<img src='../static/users/".$row['user_image']."' alt='Profile' class='img-circle' width='150px' 
    height='150px'>" ?>
                   <hr>
                </div>
                <div class="text-right">
                    <p>البريد الالكتروني <br><?php echo "$email"; ?></p>
                    
                    
                    </div>
                </div>
            </div>
        </div>
<div class="col-sm-2">
    <div class="panel panel-success">
        <div class="panel-heading">المنشورات</div>
            <div class="panel-body">                
                    <div class="col-sm-8"><i class="glyphicon glyphicon-list"></i></div>
                    <div class="col-sm-4"><p><?php echo "$posts_num";?></p></div><hr>
                    <div class="panel-footer"><i class="glyphicon glyphicon-eye-open"></i>
                    <a href="../home.php">مشاهدة</a></div>
            </div>
        </div>    
</div>
<div class="col-sm-2">
    <div class="panel panel-warning">
        <div class="panel-heading">الاعضاء</div>
            <div class="panel-body">                
                    <div class="col-sm-8"><i class="glyphicon glyphicon-user"></i></div>
                    <div class="col-sm-4"><p><?php echo "$users_num";  ?></p></div><hr>
                    <div class="panel-footer"><i class="glyphicon glyphicon-eye-open"></i>
                    <a href="../members.php">مشاهدة</a></div>
            </div>
        </div>
</div>

<div class="col-sm-2">
    <div class="panel panel-danger">
        <div class="panel-heading">التعليقات</div>
            <div class="panel-body">                
                    <div class="col-sm-8"><i class="glyphicon glyphicon-comment"></i></div>
                    <div class="col-sm-4"><p><?php echo " $comments_num"; ?></p></div><hr>
                    <div class="panel-footer"><i class="glyphicon glyphicon-eye-open"></i>
                    <a href="../functions/comments.php">مشاهدة</a></div>
            </div>
        </div>
</div>

<?php
                $query = " SELECT id_law FROM laws";
                $result = mysqli_query($conn, $query);
                $catNum = mysqli_num_rows($result);     
                ?>
<div class="col-sm-2" >
    <div class="panel panel-success">
                <div class="panel-heading"><p>عدد القوانين </p></div>
                <div class="panel-body">
                <div class=" col-sm-8"><i class="glyphicon glyphicon-comment"></i></div>
                <div class="col-sm-4"><p><?php echo " $catNum"; ?></p></div><hr>
                <div class="panel-footer"><i class="glyphicon glyphicon-eye-open"></i>
                    <a href="laws.php">مشاهدة</a></div>
                </div>               
    </div>               
</div>
</div>
<div class="col-sm-4">
    <div class="panel panel-info">
    <?php $run_user = mysqli_query($conn,"select * from users where email='$user' ");
		$row = mysqli_fetch_assoc($run_user);

        $user_name =$row['user_name'];
        $email = $row['email'];
        $user_id=$row['user_id'];
        $post=$row['posts'];
        ?>
        <div class="panel-heading">اهلا بك يا <?php echo $row['user_name']; ?></div>
            <div class="panel-body">
                <div class="text-center">
              <?php echo"<img src='../static/users/".$row['user_image']."' alt='Profile' class='img-circle' width='150px' 
    height='150px'>" ?>
                   <hr>
                </div>
                <div class="text-right">
                    <p>البريد الالكتروني <br><?php echo "$email"; ?></p>
                    
                    
                    </div>
                </div>
            </div>
        </div>
<?php
                $query = " SELECT id_marsoum FROM marasim";
                $result = mysqli_query($conn, $query);
                $marNum = mysqli_num_rows($result);     
                ?>
<div class="col-sm-2" >
    <div class="panel panel-success">
                <div class="panel-heading"><p>عدد المراسيم </p></div>
                <div class="panel-body">
                <div class=" col-sm-8"><i class="glyphicon glyphicon-comment"></i></div>
                <div class="col-sm-4"><p><?php echo " $marNum"; ?></p></div><hr>
                <div class="panel-footer"><i class="glyphicon glyphicon-eye-open"></i>
                    <a href="laws.php">مشاهدة</a></div>
                </div>               
    </div>               
</div>
</div>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
  <center>
    <h3 class="display-4">ادارة المحتوى</h3>
    <p class="lead">
    <a type="button" class="btn btn-primary" href="laws.php">اضافة قانون جديد</a>
<a type="button" class="btn btn-success" href="admin.php"> لوحة التحكم</a>
<a type="button" class="btn btn-danger" href="cat_princ.php"> التصنيفات الاساسية</a>
<a type="button" class="btn btn-warning" href="marasim.php">اضافة امر او مرسوم </a></p></center>

  </div>
</div>



<?php include("../includes/footer.php"); ?>
</body>
</html>