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
    <table border="0" with="100%">
      <tr>
        <td colspan="2"><h3 class='text-info'>Thông tin cá nhân</h3>
          <hr color="red"/></td>
      </tr>
      <tr>
        <th align="left"> <p>Họ tên: </p></th>
        <td align="left"><p><?php echo $rows['fullname']; ?></p></td>
      </tr>
      <tr>
        <th align="left"> <p>Email: </p></th>
        <td align="left"><p><?php echo $rows['email']; ?></p></td>
      </tr>
      <tr>
        <th align="left"> <p>Số điện thoại: &nbsp;</p></th>
        <td align="left"><p> <?php echo $rows['phone']; ?></p></td>
      </tr>
      <tr>
        <th align="left" colspan="2"><input class="btn btn-primary btn-xs" data-toggle="offcanvas" type="button" value="Cập nhật thông tin" onclick="window.location='update.php'"/></th>
        
      </tr>
      <tr>
      <td colspan="2"><hr color="#FF0000" /></td>
      </tr>
    </table>
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