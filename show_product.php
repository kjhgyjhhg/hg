<?php
include 'condb.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Show Product</title>
	<!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class=" h4 text-center alert alert-primary mb-4 mt-4" role="alert"> เเสดงข้อมูลสินค้า </div>
		<a class="btn btn-success mb-4" href="fr_product.php" role="button">Add+</a>
<table class="table table-striped table-hover">

	<tr>
		<th>รหัสสินค้า</th>
		<th>ชื่อสินค้า</th>
		<th>ประเภท</th>
		<th>ราคา</th>
		<th>จำนวน</th>
		<th>รูปภาพ</th>
		<th>เเก้ไข</th>
	</tr>
<?php
$sql = "SELECT * FROM product ,types WHERE product.type_id =types.type_id";
$hand=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($hand)){ 
?>
<tr>
	<td><?=$row['pro_id']?></td>
	<td><?=$row['pro_name']?></td>
	<td><?=$row['type_name']?></td>
	<td><?=$row['price']?></td>
	<td><?=$row['amount']?></td>
	<td><img src="image/<?=$row['image']?>" width="150px" hieght="100px"></td>
	<td><a href="edit_product.php?id=<?=$row['pro_id']?>" class="btn btn-warning mb-4"> Edit</td>
</tr>

<?php
}
mysqli_close($conn);
?>