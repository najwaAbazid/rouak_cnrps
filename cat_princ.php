<?php

$conn = mysqli_connect("localhost","root","","rouak_cnrps");
include("cmd.php");
include("asidebar.php");
if (!isset($_SESSION['email'])) {
  header('Location:index.php');
  exit;
} else {
	?>
	<!-- Start Delete category -->
	<?php
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "DELETE FROM cat_princ WHERE id = '$id'";
		$delete = mysqli_query($conn, $query);
	}
	?>
	<!-- End Delete category -->

	<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$category = $_POST['name_cat'];
		if (empty($category)) {
		$catErro =  "<div class='alert alert-danger'>" . "الرجاء ملء الحقل أدناه" . "</div>";
		} else {
		$query = "INSERT INTO cat_princ(name_cat) VALUES('$category')";
		$result = mysqli_query($conn, $query);
		if (isset($result)) {
			$catSuccess =  "<div class='alert alert-success'>" . "تم إضافة التصنيف بنجاح" . "</div>";
		}
		}
	}

	?>
<div class="col-sm-9">
	<div class="container-fluid">
		<!-- Start categories section -->
		<div class="cat_princ">
		<?php
		if (isset($catErro)) {
			echo $catErro;
		}
		if (isset($catSuccess)) {
			echo $catSuccess;
		}
		?>
		 
		<div class="add-cat">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
			<div class="form-group">
			<label for="cat">إضافة تصنيف :</label>
			<input type="text" id="cat" class="form-control" name="name_cat">
			</div>
			<button class="custom-btn">إضافة</button>
		</form>
		</div>
		<div class="show-cat">
		<table class="table">
			<thead class="thead-dark">
		<tr>
			<th scope="col">الرقم</th>
				<th scope="col">عنوان التصنيف</th>
				<th scope="col">تاريخ صدور</th>
				<th scope="col">الإجراء</th>
			</tr>
			</thead>
			<tbody>
			<!-- Fetch categories from database -->
	<?php
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
		}
		$limit = 4;
		$start = ($page - 1) * $limit;
		$query = "SELECT * FROM cat_princ ORDER BY id DESC LIMIT $start, $limit";
		$res = mysqli_query($conn, $query);
		$sNo = 0;
	while ($row = mysqli_fetch_assoc($res)) {
		$sNo++;
	?>

		<tr>
		<td><?php echo $sNo; ?></td>
				<td><?php echo $row['name_cat']; ?></td>
				<td>0000 00 00 </td>
				<td>
					<a href="dashb.php?id=<?php echo $row['id']; ?>" class="custom-btn">مشاهدة</a>
					<a href="cat_princ.php?id=<?php echo $row['id']; ?>" class="custom-btn confirm">حذف</a>
				</td>
				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
			<!-- Start pagination -->
			<?php
			$query = "SELECT * FROM cat_princ";
		$result = mysqli_query($conn, $query);
		$total_cat = mysqli_num_rows($result);
		$total_pages = ceil($total_cat / $limit);
		?>
		<nav aria-label="Page navigation example">
			<ul class="pagination">
			<li class="page-item"><a class="page-link"
			 href="cat_princ.php?page=<?php if (($page - 1) > 0) {
				echo  $page - 1;
			} else {echo 1;
			}

			?>">السابق</a></li>
			<?php
			for ($i = 1; $i <= $total_pages; $i++) {
							?>
				<li class="page-item"><a class="page-link"
				href="cat_princ.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
			<?php
			}
			?>
			<li class="page-item"><a class="page-link" href="cat_princ.php?page=<?php
			if (($page + 1) < $total_pages) {
			echo $page + 1;
			} elseif (($page + 1) >= $total_pages) {
			echo $total_pages;
			}
			?>">التالي</a></li>
			</ul>
		</nav>
		<!-- End pagination -->
		</div>
	</div>
	<!-- End categories section -->
	</div>
	<!-- /#page-content-wrapper -->

	</div>
	</div>
	<!-- /#wrapper -->
	<?php

	?>

	<?php
	}
	?>