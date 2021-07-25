<?php

$conn = mysqli_connect("localhost","root","","rouak_cnrps");
include("cmd.php");
include("asidebar.php");
?>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {		        
        $cat = $_POST['name_cat'];
		$title_law = $_POST['title_law'];
        $date_law = $_POST['date_law'];
        $keis_words = $_POST['keis_words'];
        // Book Cover
        $file_law = $_FILES['file_law']['name'];
        $pdfTmp = $_FILES['file_law']['tmp_name'];
        if (empty($title_law) || empty($cat) || empty( $date_law) || empty(  $keis_words)) {
            $error = "<div class='alert alert-danger'>" . "الرجاء ملء الحقول أدناه" . "</div>";
        
        } elseif (empty($file_law)) {
            $error = "<div class='alert alert-danger'>" . "الرجاء إختيار ملف " . "</div>";
        } else { 
            $affi = rand(0, 1000) . "_" . $file_law;
            move_uploaded_file($pdfTmp, "uploaded/" . $file_law);
            $query = "INSERT INTO `laws`( `name_cat`, `title_law`, `date_law`, `keis_words`, `file_law`)
			VALUES('$cat','$title_law','$date_law',' $keis_words','$affi')" ;
            $res = mysqli_query($conn , $query);
            if (isset($res)) {
            $success = "<div class='alert alert-success'>" . "تم إضافة القانون بنجاح" . "</div>";
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
    echo   mysqli_error($conn);
        ?>           
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"
    enctype="multipart/form-data">      

        <div class="form-group">
            <label for="title">التصنيف</label>
            <select class="form-control" name="name_cat">
                <option></option>  
                <?php
                $query = "SELECT name_cat FROM cat_princ";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <option><?php echo $row['name_cat']; ?></option>
                <?php
        
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="title">عنوان القانون</label>
            <input type="text" id="title" class="form-control"
            name="title_law" value="<?php if (isset($title_law)) { echo $title_law;  } ?>">
        </div>
        <div class="form-group">
            <label id="date_law">تاريخ صدوره</label>
            <input type="date" id="title" class="form-control" name="date_law" value="<?php if (isset($date_law)) {
            echo $date_marsoum;  } ?>">
            </div>
        <div class="form-group">
            <label for="text">كلمات مفتاحية  </label>
            <textarea name="keis_words" id="" cols="15" rows="5" class="form-control"><?php if (isset($keis_words)) {
                    echo $keis_words;
                } ?></textarea>
        </div>
        <div class="form-group">
            <label for="img">ملف القانون</label>
            <input type="file" class="form-control" name="file_law">
        </div>               
        <button class="custom-btn">اضافة  </button>
    </form>
        </div>
    </div>
    </div>

    </div>