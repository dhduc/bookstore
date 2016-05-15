<meta charset="utf-8" />
<?php
include '../config.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$time = date('Y-m-d', time());
//check email
$isExisted=mysql_num_rows(mysql_query("select * from member where email='$email'"));
if($isExisted>0){
	?>
    <script>
	alert("Email đã tồn tại !");
	window.location="<?php echo HOME?>";
	</script>
    <?php
	}
//end

$sql = "
INSERT INTO member(email, password, fullname, phone, create_time) 
VALUES ('$email', '$password', '$name', '$phone', '$time')
";
$isDone=mysql_query($sql);
//var_dump($isDone);
if($isDone==1){
	?>
	<script language='javascript'>
	alert('Đăng kí thành công !\nVui lòng đăng nhập !');
	window.location="http://117.6.160.54:8080/bookstore";
	</script>
	
	<?php
	//header("Location: ".HOME."");  

	}
	else{
		?>
        <script language='javascript'>
	alert('Đăng kí thất bại !\nVui lòng thử lại !');
	window.location="http://117.6.160.54:8080/bookstore";
	</script>
        <?php
		}
?>            

<?php mysql_close(); ?>