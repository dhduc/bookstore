
<?php
include('lock.php');
include('layout/header.php');
?>

<?php
if(isset($_POST['btAdd'])){
	$username=$_POST['username'];
	$passcode=$_POST['passcode'];
	$hoten=$_POST['hoten'];
	$ngaysinh=$_POST['ngaysinh'];
	$sdt=$_POST['sdt'];
	$email=$_POST['email'];
	$diachi=$_POST['diachi'];
	
	$sql="
	INSERT INTO `admin`(`username`, `passcode`, `hoten`, `ngaysinh`, `sdt`, `email`, `diachi`) VALUES ('$username','$passcode','$hoten','$ngaysinh','$sdt','$email','$diachi')
	";
	//echo $sql;
	$isDone=mysql_query($sql);
	if($isDone==1){
		?>
        <script>
		alert("Thêm thành công !");
		
		</script>
        <?php
		}else
		{
			?>
            <script>
		alert("Thêm thất bại !");
		
		</script>
            <?php
			
			}
	
	
	}


?>


<div class="col-sm-9 col-md-10 main">
<h2 class='text-info'><p align="center"><b>Danh mục quản trị viên</b></p></h2>


<form action="" method="post">
<center>
  <table border="0">
    <tr>
    <th align="left">Tên đăng nhập:*</th><td><input type="text" name="username" required="required" placeholder="Nhập tên đăng nhập"/></td>
    </tr>
    <tr>
    <th align="left">Mật khẩu:*</th><td><input type="password" name="passcode" required="required" placeholder="Nhập mật khẩu"/></td>
    </tr>
      <tr>
    <th align="left">Họ & tên:*</th><td><input type="text" name="hoten" required="required" placeholder="Nhập họ tên"/></td>
    </tr>
    <tr>
    <th align="left">Ngày sinh:*</th><td><input type="date" name="ngaysinh" required="required" placeholder="Nhập ngày sinh"/></td>
    </tr>
     <tr>
    <th align="left">Số điện thoại:*</th><td><input type="text" name="sdt" required="required" placeholder="Nhập số điện thoại"/></td>
    </tr>
     <tr>
    <th align="left">Email:*</th><td><input type="email" name="email" required="required" placeholder="Nhập địa chỉ email"/></td>
    </tr>
    <tr>
    <th align="left">Địa chỉ:*</th><td><textarea name="diachi" required="required" placeholder="Nhập địa chỉ" cols="10"></textarea></td>
    </tr>
     <tr>
    <th colspan="2"><center><input class="btn btn-info" type="submit" value="Thêm" name="btAdd"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-info" name  ="reset" type="reset"/></center></td>
    </tr>

  </center>  </table>

  </form>
  <br/>

</div><!--/row-->
<?php include 'layout/footer.php'; ?>