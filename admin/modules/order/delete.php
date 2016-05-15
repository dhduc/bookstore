<?php
 	$id = $_GET['orderID'];
    $sql = "
      delete from `order` where order_id = {$id} 
    ";
    $isDone=mysql_query($sql);
	if($isDone==1){
	?>
<script>
	alert("Đã xóa !");
	window.location="<?php echo ADMIN.'/order.php';?>";
	</script>
<?php
	}else{
		?>
<script>
	alert("Đã thất bại!");
	window.location="<?php echo ADMIN.'/order.php';?>";
	</script>
<?php
		}
   

  
?>