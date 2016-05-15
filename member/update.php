
<?php
session_start();
include '../config.php';
  if(!isset($_SESSION['login_member'])){
    header("Location: ".HOME."");
  }
  $email = $_SESSION['login_member'];
  $sql = "select * from member where email = '$email' ";
  $cursor = mysql_query($sql);
  $rows = mysql_fetch_array($cursor);
?>
<?php 
include '../header.php';
?>
<?php
if(isset($_POST['btSubmitMemberUpdate'])){
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$sdt=$_POST['sdt'];
	$email_id=$_SESSION['login_member'];
	//echo "UPDATE `member` SET `password`='$pass',`fullname`='$name',`phone`='$sdt' WHERE email='$email_id'";
	$isUpdated=mysql_query("UPDATE `member` SET `password`='$pass',`fullname`='$name',`phone`='$sdt' WHERE email='$email_id'");
	if($isUpdated==1){
		?>
        <script>
		alert("Cập nhật thành công !");
		window.location="member.php";
		</script>
        <?php
		}
		else
		{
			?>
             <script>
		alert("Cập nhật thất bại !");
		
		</script>
            <?php
			
			}
	}
?>
<div class='nav'>
      <div id="" class="drop">
        <ul class="drop_menu">
          <li class='active'><a href='<?=HOME?>'><span><i class='icon-home icon-white'></i> Home</span></a></li>
          <?php
          $cur = mysql_query("select * from menu");
          while($row = mysql_fetch_array($cur)){
            echo "
            <li><a href='".$row['item_url']."'>".$row['item_name']."</a>
            ";
            $supper_id=$row[0];
            $sub=mysql_query("select * from submenu where item_id=".$supper_id);
            if(mysql_num_rows($sub)>0){
              echo "<ul>";
              while($row=mysql_fetch_array($sub)){
                echo "
                <li><a href='{$row[3]}'>{$row[2]}</a></li>
                ";  
              }
              echo "</ul>";
            }
            echo "</li>";
          }
          ?>
        </ul>
      </div>
    </div>
  <div class='index_view'><a href="<?php echo HOME;?>">Home </a> > <?php echo $rows['fullname']; ?> <br>
  <form action="" method="post">
  <input type="hidden" name ="email_id" value="<?php  $email?>"/>
    <table border="0" with="100%">
      <tr>
        <td colspan="2"><h3 class='text-info'>Thông tin cá nhân</h3>
          <hr color="red"/></td>
      </tr>
      <tr>
        <th align="left"> <p>Họ & tên: </p></th>
        <td align="left"><p><input type="text" name="name" value="<?php echo $rows['fullname']; ?>" required="required" placeholder="Nhập họ tên"/></p></td>
      </tr>
      <tr>
        <th align="left"> <p>Mật khẩu: </p></th>
        <td align="left"><p><input type="password" name="pass" required="required" placeholder="Nhập mật khẩu"/></p></td>
      </tr>
      <tr>
        <th align="left"> <p>Số điện thoại: &nbsp;</p></th>
        <td align="left"><p> <input type="text" name="sdt" value="<?php echo $rows['phone']; ?>" required="required" placeholder="Nhập số điện thoại"/></p></td>
      </tr>
      <tr>
        <th align="left" colspan="2"><input name="btSubmitMemberUpdate" class="btn btn-primary btn-xs" data-toggle="offcanvas" type="submit" value="Cập nhật"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" class="btn btn-primary btn-xs" data-toggle="offcanvas" type="submit" value="Làm lại"/></th>
        
      </tr>
      <tr>
      <td colspan="2"><hr color="#FF0000" /></td>
      </tr>
    </table>
    </form>
    <h3 class='text-success'>Sản phẩm đã mua</h3>
    <style type="text/css">
  table th {
    color: #314F60;
    text-align: left;
  }
</style>
    <?php
  $sql = "SELECT post.id, order.order_id, post.name, order.soluong, post.price, (
order.soluong * post.price
) AS  'total'
FROM  `order` 
INNER JOIN post ON order.product_id = post.id
WHERE trangthai =  'Đã giao hàng'
AND sodt =  '{$rows['phone']}'";
  $result = mysql_query($sql);
  
  echo "<table width='900px' cellpadding=10 cellspacing=10 >
      <th>STT</th>
      <th>Mã đơn hàng</th>
      <th>Tên sản phẩm</th>      
      <th>Số lượng</th>      
      <th>Đơn giá</th>      
      <th>Tổng tiền</th>     
      
     ";
  $i = 0;
  while($row = mysql_fetch_array($result)) {
    $i++;
    echo "<tr>";
    echo "
        <td>".$i."</td>
        <td>".$row['order_id']."</td>
        <td><a href='../view.php?id={$row[0]}' target='_blank'>".$row[2]."</a></td>
        <td>".$row[3]."</td>
        <td>".$row[4]."</td>
        <td>".$row['total']."</td>
        
       ";
     
    
    echo "</tr>";
    
  }
  echo "</table><br>";
?>
  </div>
  <br/>
  <?php include '../footer.php'; ?>