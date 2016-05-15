<h2 class='text-info'>Orders</h2>
<?php
  
  $str = "SELECT * 
FROM  `order`";
//  echo $str;
  $pre = mysql_query($str);
  $num = mysql_num_rows($pre);
  

  $post = 10; 
  $page = 1; 
  $count = ceil($num/$post); 
  if(isset($_GET['post_id'])) {
    $page = $_GET['post_id'];
  }
  if($page){
    $start = ($page-1)*$post; 
  }
  else {
    $start = 0;
  }


  $sql = "SELECT * 
FROM  `order` limit $start, $post";
  $result = mysql_query($sql);
  
  echo "<table width=2000 cellpadding=20 cellspacing=20 >
      <th align='center'>STT</th>
      <th align='center'>Mã đơn hàng</th>
      <th align='center'>Mã hàng</th>
      <th align='center'>SĐT</th>
      <th align='center'>Họ & tên</th>
      <th align='center'>Địa chỉ</th>
      <th align='center'>Số lượng</th>
	   <th align='center'>Thành tiền</th>
	    <th align='center'>Trạng thái</th>
		<th align='center'>Sửa</th>
		<th align='center'>Xóa</th>
      
     ";
  $i = $start;
  while($row = mysql_fetch_row($result)) {
    $i++;
    echo "<tr>";
    echo "
        <td>".$i."</td>
        <td><a href='#'>".ucwords($row[0])."</a></td>
      <td><a href='#'>".$row[1]."</a></td>
       ";
    
echo "
<td><a href='#'>".$row[2]."</a></td>
<td><a href='#'>".$row[3]."</a></td>
<td><a href='#'>".$row[4]."</a></td>
<td><a href='#'>".$row[5]."</a></td>
<td><a href='#'>".$row[6]."</a></td>
<td><a href='#'>".$row[7]."</a></td>
<td><a href='order.php?action=update&orderID={$row[0]}'>Cập nhật</a></td>
<td><a href='order.php?action=delete&orderID={$row[0]}'>Xóa</a></td>
";
    echo "
    </tr>
    ";
    
  }
  echo "
  </table>
  <br>
  ";


  if($page > 1) {
    $first = 1;
    $prev = $page - 1;
    echo "<a href='{$_SERVER['PHP_SELF']}?post_id=$first' id='pagi'>First</a>";
    echo "<a href='{$_SERVER['PHP_SELF']}?post_id=$prev' id='pagi'>Prev</a>";
  }
  for($i = 1; $i<$count+1; $i++){
    
      if($i>1){
        if($i == $page){
              echo "<span>$i</span>";
            }
            else {
              echo "<a href='{$_SERVER['PHP_SELF']}?post_id=$i' id='pagi'>$i</a>";
            }
      }
    
  }
  
  if($page < $count){
    $next = $page +1;;
    echo "<a href='{$_SERVER['PHP_SELF']}?post_id=$next' id='pagi'>Next</a>";
    echo "<a href='{$_SERVER['PHP_SELF']}?post_id=$count' id='pagi'>Last</a>";
  }
  
?>
<?php mysql_close(); ?>
<br>
