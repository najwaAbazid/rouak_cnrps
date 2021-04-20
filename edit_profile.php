<!DOCTYPE html>
<?php 
session_start();
include("includes/header.php");

if(!isset($_SESSION['email'])){
    header("location:index.php");
}
?>
<html lang="en">
<head>
<?php
$user=$_SESSION['email'];
$get_user ="SELECT * from users where email='$user'";
$run_user = mysqli_query($conn,$get_user);
$row = mysqli_fetch_array($run_user);

$user_name = $row['user_name'];

?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل معلومات الحساب</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="row">
<div class="col-sm-12">
<center><h1>تعديل الملف الشخصي</h1></center></div></div>
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8">
    <form action="" method="POST" enctype="multipart/form-data">
<table class="table  table-bordered table-hover">
<tr align="center">
<td colspan="6" class="active"><h2>عدل ملفك الشخصي</h2></td>
</tr>
<tr>
<td style="font-weight:bold;">عدل الاسم الاول</td>
<td>
    <input class="form-control" type="text" name="f_name"
     required value="<?php echo $first_name; ?>">
</td>
</tr>
<tr><td style="font-weight:bold;">عدل اسم العائلة</td>
<td>
    <input class="form-control" type="text" name="l_name"
     required value="<?php echo $last_name; ?>">
</td>

</tr>
<tr><td style="font-weight:bold;">عدل الاسم المستخدم</td>
<td>
    <input class="form-control" type="text" name="user_name"
     required value="<?php echo $user_name; ?>">
</td>
</tr>
<tr>
<td style="font-weight:bold;">عدل كلمة السر </td> 
<td>
    <input class="form-control" type="text" name="pass"
     required value="<?php echo $user_pass; ?>"></td>
     <td>
     <input type="checkbox" onclick="show_password()"><strong>اظهر كلمة السر</strong>
</td>
</tr>
<tr>
<td style="font-weight:bold;">عدل البريد الالكتروني</td>
<td>
    <input class="form-control" type="email" name="email"
     required value="<?php echo $user_email; ?>">
     </td>     
</tr>
<tr>
<td style="font-weight:bold;">اختر مدينة</td>
<td>
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
                    </td></tr>
                    <td> 
<tr>
<td>					<!-- الادارة -->
<div class="input-group">
	<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down">
    </i></span></td>
    <td>
	<select class="form-control input-md" name="dir" required="required">
		<option disabled>Select your dir</option>
							<option>affile</option>
							<option>puntion</option>
							<option>Others</option>
						</select>
</td>
</tr>
<tr>
<td style="font-weight:bold;">تاريخ الولادة  </td>
<td>
        <input class="form-control" type="date" name="birthday"
        required value="<?php echo $user_birthday; ?>">
        
    </td>
    </tr>
    <tr>
    <td style="font-weight:bold;">هل نسيت كلمة السر</td>
    <td><button type="button" class="btn btn-default" data-toggle="modal"
    data-target="#myModal">شغل</button>
    <div id="#myModal" class="modal-fade" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">modal header</h4>
    </div>
    <div class="modal-body">
    <form action="recovry.php?id=<?php echo$user_id ?>" method="POST" id="f">
    <strong>من هو صديقك المفضل في المرحلةالاعدادية</strong>
    <textarea name="content" cols="60" class="form-control" rows="4" placeholder="صديقي المفضل هو"></textarea><br>
    <input  class="btn btn-default" type="submit" name="sub" value="submit" 
    style="width:100px;"><br><br>
    <pre>اجب عن هذه الاسئلة التي سنسالك اياها في حال نسيت كلمة السر</pre><br><br>
        </form>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data dimiss="modal" >closs
        </button>
        </div>
        </div>
        </td>
        </tr>
        <tr align="center"><td colspan="6">
    <input type="btn btn-info" name="update" style="width:250px;" value="update">
    </td>
    </tr>
        </table>
        </form>
    <?php 
    if(isset($_POST['sub'])){
        $bfn = htmlentities($_POST['content']);
        if($bfn==""){
            echo "<script>alert('ادخل معلومات جديدة تعبر عنك')</script>";
            echo "<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";

            exit();
        }else{
            $update ="UPDATE users set recovery_account = '$pfn'
            where user_id ='$user_id'";
            $run = mysqli_query($conn, $update);
            if($run){
                echo "<script>alert('working...')</script>";
                echo "<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";
            }else{
                echo "<script>alert('Error will updating information')</script>";
                echo "<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";
            }
        }
    }
    ?>    
    </div>
<div class="col-sm-2">
</div>
</div>
    

<?php 
if(isset($_POST['update'])){
    $f_name= htmlentities($_POST['f_name']);
    $l_name=htmlentities($_POST['l_name']);
    $user_name =htmlentities($_POST['user_name']);
    $u_pass= htmlentities($_POST['pass']);
    $u_email= htmlentities($_POST['email']);
    $u_birthday= htmlentities($_POST['birthday']);
    $city =htmlentities($_POST['city']);
    $dir= htmlentities($_POST['dir']);
    $update = "UPDATE users set f_name='$f_name' ,l_name='$l_name'
     ,user_name='$user_name' , pass= '$u_pass', email='$u_email' ,
     birthday='$u_birthday',city='$city',dir='$dir' where user_id='$user_id'";
     $run=mysqli_query($conn,$update);
     if($run){
        echo "<script>alert('your profile updated')</script>";
        echo "<script>window.open('edit_profile.php?u_id$user_id','_self')</script>";
    }

}
?>
</body>
</html>
