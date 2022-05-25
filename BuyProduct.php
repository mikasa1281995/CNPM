<?php

include 'Config.php';
session_start();
error_reporting(0);
 
if (!isset($_SESSION["user_id"])){
	header("Location: Signin.php");
}

$id_user = $_SESSION["user_id"];
$sql2 = mysqli_query($conn,"SELECT * FROM users WHERE id = '$id_user'");
$row2 = mysqli_fetch_assoc($sql2);

$product_id = $_GET['id'];
$sql4 = mysqli_query($conn, "SELECT * FROM product WHERE id = '$product_id'");
$row4 = mysqli_fetch_assoc($sql4);

try{
  if (isset($_POST["BuyProduct"])){
      $product_id = $_GET['id'];
      $product_buy = mysqli_real_escape_string($conn, $_POST["product_buy"]);
      $full_name = $row2['full_name'];
      $company = $row2['company'];
      $product_count = $row4['product_count'];
      $product_price = $row4['product_price'];
      $payment = $_POST["payment"];
      $bank_name = mysqli_real_escape_string($conn, $_POST["bank_name"]);
      $bank_id = mysqli_real_escape_string($conn, $_POST["bank_id"]);
      $momo = mysqli_real_escape_string($conn, $_POST["momo"]);
      $status = "Chưa thanh toán";
      $delivery = "Chưa giao hàng";
      if($payment == "ck" || $payment == "momo")
      {
        $status = "Đã thanh toán";
      }
      if($payment == "ck" && $bank_name == "" && $bank_id == "")
      {
        echo "<script>alert('Nếu bạn chọn chuyển khoản, xin vui lòng nhập thông tin ngân hàng');</script>";
        throw new Exception('failed');
      }else if($payment == "momo" && $momo == ""){
        echo "<script>alert('Nếu bạn chọn thanh toán bằng momo, xin vui lòng điền Số điện thoại Momo');</script>";
        throw new Exception('failed');
      }
      if($product_buy <= $product_count){
        $sql3 = "INSERT INTO purchase (product_id, product_buy, users_id, full_name, company, bank_name, bank_id, momo, status, delivery) 
        VALUES ('$product_id', '$product_buy', '$id_user','$full_name', '$company', '$bank_name', '$bank_id', '$momo', '$status','$delivery')";
        $result3 = mysqli_query($conn, $sql3);
        if ($result3){
          $_POST["product_id"] = "";
          $_POST["product_buy"] = "";
          $_POST["bank_name"] = "";
          $_POST["bank_id"] = "";
          $_POST["bank_momo"] = "";
          $product_left = $product_count - $product_buy;
          $product_pay = $product_price * $product_buy;
          $sql5 = "UPDATE product SET product_count = '$product_left' WHERE id = '$product_id'";
          $result5 = mysqli_query($conn, $sql5);
          echo "<script>alert('Bạn đã mua hàng thành công với giá tiền $product_pay VND.');
            window.location.href='Welcome.php';</script>";
        }else {
          echo "<script>alert('Mua thất bại.');</script>";
        }
      }
      else {
        echo "<script>alert('Số hàng còn lại trong kho không đủ.');</script>";
      }
  }
}catch(Exception $ex){

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
        <div class="container h-80 py-5">
			<div class="d-flex justify-content-center h-80">
				<div class="user_card_createClass">
					<div class="d-flex justify-content-center">
						<div class="brand_logo_container">
							<img src="images/SupplementLogo.jpg" class="brand_logo" alt="Logo">
						</div>
					</div>
					<div class="d-flex justify-content-center form_container">
						<form action="" method="post" enctype="multipart/form-data">
            <div>
            <h2 class="title">Mua Sản Phẩm</h2>
              <div class="input-group mb-3">
							<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-edit"></i></span>
								</div>
								<input type="text" name="product_name" class="form-control" 
                  placeholder="Tên sản phẩm" value=<?php echo $row4["product_name"]; ?> disabled>
							</div>
              <div class="input-group mb-3">
							<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-edit"></i></span>
								</div>
								<input type="text" name="product_name" class="form-control" 
                  placeholder="Số lượng sản phẩm" value=<?php echo $row4['product_count']; ?> disabled>
							</div>
              <div class="input-group mb-3">
							<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-edit"></i></span>
								</div>
								<input type="text" name="product_name" class="form-control" 
                  placeholder="Đơn giá" value=<?php echo $row4['product_price']; ?> disabled>
							</div>
                <div class="input-group mb-3">
							<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-edit"></i></span>
								</div>
								<input type="int" name="product_buy" class="form-control" required 
                  placeholder="Số lượng sản phẩm" value=<?php echo $_POST["product_buy"];?>>
							</div>
              <p>Chọn phương thức thanh toán:</p>
              <div class="input-group mb-3">
                <input type="radio" id="contactChoice1"
                name="payment" value="tm">
                <label for="contactChoice1">Tiền mặt</label>
                <input type="radio" id="contactChoice2"
                name="payment" value="ck">
                <label for="contactChoice2">Chuyển Khoản</label>
                <input type="radio" id="contactChoice3"
                name="payment" value="momo">
                <label for="contactChoice3">Momo</label>
              </div>
              <div class="input-group mb-3">
							<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-edit"></i></span>
								</div>
								<input type="int" name="bank_name" class="form-control" placeholder="Tên ngân hàng">
							</div>
              <div class="input-group mb-3">
							<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-edit"></i></span>
								</div>
								<input type="int" name="bank_id" class="form-control" placeholder="Số tài khoản">
							</div>
              <div class="input-group mb-3">
							<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-edit"></i></span>
								</div>
								<input type="int" name="momo" class="form-control" placeholder="Số điện thoại Momo">
							</div>
							<div class="form-group">
							</div>
								<div class="d-flex justify-content-center mt-3 login_container">
								<input type="submit" name="BuyProduct" class="btn login_btn" value="Mua">
					</div>
						</form>
					</div>