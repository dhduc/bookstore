<?php
include('lock.php');
include('layout/header.php');
?>
<?php
if(isset($_GET['action'])&&isset($_GET['id'])){
	$id=$_GET['id'];
	$isDeleted=mysql_query("DELETE FROM `ads` WHERE `ads_id`=$id");
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
$result_set=mysql_query("SELECT * FROM `ads` WHERE 1");


?>


<div class="col-sm-9 col-md-10 main">
<h2 class='text-info'>
  <p align="center"><b>Danh mục quảng cáo</b></p>
</h2>
  <table width="100%" border="1">
    <tr>
      <td align="center">STT</td>
      
      
      
      
      <td align="center">ID</td>
      <td align="center">Provider</td>
      <td align="center">Link</td>    
      <td align="center">Image path</td>
      <td align="center">State</td>
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
      <td><a href='$row[2]' target='_blank'> $row[1] </a></td>
      <td><a href='$row[2]' target='_blank'>$row[2]</a></td>
      <td><a href='$row[3]' target='_blank'>$row[3]</a></td> 
	  <td>$row[4]</td>      
	   <td><a href=\"updateAds.php?id=$row[0]\">Update</a></td>
	   <td><a href=\"ads.php?action=delete&id=$row[0]\">Delete</a></td>
    </tr>
	";
	}
	?>
  </table>
  <br/>
  <a href="newAds.php" class="btn btn-info">Thêm quảng cáo</a> </div>
<!--/row-->
<?php include 'layout/footer.php'; ?>