
<?php
include('lock.php');
include('layout/header.php');
?>

<?php
$id="";
	$username="";
	$passcode="";
	$hoten="";
	$ngaysinh="";
	$sdt="";
	$email="";
	$diachi="";
if(isset($_GET['id'])){
	$result_set=mysql_query("SELECT  `id` ,  `username`  ,  `hoten` , `ngaysinh` ,  `sdt` ,  `email` ,  `diachi` 
FROM  `admin` where `id`=".$_GET['id']);
	$id=$_GET['id'];
while($row=mysql_fetch_array($result_set)){
	$username=$row[1];	
	$hoten=$row[2];	
	$ngaysinh=$row[3];	
	$sdt=$row[4];	
	$email=$row[5];	
	$diachi=$row[6];	
	}
}
?>
<?php	
if(isset($_POST['btUpdate'])){	
$id=$_POST['tbID'];
	$passcode=$_POST['passcode'];
	$hoten=$_POST['hoten'];
	$ngaysinh=$_POST['ngaysinh'];
	$sdt=$_POST['sdt'];
	$email=$_POST['email'];
	$diachi=$_POST['diachi'];
	$sql="
	update `admin` set `passcode`='$passcode', `hoten`='$hoten', `ngaysinh`='$ngaysinh', `sdt`='$sdt', `email`='$email', `diachi`='$diachi' where `id`=$id
	";
	//echo $sql;
	$isDone=mysql_query($sql);
	if($isDone==1){
		?>
        <script>
		alert("Cập thành công !");
		window.location="newAdministrator.php";
		</script>
        <?php
		}else
		{
			?>
            <script>
		alert("Câp thất bại !");
		
		</script>
            <?php
			
			}
	
	
	}


?>



<h2 class='text-info'><p align="center"><b>Danh mục quản trị viên</b></p></h2>
<div class="col-sm-9 col-md-10 main">

<form action="updateAdministrator.php" method="post">
<center>
  <table border="0">
   <tr>
    <th align="left">ID:*</th><td><input type="text" name="tbID" required placeholder="Nhập ID" readonly value="<?php echo $id?>"/></td>
    </tr>
    <tr>
    <tr>
    <th align="left">Tên đăng nhập:*</th><td><input type="text" name="username" required placeholder="Nhập tên đăng nhập" readonly value="<?php echo $username?>"/></td>
    </tr>
    <tr>
    <th align="left">Mật khẩu:*</th><td><input type="password" name="passcode" required placeholder="Nhập mật khẩu"/></td>
    </tr>
      <tr>
    <th align="left">Họ & tên:*</th><td><input type="text" name="hoten" required placeholder="Nhập họ tên" value="<?php echo $hoten?>"/></td>
    </tr>
    <tr>
    <th align="left">Ngày sinh:*</th><td><input type="date" name="ngaysinh" required placeholder="Nhập ngày sinh" value="<?php echo $ngaysinh?>"/></td>
    </tr>
     <tr>
    <th align="left">Số điện thoại:*</th><td><input type="text" name="sdt" required placeholder="Nhập số điện thoại" value="<?php echo $sdt?>"/></td>
    </tr>
     <tr>
    <th align="left">Email:*</th><td><input type="email" name="email" required placeholder="Nhập địa chỉ email" value="<?php echo $email?>"/></td>
    </tr>
    <tr>
    <th align="left">Địa chỉ:*</th><td><textarea name="diachi" required placeholder="Nhập địa chỉ" cols="10" ><?php echo $diachi?></textarea></td>
    </tr>
     <tr>
    <th colspan="2"><center><input class="btn btn-info" type="submit" value="Cập nhật" name="btUpdate"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="btn btn-info" name  ="reset" type="reset"/></center></td>
    </tr>

  </center>  </table>

  </form>
  <br/>

</div><!--/row-->
<?php include 'layout/footer.php'; ?>