<?php

include 'Config.php';
session_start();
error_reporting(0);


if (isset($_SESSION["user_id"])){
	header("Location: Welcome.php");
}

if (isset($_POST["signup"])){
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$full_name = mysqli_real_escape_string($conn, $_POST["signup_full_name"]);
	$password = mysqli_real_escape_string($conn, md5($_POST["signup_password"]));
	$cpassword = mysqli_real_escape_string($conn, md5($_POST["signup_cpassword"]));
	$company = mysqli_real_escape_string($conn, $_POST["company"]);
	$phone_number = mysqli_real_escape_string($conn, $_POST["phone_number"]);
	$token = md5(rand());
	$lv = 'Đại Lý';
	$check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM users WHERE email='$email'"));
	if ($password !== $cpassword){
		echo "<script>alert('Xác nhận mật khẩu không trùng khớp.');</script>";
	} 
	elseif ($check_email > 0) {
		echo "<script>alert('Email bạn vừa nhập đã tồn tại.');</script>";
	}
	else{
		$sql = "INSERT INTO users (full_name,email,password,token,lv,company,phone_number) 
		VALUES ('$full_name','$email','$password','$token','$lv','$company','$phone_number') ";
		$result = mysqli_query($conn, $sql);
		if ($result){
			$_POST["email"]= "";
			$_POST["signup_full_name"]= "";
			$_POST["signup_password"]= "";
			$_POST["signup_cpassword"]= "";
			$_POST["company"]= "";
			$_POST["phone_number"]= "";
			echo "<script>alert('Chúc mừng bạn đã đăng ký thành công.');
			window.location.href='signin.php';</script>";
		} else {
			echo "<script>alert('Đăng ký thất bại.');</script>";
		}
	}
}

if (isset($_POST["signin"])){
	$email = mysqli_real_escape_string($conn, $_POST["login_email"]);
	$passwordnonmd5 = mysqli_real_escape_string($conn, $_POST["password"]);
	$password = md5($passwordnonmd5);
	$check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'");

	if (mysqli_num_rows($check_email) > 0)  {
		$row = mysqli_fetch_assoc($check_email);
		$_SESSION["user_id"] = $row['id'];
		$_SESSION["name"] = $row['full_name'];
		$_SESSION["lv"] = $row['lv'];
		// if ($_SESSION["lv"] == 'admin'){
		// 	header("Location: admin.php");
		// }
		if (!empty($_POST['remember_checkbox'])){
			$checkbox = $_POST['remember_checkbox'];
			setcookie('login_email',$email,time()+3600*24*7);
			setcookie('password',$passwordnonmd5,time()+3600*24*7);
		}
		else{
			setcookie('login_email','');
			setcookie('password','');
		}
		// if ($_SESSION["lv"] == 'Đại Lý'){
		// header("Location: welcome.php");
		// }
		header("Location: Welcome.php");
	} else {

		echo "<script>alert('Thông tin đăng nhập không đúng.');</script>";
	}
}



?>
