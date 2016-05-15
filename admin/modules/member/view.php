
<?php
    $id = $_GET['member_id'];
    
      $row = mysql_fetch_array(mysql_query("select id,email,password,fullname,phone,DATE_FORMAT(create_time,'%d-%m-%Y') as 'create_time' from member where id = '$id' "));  
    

?>

               
<h3 class='text-info'>Thông tin thành viên</h3>
<table width="933" height="300" border="0" align="center">
  <tr>
    <td><b>ID:</b></td>
    <td>
      <input type='text' name='' readonly="readonly" value='<?php echo $row['id']; ?>'>
    </td>
  </tr>
  <tr>
    <td><b>Email:</b></td>
    <td>
      <input type='text' name='' readonly="readonly" value='<?php echo $row['email']; ?>'>
    </td>
  </tr>
  <tr>
    <td><b>Password:</b></td>
    <td>
      <input type='text' name='' readonly="readonly" value='<?php echo $row['password']; ?>'>
    </td>
  </tr>
  <tr>
    <td><b>Tên người dùng:</b></td>
    <td>
      <input type='text' name='' readonly="readonly" value='<?php echo $row['fullname']; ?>'>
    </td>
  </tr>
  <tr>
    <td><b>Số điện thoại:</b></td>
    <td>
      <input type='text' name='' readonly="readonly" value='<?php echo $row['phone']; ?>'>
    </td>
  </tr>
  <tr>
    <td><b>Ngày đăng kí:</b></td>
    <td>
      <input type='text' name='' readonly="readonly" value='<?php echo $row['create_time']; ?>'>
    </td>
  </tr>
</table>

<h3 align="center">Sản phẩm đã mua</h3>
<?php
  $sql = "SELECT post.id, order.order_id, post.name, order.soluong, post.price, (
order.soluong * post.price
) AS  'total'
FROM  `order` 
INNER JOIN post ON order.product_id = post.id
WHERE trangthai =  'Đã giao hàng'
AND sodt =  '{$row['phone']}'";
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

<?php mysql_close(); ?>