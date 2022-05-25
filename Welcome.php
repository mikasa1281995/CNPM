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

if (isset($_POST["BuyProduct"])){
    $product_id = mysqli_real_escape_string($conn, $_POST["product_id"]);
    $product_buy = mysqli_real_escape_string($conn, $_POST["product_buy"]);
    $full_name = $row2['full_name'];
    $company = $row2['company'];
    $sql4 = mysqli_query($conn, "SELECT * FROM product WHERE id = '$product_id'");
    $row4 = mysqli_fetch_assoc($sql4);
    $product_count = $row4['product_count'];
    if($product_buy <= $product_count){
      $sql3 = "INSERT INTO purchase (product_id, product_buy, full_name, company) VALUES ('$product_id', '$product_buy', '$full_name', '$company')";
      $result3 = mysqli_query($conn, $sql3);
      if ($result3){
        $_POST["product_id"] = "";
        $_POST["product_buy"] = "";
        $product_left = $product_count - $product_buy;
        $sql5 = "UPDATE product SET product_count = '$product_left' WHERE id = '$product_id'";
        $result5 = mysqli_query($conn, $sql5);
        echo "<script>alert('Bạn đã mua hàng thành công.');
          window.location.href='Welcome.php';</script>";
      }else {
        echo "<script>alert('Mua thất bại.');</script>";
      }
    }
    else {
      echo "<script>alert('Số hàng còn lại trong kho không đủ.');</script>";
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
            <span class='name_leftcornor'>TEACHNOLOGY PRODUCT SUPPLEMENTS</span>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto" >
                <li>
                    <form action="Search.php" method="post">
                      <div class="input-group px-2">
                        <input type='search' id='form1' class='form-control' name='searchvalue'  />
                       <label class='form-label' for='form1' ></label>
                        <button type='submit' name='search' class='btn btn-primary'>
                        <i class='fas fa-search '></i>     
                      </button>
                    </div>
                    </form>
                </li>
                <?php 
                if ($row2['lv'] == 'admin'){
                  echo "<li>";
                  echo "<form action='' method='POST'>";
                  echo " <a href='AddProduct.php' type='submit' class='btn btn-info mx-2' name='cClass' >Thêm Sản Phẩm</a>";
                  echo " <a href='HistoryAdmin.php' type='submit' class='btn btn-info mx-2' name='cClass' >Xuất kho</a>";
                  echo "</form>";
                  echo "</li>";
                }
                else{
                  echo " <a href='History.php' type='submit' class='btn btn-info mx-2' name='cClass' >Xem lịch sử mua hàng</a>";
                }
                ?>
                <li class="nav-item" style="margin-right: 25px; margin-top: 4px">
                    <?php 
                    echo "<span class='name_rightcornor'>"."Xin chào, ". $_SESSION["name"]."</span>";
                    ?>
                </li>
                <li class="nav-item" style="margin-top: 4px">
                 <a class="log_out" href="Logout.php"><i class="fas fa-sign-out-alt"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="user_homepage">
        <?php 
							$sql = "SELECT * FROM product";
							$result = $conn->query($sql);
							while ($row = $result->fetch_assoc()){
								$id = $row['id'];
						?>
          <div class="card" style="width: 280px; height: max-content; margin-right: 20px; border-radius: 10px">
        <img class="card-img-top" src="<?php echo $row['product_image'] ?>" 
          style="width: 95%; height: 200px; object-fit: cover; margin-left: auto;margin-right: auto; border-radius: 10px"  alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['product_name'] ?></h5>
          <p class="card-text"><?php echo "Công dụng: ". $row['product_description'] ?> </p>
          <p class="card-text"><?php echo $row['product_count']." sản phẩm" ?> </p>
          <p class="card-text"><?php echo "Đơn giá: ". $row['product_price']." VND" ?> </p>
            <?php 
            if ($id_user == 100)
            {
              echo "<a style='margin-right: 10px' href='Edit.php?id=$id' class='btn btn-primary'>Sửa</a>";
              echo "<a href='Delete.php?id=$id' class='btn btn-danger' onclick=\"return confirm('Bạn có muốn xóa sản phẩm này không?')\">Xóa</a>";
            }
            else {
              echo "<a href='BuyProduct.php?id=$id' class='btn btn-primary'\">Mua Sản Phẩm</a>";
            }
            ?>
        </div>
      </div>
      <?php 
            }
						?>
</div>
</body>
</html>