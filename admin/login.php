<?php
include("../config.php");
session_start();
$error = '';
if($_SERVER["REQUEST_METHOD"] == "POST")
{

	$myusername=mysql_real_escape_string($_POST['username']); 
	$mypassword=mysql_real_escape_string($_POST['password']); 


	$sql="SELECT id FROM admin WHERE username='$myusername' and passcode='$mypassword'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);

	$count=mysql_num_rows($result);


	if($count==1)
	{
		session_start();
		$_SESSION['login_user']=$myusername;

		header("location: admin.php");
	}
	else 
	{
		$error="Tên đăng nhập hoặc mật khẩu sai .";
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
					<label><b>Tên đăng nhập :</b></label><input type="text" name="username" class="box" required placeholder="Nhập tên đăng nhập"/><br /><br />
					<label><b>Mật khẩu :</b></label><input type="password" name="password" class="box" required placeholder="Nhập mật khẩu"/><br/><br />
					<a href="resetPassword.php"><i class='icon-question-sign'></i> Quên mật khẩu</a><br /><br />
					<center><input class='btn btn-info' type="submit"           value="Đăng nhập"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class='btn btn-info' type="button" value="  Hủy bỏ " onClick="window.location.href='<?php echo HOME?>'"></center><br />

				</form>
				<div style="font-size:11px; color:#cc0000; margin-top:10px; text-align:center;font-weight:bold;"><?php echo $error; ?></div>
			</div>
		</div>
	</div>

</body>
</html>
