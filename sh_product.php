<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Show Product</title>
	<!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include 'menu.php'; ?>
	<div class="container mt-4">
	<div class="row">
		<?php
		include 'condb.php';
		$perpage = 4;
		if(isset($_GET['page'])){
			$page =$_GET['page'];
		}else{
			$page = 1;

		}
		$start = ($page -1) * $perpage;


		$sql ="SELECT * FROM product ORDER BY pro_id limit {$start},{$perpage}";
		$hand = mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($hand)){
			$price =$row ['price'];
		?>

	<div class="col-md-2">
	<img src="image/<?=$row['image']?>" width="200" height="250"  class= "mt-5 p-2 my-2 border"> <br>
	ID: <?=$row['pro_id']?> <br>
	<h5 class="text-primary"> <?=$row['pro_name']?> </h5>
	ราคา <b class="text-danger"> <?=number_format($price,2)?> </b> บาท <br>
	<a href="#" class="btn btn-info"> Add+ </a>
	</div>
<?php
	}
	//mysqli_close($conn);
	?>
</div> <!--end-->
<?php
$sql1 ="SELECT * FROM product";
$query1 = mysqli_query($conn,$sql1);
$total_record = mysqli_num_rows($query1);
$total_page = ceil($total_record / $perpage);
?>

<br><br><br>
<nav aria-label="Page navigation example mt-4">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="sh_product.php?page=1">Previous</a></li>
    <?php for($i=1;$i<=$total_page;$i++) {?>
    <li class="page-item"><a class="page-link" href="sh_product.php?page=<?=$i?>"><?=$i?></a></li>
    <?php } ?>
    <li class="page-item"><a class="page-link" href="sh_product.php?page=<?=$total_page?>">Next</a></li>
  </ul>
</nav>

<?php mysqli_close($conn); ?>


</div> <!--end container-->
</body>
</html>