<?php
include('lock.php');
include('layout/header.php');
?>
<?php
if(isset($_GET['action'])&&isset($_GET['id'])){
	$id=$_GET['id'];
	$isDeleted=mysql_query("DELETE FROM `admin` WHERE `id`=$id");
	if($isDeleted==1){
		?>
<script>
		alert("Đã xóa !");
		</script>
<?
		}else{
			?>
<script>
		alert("Xóa thất bại !");
		</script>
<?php
			}
	}
?>
<?php
$result_set=mysql_query("SELECT  `id` ,  `username` ,  `passcode` ,  `hoten` , DATE_FORMAT(  `ngaysinh` ,  '%d-%m-%Y' ) AS  `ngaysinh` ,  `sdt` ,  `email` ,  `diachi` 
FROM  `admin` ");


?>


<div class="col-sm-9 col-md-10 main">
<h2 class='text-info'>
  <p align="center"><b>Danh mục quản trị viên</b></p>
</h2>
  <table width="100%" border="1">
    <tr>
      <td align="center">STT</td>
      <td align="center">ID</td>
      <td align="center">Username</td>
      <td align="center">Full name</td>
      <td align="center">Birthday</td>
      <td align="center">Phone number</td>
      <td align="center">Email</td>
      <td align="center">Address</td>
      <td align="center"></td>
      <!-- update-->
      <td align="center"></td>
      <!-- delete--> 
    </tr>
    <?php
	$i=0;
	while($row=mysql_fetch_array($result_set)){
		$i++;
	echo "
    <tr>
      <td>$i</td>
      <td>$row[0]</td>
      <td>$row[1]</td>
      <td>$row[3]</td>
      <td>$row[4]</td>
      <td>$row[5]</td>
      <td><a href=\"mailto:$row[6]\">$row[6]</a></td>
      <td>$row[7]</td>
	   <td><a href=\"updateAdministrator.php?id=$row[0]\">Update</a></td>
	   <td><a href=\"adminPage.php?action=delete&id=$row[0]\">Delete</a></td>
    </tr>
	";
	}
	?>
  </table>
  <br/>
  <a href="newAdministrator.php" class="btn btn-info">Thêm</a> </div>
<!--/row-->
<?php include 'layout/footer.php'; ?>