<?php

include 'Config.php';
error_reporting(0);
session_start();
 
if (!isset($_SESSION["user_id"])){
	header("Location: signin.php");
}

if (isset($_POST["ChangeStatus"])){
	$id = mysqli_real_escape_string($conn, $_POST["ChangeStatus"]);
	$sql1 = mysqli_query($conn,"SELECT status FROM purchase WHERE id ='$id' AND status ='Chưa thanh toán'");
	$sql2 = mysqli_query($conn,"SELECT status FROM purchase WHERE id ='$id' AND status ='Đã thanh toán'");
	if (mysqli_num_rows($sql1) > 0)  {
		$sql3 = mysqli_query($conn,"UPDATE purchase SET status='Đã thanh toán' WHERE id ='$id'");
	}
	else if (mysqli_num_rows($sql2) > 0)  {
		$sql4 = mysqli_query($conn,"UPDATE purchase SET status='Chưa thanh toán' WHERE id ='$id'");
	}
	else{
		echo "<script>alert('Cập nhật thất bại.');</script>";
	}
}

if (isset($_POST["ChangeDelivery"])){
	$id = mysqli_real_escape_string($conn, $_POST["ChangeDelivery"]);
	$sql1 = mysqli_query($conn,"SELECT delivery FROM purchase WHERE id ='$id' AND delivery ='Chưa giao hàng'");
	$sql2 = mysqli_query($conn,"SELECT delivery FROM purchase WHERE id ='$id' AND delivery ='Đang giao hàng'");
	$sql3 = mysqli_query($conn,"SELECT delivery FROM purchase WHERE id ='$id' AND delivery ='Đã giao hàng'");
	if (mysqli_num_rows($sql1) > 0)  {
		$sql4 = mysqli_query($conn,"UPDATE purchase SET delivery='Đang giao hàng' WHERE id ='$id'");
	}
	else if (mysqli_num_rows($sql2) > 0)  {
		$sql5 = mysqli_query($conn,"UPDATE purchase SET delivery='Đã giao hàng' WHERE id ='$id'");
	}
	else if (mysqli_num_rows($sql3) > 0)  {
		$sql6 = mysqli_query($conn,"UPDATE purchase SET delivery='Chưa giao hàng' WHERE id ='$id'");
	}
	else{
		echo "<script>alert('Cập nhật thất bại.');</script>";
	}
}

if (isset($_POST["DeletePurchase"])){
	$id = mysqli_real_escape_string($conn, $_POST["DeletePurchase"]);
	$sql1 = mysqli_query($conn,"SELECT status FROM purchase WHERE id ='$id' AND status ='Đã thanh toán'");
	$sql2 = mysqli_query($conn,"SELECT delivery FROM purchase WHERE id ='$id' AND delivery ='Đã giao hàng'");
	if(mysqli_num_rows($sql1) > 0 && mysqli_num_rows($sql2) > 0){
		$sql = "DELETE FROM purchase WHERE id = $id";
		$result = mysqli_query($conn, $sql);
		if ($result){
			mysqli_close($conn);
			header("location: HistoryAdmin.php");
		exit;
		} else {
			echo "<script>alert('Xóa thất bại');</script>";
		}
	}
	else{
		echo "<script>alert('Bạn chỉ có thể xóa đơn hàng khi đơn hàng đã được giao và đã thanh toán');</script>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyên cung cấp sỉ lẽ linh kiện máy tính</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
	<div id="content">
	   <nav class="navbar navbar-expand-lg py-3">
		 <div class="container-fluid">
		   <a href='welcome.php' type="submit" id="sidebarCollapse" class="btn btn-info" name='home'> 
		   <i class="fas fa-home"></i>
		   </a>
		   <span class='name_leftcornor'>TEACHNOLOGY PRODUCT SUPPLEMENTS</span>
		   <div class="collapse navbar-collapse " id="navbarSupportedContent">
			 <ul class="nav navbar-nav ml-auto" >
			   <li class="nav-item" style="margin-right: 25px">
				   <?php 
				   echo "<span class='name_rightcornor'>"."Xin chào, ". $_SESSION["name"]."</span>";
				   ?>
			   </li>
			   <li class="nav-item" >
				<a class="log_out" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
			   </li>
			 </ul>
		   </div>
		 </div>
		 </nav>

	<div class="container h-100 mt-5">
		<div class="d-flex justify-content-center mt-5">
			<div class="user_card_displaytable mt-5">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="images/SupplementLogo.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<table class="table">
						<tr>
							<th>ID</th>
							<th>Tên sản phẩm</th>
							<th>Sản phẩm đã mua</th>
							<th>Sản phẩm còn lại</th>
							<th>Tên người mua</th>
							<th>Tên công ty</th>
							<th>Số tiền thanh toán</th>
							<th>Trạng thái thanh toán</th>
							<th>Cập nhật thanh toán</th>
							<th>Trạng thái vận chuyển</th>
							<th>Cập nhật vận chuyển</th>
							<th>Hành động</th>
						</tr>
						<?php 
							$sql = "SELECT * FROM purchase";
							$result = $conn->query($sql);
							$i = 0;
							while ($row = $result->fetch_assoc()){
								$id = $row['id'];
								$product_id = $row['product_id'];
								$i = $i +1;
						?>
						<tr>
							<td><?php echo $i ?></td>
							<td>
								<?php
								  $sql4 = mysqli_query($conn, "SELECT * FROM product WHERE id = '$product_id'");
								  $row4 = mysqli_fetch_assoc($sql4);
									echo $row4['product_name']
								  ?>
							</td>
							<td><?php echo $row['product_buy'] ?></td>
							<td>
								<?php 
									echo $row4['product_count']
								?>
							</td>
							<td><?php echo $row['full_name'] ?></td>
							<td><?php echo $row['company'] ?></td>
							<td><?php echo $row['product_buy'] * $row4['product_price']." VNĐ" ?></td>
							<td><?php if ($row['status'] == 'Chưa thanh toán') {echo "<p style='color: red;'>Chưa thanh toán</p>";} 
								else if ($row['status'] == 'Đã thanh toán') {echo "<p style='color: green;'>Đã thanh toán</p>";} ?></td>
							<form action="" method="post">
						 	<td><?php  echo "<button value = '$id' name='ChangeStatus' type='submit' class='btn btn-warning' >Cập nhật</button>"; ?></td>  
							 </form>
							 <td><?php if ($row['delivery'] == 'Chưa giao hàng') {echo "<p style='color: red;'>Chưa giao hàng</p>";} 
								else if ($row['delivery'] == 'Đang giao hàng') {echo "<p style='color: orange;'>Đang giao hàng</p>";} 
								else if ($row['delivery'] == 'Đã giao hàng') {echo "<p style='color: green;'>Đã giao hàng</p>";} ?></td>
							 <form action="" method="post">
						 	<td><?php  echo "<button value = '$id' name='ChangeDelivery' type='submit' class='btn btn-warning' >Cập nhật</button>"; ?></td>  
							 </form>
							 <form action="" method="post">
						 	<td><?php  echo "<button value = '$id' name='DeletePurchase' type='submit' class='btn btn-danger' 
							 	onclick=\"return confirm('Bạn có muốn xóa đơn hàng này không?')\" >Xóa</button>"; ?></td>  
							 </form>
						</tr>
						<?php 
							}
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
