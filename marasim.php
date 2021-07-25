<?php

$conn = mysqli_connect("localhost","root","","rouak_cnrps");
include("cmd.php");
include("asidebar.php");
?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title_marsoum = $_POST['title_marsoum'];
        $cat = $_POST['title_law'];
        $date_marsoum = $_POST['date_marsoum'];
        $keis_words = $_POST['keis_words'];
        // Book Cover
        $aff = $_FILES['pdf_file']['name'];
        $pdfTmp = $_FILES['pdf_file']['tmp_name'];
        if (empty($title_marsoum) || empty($cat) || empty( $date_marsoum) || empty(  $keis_words)) {
            $error = "<div class='alert alert-danger'>" 
            . "الرجاء ملء الحقول أدناه" . "</div>";
        
        } elseif (empty($aff)) {$error = "<div class='alert alert-danger'>" 
            . "الرجاء إختيار ملف " . "</div>";
        } else { 
            $affi = rand(0, 1000) . "_" . $aff;
            move_uploaded_file($pdfTmp, "uploaded/" . $aff);
            $query = "INSERT INTO  `marasim`( `title_marsoum`, `name_law`, `date_marsoum`, `keis_words`, `pdf_file`) VALUES 
            ('$title_marsoum',' $cat','$date_marsoum',' $keis_words','$affi')" ;
            $res = mysqli_query($conn , $query);
            if (isset($res)) {
            $success = "<div class='alert alert-success'>" 
            . "تم إضافة المرسوم بنجاح" . "</div>";
            }
        }
    }
    ?>
<div class= "col-sm-9">
    <div class="container-fluid">
        <div class="new-marsoum">
            <?php
            if (isset($error)) {
                echo $error;
            } elseif (isset($success)) {
                echo $success;
            }          

    ?>           
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"
enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">عنوان المرسوم</label>
        <input type="text" id="title" class="form-control"
        name="title_marsoum" value="<?php if (isset($title_marsoum)) {
        echo $title_marsoum;                                                                                                } ?>">
    </div>


    <div class="form-group">
        <label for="title">التصنيف</label>
        <select class="form-control" name="title_law">
            <option></option>  
            <?php
            $query = "SELECT title_law FROM laws";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
        <option><?php echo $row['title_law']; ?></option>
        <?php } ?>  
         </select>
         
    </div>
    <div class="form-group">
        <label id="date_marsoum">تاريخ المرسوم</label>
        <input type="date" id="title" class="form-control" name="date_marsoum" value="<?php if (isset($date_marsoum)) {
        echo $date_marsoum;                                                                                                } ?>">
    </div>
    <div class="form-group">
        <label for="text">كلمات مفتاحية عن المرسوم</label>
        <textarea name="keis_words" id="" cols="15" rows="5"
        class="form-control"><?php if (isset($keis_words)) {
        echo $keis_words;
            } 
            $nn =  mysqli_error($conn); 
            echo $nn ;
    
        ?></textarea>
    </div>
    <div class="form-group">
        <label for="img">ملف المرسوم</label>
        <input type="file" class="form-control" name="pdf_file">
    </div>               
                <button class="custom-btn">نشر المرسوم</button>
            </form>
        </div>
    </div>
    </div>

    </div>