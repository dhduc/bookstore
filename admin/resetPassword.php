<?php
include("../config.php");

$error = '';
if(isset($_POST['btSubmit'])){
$email=$_POST['tbEmail'];
	$sql="SELECT id FROM admin WHERE email='$email'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);

	$count=mysql_num_rows($result);


	if($count==1)
	{
		//session_start();
		//$_SESSION['login_user']=$myusername;
		?>
		<script>
        alert("Buy More đã gửi email thay đổi mật khẩu. Vui lòng kiểm tra hộp thư đến của bạn.");
		window.location="login.php";
        </script>
		<?php

		//header("location: login.php");
	}
	else 
	{
		$error="Địa chỉ email không tồn tại. Vui lòng kiểm tra lại.";
	}
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
	<title>Buy More Administrator Panel</title>
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />

</head>
<body>

	<div align="center">
		<div style="width:300px; margin-top: 50px; " align="left">
			<div class='grid logo'>
				<a href="<?=HOME?>">
					<span id='book'>BUY</span>
					<span id='store'>MORE</span>
				</a>
			</div>


			<div style="margin:30px">

				<form action="" method="post">
					<label><b>Địa chỉ email :</b></label><input type="email" name="tbEmail" class="box" required placeholder="Nhập email xác thực"/><br /><br />
					<center><input class='btn btn-info' type="submit" name='btSubmit'          value="Xác nhận"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class='btn btn-info' type="button" value="  Hủy bỏ " onClick="window.location.href='<?php echo HOME?>'"></center><br />

				</form>
				<div style="font-size:11px; color:#cc0000; margin-top:10px; text-align:center;font-weight:bold;"><?php echo $error; ?></div>
			</div>
		</div>
	</div>

</body>
</html>
