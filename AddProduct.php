<?php

include 'Config.php';
session_start();
error_reporting(0);
 
if (!isset($_SESSION["user_id"])){
	header("Location: Signin.php");
}
if (isset($_POST['AddProduct'])){
  $creatorid = $_SESSION["user_id"];
  $product_name = mysqli_real_escape_string($conn, $_POST["product_name"]);
	$product_count = mysqli_real_escape_string($conn, $_POST["product_count"]);
  $product_price = mysqli_real_escape_string($conn, $_POST["product_price"]);
  $product_description = mysqli_real_escape_string($conn, $_POST["product_description"]);
  $product_code = md5(uniqid(rand(), true));
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
  $sql = "INSERT INTO product (product_name,product_code,product_count,product_price,product_image,product_description) 
  VALUES ('$product_name','$product_code','$product_count','$product_price','$target_file','$product_description') ";
	$result = mysqli_query($conn, $sql);
  if ($result){
    $_POST["product_name"]= "";
    $_POST["product_count"]= "";
    $_POST["product_price"]= "";
    $_POST["product_description"] = "";
    echo "<script>alert('Bạn đã thêm sản phẩm thành công.');
    window.location.href='welcome.php';</script>";
  } else {
    echo "<script>alert('Thêm thất bại.');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
    ></script>
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
    ></script>
    <title>Chuyên cung cấp sỉ lẽ linh kiện máy tính</title>
</head>
<body>
      <div id="content">
        <nav class="navbar navbar-expand-lg py-3">
          <div class="container-fluid">
            <a href='welcome.php' type="submit" id="sidebarCollapse" class="btn btn-info" name='home'> 
            <i class="fas fa-home"></i>
            </a>
            <span class='name_leftcornor'> TEACHNOLOGY PRODUCT SUPPLEMENTS</span>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto" >
                <li>
                  <form action="" method="POST">
                    <a href='AddProduct.php' type="submit" class="btn btn-secondary mx-4 " name="cClass" >Thêm Sản Phẩm</a>
                  </form>
                </li>
                <li class="nav-item" style="margin-right: 25px; margin-top: 4px">
                    <?php 
                    echo "<span class='name_rightcornor'>"."Xin chào, ". $_SESSION["name"]."</span>";
                    ?>
                </li>
                <li class="nav-item" style="margin-top: 4px">

                 <a class="log_out" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>

                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container h-100 py-5">
			<div class="d-flex justify-content-center h-100">
				<div class="user_card_Update">
					<div class="d-flex justify-content-center">
						<div class="brand_logo_container">
							<img src="images/SupplementLogo.jpg" class="brand_logo" alt="Logo">
						</div>
					</div>
					<div class="d-flex justify-content-center form_container">
						<form action="" method="post" enctype="multipart/form-data">
            <div>
            <h2 class="title">Thêm Sản Phẩm</h2>
            </div>
						<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-edit"></i></span>
								</div>
								<input type="text" name="product_name" class="form-control" placeholder="Tên sản phẩm" required>
							</div>
              <div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-edit"></i></span>
								</div>
								<input type="int" name="product_count" class="form-control" placeholder="Số lượng sản phẩm" required>
							</div>
              <div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-edit"></i></span>
								</div>
								<input type="int" name="product_price" class="form-control" placeholder="Đơn giá" required>
							</div>
              <div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-edit"></i></span>
								</div>
								<input type="text" name="product_description" class="form-control" placeholder="Công dụng" required>
							</div>
              <div class="input-group mb-3">
                <input type="file" id="fileToUpload" name="fileToUpload" required>
              </div>
							<div class="form-group">
							</div>
								<div class="d-flex justify-content-center mt-3 login_container">
								<input type="submit" name="AddProduct" class="btn login_btn" value="Thêm">
					</div>
						</form>
					</div>