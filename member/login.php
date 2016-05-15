<meta charset="utf-8" />
<?php
include("../config.php");
session_start();
$error = '';

$myemail=mysql_real_escape_string($_POST['email']); 
$mypassword=mysql_real_escape_string($_POST['password']); 

$sql="SELECT id FROM member WHERE email='$myemail' and password='$mypassword'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

$count=mysql_num_rows($result);

if($count==1){
	session_start();
	$_SESSION['login_member']=$myemail;

	header("location: ".HOME."/member/member.php");
}
else {
	$error="Your Login Name or Password is invalid";
	?>
    <script>
     alert("Đăng nhập thất bại !\n Vui lòng kiểm tra lại email hoặc mật khẩu.");
   window.location="<?php echo HOME;?>";
    </script>
   
    
    <?
}

?>


