
<?php

$conn = mysqli_connect("localhost","root","","rouak_cnrps");
include("includes/header.php");
include("includes/sidebar.php");
?>

<div class="col-sm-9">
<div class="panel panel-info">
<div class="panel-heading"><h2>جديد القوانين</h2>
<form class="" method="get" action="">
    <div class="form-group">
        <input type="text" class="form-control" name="search_query" placeholder="ابحث عن منشور ">
    </div>
<button type="submit" class="btn btn-info" name="search1">ابحث</button>
</form>
 </div>
 </div> 
  <div class='panel-body'>
 <table class='table table-hover'>
 <thead>
 <tr>
 <th>#</th>
 <th>عنوان القانون</th>
 <th>تصنيفه</th>
 <th>تاريخ النشر</th>
 <th>الكلمات المفتاحية</th>
 <th>مشاهدة</th>
 </tr>
 </thead>
 <tbody>
 <?php   
  if(isset($_GET['search1'])){
        $search_query = htmlentities($_GET['search_query']);
 
    $run_laws =mysqli_query($conn,"SELECT * from laws where keis_words like '%$search_query%' 
    or title_law like '%$search_query%'");
    $num=1 ;
    while($law=mysqli_fetch_assoc($run_laws)) {

        echo "<tr>
        <td> $num </td>
        <td>".$law['title_law']. "</td>
        <td>".$law['name_cat']."</td>
        <td>".$law['date_law']."</td>
        <td>".$law['keis_words']."</td>
           </tr>" ;  
           $num ++;
                }
                
            }else{
        $run_laws=mysqli_query($conn,"SELECT * from laws");
    $num =1 ;
        while($law=mysqli_fetch_assoc($run_laws)) {
         


 echo "<tr>
<td> $num </td>
<td>".$law['title_law']. "</td>
<td>".$law['name_cat']."</td>
<td>".$law['date_law']."</td>
<td>".$law['keis_words']."</td>
   </tr>" ;  
   $num ++;
        }
        
    }
       

     ?>
</tbody>
</table>


</div>



