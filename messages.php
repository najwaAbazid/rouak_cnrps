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
	<title>المراسلة </title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
	<link rel="stylesheet" type="text/css" href="style/cd.css">
</head>
<style>
    #scroll_messages{
        max-height:500px;
        overflow:scroll;
        }
        #btn-msg{
            width:20%;
            height:28px;
            border-radius:5px;
            margin:5px;
            color:#fff;
            float:right;
            background-color:black;}
        #select_user{
            height:500px;
            overflow:scroll; }
        #green{
            width:45%;
        border-color:#2980b9
        border-radius:5px;
            margin:5px;
            color:#fff;
            float:right;
            background-color:#3498db; }
        #blue{
            width:45%;
      
            border-radius:5px;
            margin:5px;
            color:#fff;
            float:left;
            background-color:#2ecc71; }
        #btn-msg{ }

</style>
<body>
<div class="row">
    <div class="col-sm-4">
<?php
if(isset($_GET['u_id'])){
    global $conn;

    $get_id = $_GET['u_id'];

    $get_user = "SELECT * from users where user_id='$get_id' ";

    $run_user = mysqli_query($conn,$get_user);
    $row_user = mysqli_fetch_array($run_user);

    $user_to_msg = $row_user['user_id'];
    $user_to_name = $row_user['user_name'];

    }

    $user =$_SESSION['email'];
    $get_user = "SELECT * from users where email='$user'";
    $run_user = mysqli_query($conn, $get_user);
    $row = mysqli_fetch_array($run_user);

    $user_from_msg = $row['user_id'];
    $user_from_name =$row['user_name'];
?>

        <div class="col-sm-3" id="select_user">
                <?php
                    $user = "SELECT * from users";

                    $run_user =mysqli_query($conn, $user);
                    while($row_user=mysqli_fetch_array($run_user)){

                    $user_id = $row_user['user_id'];
                    $user_name = $row_user['user_name'];
                    $firs_name = $row_user['f_name'];
                    $last_name = $row_user['l_name'];
                    $user_image = $row_user['user_image'];
                    echo "<div class'container-fluid'>
                    <a style='text-decoration:none; cursor:pointer;color:#424141;'
                    href='messages.php?u_id=$user_id'>
                    <img class='img-circle' src='users/$user_image'width='90px' height='80px'
                    title='$user_name'><strong>
                    $firs_name $last_name</strong><br><br></a>
                    </div>";
            }
        ?>
        </div>
        </div>
        <div class="col-sm-6">
        <div class="load_msg" id="scroll_messages">
        <?php 
            $sel_msg = "SELECT * from user_messages where
        (user_to ='$user_to_msg' AND user_from='$user_from_msg')or
        (user_from='$user_to_msg' AND user_to ='$user_from_msg')ORDER by 1 ASC ";

        $run_msg = mysqli_query($conn , $sel_msg) ; 
         while(  $row_msg = mysqli_fetch_array($run_msg)){
                $user_to = $row_msg['user_to'];
                $user_from = $row_msg['user_from'];
                $msg_body = $row_msg['msg_body'];
        $msg_date = $row_msg['date'];      
    ?>
    <div id="loaded_msg"><p><?php if($user_to==$user_to_msg AND $user_from==$user_from_msg)
    {echo "<div class='message' id='blue' data-toggle='tooltip'
        title='$msg_date'>$msg_body</div><br><br><br>";}elseif($user_from==$user_to_msg
        AND $user_to==$user_from_msg ){echo "<div class='message' id='green' data-toggle='tooltip'
        title='$msg_date'>$msg_body</div><br><br>";} ?></p></div>
    <?php
    }
        ?>
        </div>
            <?php
            if(isset($_GET['u_id'])){
                $u_id = $_GET['u_id'];
                if($u_id=="new"){
                    echo "<form><center><h5>اختر احد الاشخاص لبدء محادثة</h5>
                    </center>
                    <textarea disabled class='form-control' placeholder=
                    'ادخل رسالتك هنا '></textarea>
                    <input type='submit' class='btn btn-default' 
                    disabled value='send'></form><br><br>
                    ";
                }
                else{  echo "<form action='' method='POST'>
                    <textarea class='form-control' name='msg_box' id='msg_textarea' placeholder=
                    'ادخل رسالتك هنا '></textarea>
                    <input type='submit' name='send_msg' id='btn-msg' 
                    value='اضغط للارسال'></form><br><br>
                    ";

                }
            }
            ?>
            <?php
                    if(isset($_POST['send_msg'])){
                        $msg = htmlentities($_POST['msg_box']);
                        if($msg==""){
                            echo "<h4 style='color:red; text-align:center;'>كان باستطاعتك كتابة رسالة</h4>";
                        }elseif(strlen($msg)> 37){
                            echo "<h5>رسالتك طويلة يجب ان لاتتجاوز 37 حرفا
                            </h5>";
                        }                           
                            
                            else{
                                $insert="INSERT into user_messages 
                            (user_to,user_from,msg_body,date,msg_seen)
                            values('$user_to_msg','$user_from_msg','$msg',NOW(),'no')";

                            $run_insert = mysqli_query($conn,$insert);

                        }
                    }
                    ?>
        </div>
        <div class="col-sm-3">
            <?php
            if(isset($_GET['u_id'])){
                $get_id =$_GET['u_id'];
                $get_user ="SELECT * from users where user_id='$get_id'";
                $run_user = mysqli_query($conn,$get_user);
                $row = mysqli_fetch_array($run_user);
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                $user_image =$row['user_image'];
                $f_name = $row['f_name'];
                $l_name = $row['l_name'];
                $dir = $row['dir'];
                $city = $row['city'];
             
            }
            if($get_user=="new"){

            }else{
                echo "<div class='row'>
                    <div class='col-sm-2'></div>
                    <center>
                            <div style='background-color:77773c;' class='col-sm_9'>
                            <h2>معلومات عن </h2></center>
                            <img class='img-circle' src='users/$user_image' width='150'
                            height='150'><br><br>
                            <ul class='list-group'>
                                <li class='list-group-item'><strong>$f_name $l_name</strong></li>
                                <li class='list-group-item'><strong>$dir</strong></li>
                                <li class='list-group-item'><strong>$city</strong></li>
                            </ul>
                        </div>
                    <div class='col-sm-1'>
                    </div>
                </div>
                ";
            }
            ?>        
        </div> 
    </div>
</div>
</div>
</body>
</html>