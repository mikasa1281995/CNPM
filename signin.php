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
				<div class="user_card_signin">
					<div class="d-flex justify-content-center">
						<div class="brand_logo_container">
							<img src="images/SupplementLogo.jpg" class="brand_logo" alt="Logo">
						</div>
					</div>
					<div class="d-flex justify-content-center form_container">
						<form action="" method="post">
						<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-at"></i></span>
								</div>
								<input type="email" name="login_email" class="form-control input_user" 
									value=" <?php if(isset($_POST['login_email'])){echo $_POST["login_email"];} 
									else if(isset($_COOKIE["login_email"])) { echo $_COOKIE["login_email"]; } ?>" 
									placeholder="Email" required>
							</div>
							<div class="input-group mb-3">
								<div class="input-group-append">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="password" name="password" class="form-control input_pass" 
									value="<?php if (isset($_POST['password'])){echo $_POST["password"];}
									else if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" 
									placeholder="Mật khẩu" required>
							</div>
							<div class="form-group">
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="remember_checkbox" class="custom-control-input" id="customControlInline" 
										<?php if(isset($_COOKIE["login_email"])) { ?> checked <?php } ?>>
									<label class="custom-control-label" for="customControlInline">Nhớ mật khẩu</label>
								</div>
							</div>
								<div class="d-flex justify-content-center mt-3 login_container">
								<input type="submit" name="signin" class="btn login_btn" value="Đăng nhập">
					</div>
						</form>
					</div>
					<div class="mt-4">
						<div class="d-flex justify-content-center links">
							Bạn chưa có tài khoản? <a href="signup.php" class="ml-2">Đăng ký</a>
						</div>
						<div class="d-flex justify-content-center links">
							<a href="forgot_password.php">Quên mật khẩu?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		</div>
</body>
</html>