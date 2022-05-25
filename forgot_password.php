<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$mail = new PHPMailer();
include 'config.php';
error_reporting(0);
session_start();

if (isset($_SESSION["user_id"])) {
  header("Location: Welcome.php");
}

if (isset($_POST["resetPassword"])) {
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
  
	if (mysqli_num_rows($check_email) > 0) {
		$data = mysqli_fetch_assoc($check_email);
		
		$mail->SMTPDebug = 3;                               
		$mail->isSMTP();                                 
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true;                           
		$mail->Username = "jeffhardy01263954699@gmail.com";                 
		$mail->Password = "dakqncshmprmhzca";                           
		$mail->SMTPSecure = "tls";                           
		$mail->Port = 587;                                   

		$mail->From = "tdtuclassroom@tdtu.edu.vn";
		$mail->FromName = "Quang Huy";

		$mail->addAddress("$email", "$full_name");

		$mail->isHTML(true);

		$mail->Subject = "Dat Lai Mat Khau";
		$mail->Body = "<p><strong>Chào {$data['full_name']},</strong></p>
		<p>Bạn quên mật khẩu? Bạn hãy bấm vào link bên dưới để đặt lại mật khẩu nhé.</p>
		<p><a href='http://localhost/DietarySupplement/reset_password.php?token={$data['token']}'>Đặt lại mật khẩu</a></p>";
		$mail->Send();
	
		echo "<script>alert('Email đã được gửi đến - {$email}.');window.location.href='signin.php';</script></script>";
	} 
	else {
		echo "<script>alert('Email bạn nhập không tồn tại trong dữ liệu của chúng tôi');</script>";
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
					<div class="input-group mb-3" >
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-at"></i></span>
							</div>
							<input type="email" name="email" class="form-control input_user" value="<?php echo $_POST["email"]; ?>" placeholder="Nhập email" required>
						</div>
							<div class="d-flex justify-content-center mt-5 login_container">
				 	<input type="submit" name="resetPassword" class="btn login_btn" value="Gửi email xác nhận">
				   </div>
					</form>
				</div>
	
			</div>
		</div>
	</div>
</body>
</html>