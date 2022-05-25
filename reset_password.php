<?php


include 'login_config.php';

session_start();

if (isset($_POST["resetPassword"])) {
    $passwordreset = mysqli_real_escape_string($conn, md5($_POST["passwordreset"]));
    $passwordresetconfirm = mysqli_real_escape_string($conn, md5($_POST["passwordresetconfirm"]));
    if ($passwordreset === $passwordresetconfirm) {
      $sql = "UPDATE users SET password='$passwordreset' WHERE token='{$_GET["token"]}'";
      mysqli_query($conn, $sql);
      echo "<script>alert('Chúc mừng bạn đã đặt lại mật khẩu thành công.');
			window.location.href='signin.php';</script>";
    } else {
        echo "<script>alert('Xác nhận mật khẩu không đúng.');</script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tôn Đức Thắng University - QuangHuy</title>
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
</head>
<body>
<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card_forgotpassword">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="images/SupplementLogo.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action = "" method="post">
					<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="passwordreset" class="form-control input_pass" value="<?php echo $_POST["signup_password"]; ?>" placeholder="Mật khẩu mới" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="passwordresetconfirm" class="form-control input_pass" value="<?php echo $_POST["signup_cpassword"]; ?>" placeholder="Xác nhận mật khẩu" required>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<input type="submit" name="resetPassword" class="btn login_btn" value="Xác nhận đổi mật khẩu">
				   </div>
					</form>
				</div>
	
			</div>
		</div>
	</div>
</body>
</html>