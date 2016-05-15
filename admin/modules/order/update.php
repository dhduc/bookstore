<h2 class='text-info'>Sửa thông tin sách</h2>
<?php
$id="";
if(isset($_GET['orderID'])){ 
  $id = $_GET['orderID'];
        $row = mysql_fetch_array(mysql_query("SELECT * 
FROM  `order` where order_id = '$id' "));  

 }
    
?>
<?php
  if(isset($_POST['btUpdateOrder'])){
    $status = $_POST['status']; 
	$sql="UPDATE `order` SET `trangthai`='{$status}' WHERE `order_id`=$id";
	mysql_query($sql);
	$soluong=$row[5];
	$bookid=$row[1];
	if($status=="Đã giao hàng"){
	$query="update post set soluong=(soluong-{$soluong}) where id=$bookid";
	//echo $query;
	mysql_query($query);}
    header("Location: ".ADMIN."/order.php");  
    
  }
?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="933" height="437" border="0" align="center">
    <tr>
      <td width="622" valign="top"><label for="name">Mã đơn hàng:</label>
        <br/>
        <input type="text" name="oid"  id="oid" size='70' readonly="readonly" value="<?php echo $row[0]; ?>" /><br/>
        <label for="info">Mã mặt hàng:</label>
        <br/>
        <input type="text" name="pid"  id="pid" size='70' readonly="readonly" value="<?php echo $row[1]; ?>" /><br/>
      <label for="info">Số điện thoạ:</label>
      <br/>
      <input type="text" name="sdt"  id="sdt" size='70' readonly="readonly" value="<?php echo $row[2]; ?>" /><br/>
       
      <label for="info">Họ & tên:</label>
      <br/>
      <input type="text" name="ht"  id="pid" size='ht' readonly="readonly" value="<?php echo $row[3]; ?>" /><br/>
       
      <label for="info">Địa chỉ:</label>
      <br/>
      <textarea name="dc"  readonly="readonly"><?php echo $row[4]; ?></textarea>
            
      <label for="info">Số lượng:</label>
      <br/>
      <input type="text" name="sl"  id="sl" size='70' readonly="readonly" value="<?php echo $row[5]; ?>" /><br/>
       
      <label for="info">Thành tiền:</label>
      <br/>
      <input type="text" name="tt"  id="tt" size='70' readonly="readonly" value="<?php echo $row[6]; ?>" /><br/>
       
      <label for="info">Trạng thái:</label>
      <br/>
      <select name="status">
        <option value="Chờ xác nhận">Chờ xác nhận</option>
        <option value="Đã xác nhận">Đã xác nhận</option>
        <option value="Đã giao hàng">Đã giao hàng</option>
        <option value="Hủy">Hủy</option>
      </select><br/>
      <br/>
    <input type="submit" name="btUpdateOrder" value="Xác nhận" class="btn btn-primary btn-xs" data-toggle="offcanvas"/>
      <td>
    </tr>
  </table>
</form>
<?php mysql_close(); ?>
