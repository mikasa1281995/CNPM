<?php

include 'Login_Config.php';

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
<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card_signup">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="images/SupplementLogo.jpg" class="brand_logo" alt="Logo">
					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
					<form action = "" method="post">
					<div class="input-group mb-3" >
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-at"></i></span>
							</div>
							<input type="email" name="email" class="form-control input_user" 
								value="<?php echo $_POST["email"]; ?>" 
								placeholder="Email" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							<input type="text" name="signup_full_name" class="form-control input_user" 
								value="<?php echo $_POST["signup_full_name"]; ?>" 
								placeholder="Họ và tên" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="signup_password" class="form-control input_pass" 
								value="<?php echo $_POST["signup_password"]; ?>" 
								placeholder="Mật khẩu" required>
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" name="signup_cpassword" class="form-control input_pass" 
								value="<?php echo $_POST["signup_cpassword"]; ?>" 
								placeholder="Xác nhận mật khẩu">
						</div>
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-address-card"></i></span>
							</div>
							<input type="text" name="company" class="form-control input_user" 
								value="<?php echo $_POST["company"]; ?>" 
								placeholder="Tên Công ty">
						</div>
						<div class="input-group mb-4">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-phone"></i></span>
							</div>
							<input type="text" name="phone_number" class="form-control input_user" 
								value="<?php echo $_POST["phone_number"]; ?>" 
								placeholder="Số điện thoại" required>
						</div>
					<div class="d-flex justify-content-center mb-2 login_container">
				 		<input type="submit" name="signup" class="btn login_btn" value="Đăng ký">
				   </div>
				   <div class="d-flex justify-content-center mb-3 login_container">
				 		<a href="signin.php" class="btn login_btn">Chuyển trang đăng nhập</a>
				   </div>
					</form>
				</div>
	
			</div>
		</div>
	</div>
</body>
</html>