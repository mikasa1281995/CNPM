<?php


include 'Config.php';
session_start();
error_reporting(0);
 
if (!isset($_SESSION["user_id"])){
	header("Location: Signin.php");
}

$id_user = $_SESSION["user_id"];
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
                  echo " <a href='AddProduct.php' type='submit' class='btn btn-info mx-4' name='cClass' >Thêm Sản Phẩm</a>";
                  echo "</form>";
                  echo "</li>";
                }
                else{
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
              if (isset($_POST["search"])){
                $key = $_POST["searchvalue"];
                $sql5 = "SELECT * FROM product WHERE product_name LIKE '%$key%'";
                $result5 = mysqli_query($conn, $sql5);
              while ($row1 = mysqli_fetch_assoc($result5)){
                $id1 = $row1['id'];
           ?>
                  <div class="card" style="width: 15rem; height: max-content; margin-right: 20px; border-radius: 10px">
        <img class="card-img-top" src="<?php echo $row1['product_image'] ?>" 
          style="width: 95%; height: 200px; object-fit: cover; margin-left: auto;margin-right: auto; border-radius: 10px" 
          alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row1['product_name'] ?></h5>
          <p class="card-text"><?php echo "Công dụng: ". $row['product_description'] ?> </p>
          <p class="card-text"><?php echo $row1['product_count']." sản phẩm" ?> </p>
          <p class="card-text"><?php echo "Đơn giá: ". $row1['product_price']." VND" ?> </p>
            <?php 
            if ($id_user == 100)
            {
              echo "<a style='margin-right: 10px' href='Edit.php?id=$id1' class='btn btn-primary'>Sửa</a>";
              echo "<a href='Delete.php?id=$id1' class='btn btn-danger' onclick=\"return confirm('Bạn có muốn xóa sản phẩm này không?')\">Xóa</a>";
            }
            else {
              echo "<a href='BuyProduct.php?id=$id1' class='btn btn-primary'\">Mua Sản Phẩm</a>";
            }
            ?>
  </div>
</div>
      <?php
                }
              }
      ?>     
</div>

</body>
</html>