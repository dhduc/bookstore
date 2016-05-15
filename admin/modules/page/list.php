<h2 class='text-info'>Danh sách trang</h2>

<?php
  
  $str = "select * from page";
  $pre = mysql_query($str);
  $num = mysql_num_rows($pre);
  

  $post = 10; 
  $page = 1; 
  $count = ceil($num/$post); 
  if(isset($_GET['page_id'])) {
    $page = $_GET['page_id'];
  }
  if($page){
    $start = ($page-1)*$post; 
  }
  else {
    $start = 0;
  }


  $sql = "select * from page limit $start, $post";
  $result = mysql_query($sql);
  
  echo "<table width=500 cellpadding=20 cellspacing=20 >
      <th>STT</th>
      <th>Tên trang</th>
      <th>Người đăng</th>      
      <th>Xem</th>
      <th>Trạng thái</th>
      <th>Sửa</th>
      <th>Xóa</th>
      
     ";
  $i = $start;
  while($row = mysql_fetch_array($result)) {
    $i++;
    echo "<tr>";
    echo "
        <td>".$i."</td>
        <td><a href='page.php?cat=view&page_id={$row['page_id']}'>".ucwords($row['page_name'])."</a></td>
        <td>".$row['page_author']."</td>
       ";
     
    echo "
        <td><a target='_blank' href='".HOME."/page.php?page_name={$row['page_name']}'>".ucwords($row['page_name'])."</a></td>   
        <td>".$row['page_status']."</td>
        <td>
        <a href='page.php?cat=update&page_id={$row[0]}'>Edit</a>
        
        </td>
        <td><a href='page.php?cat=delete&page_id={$row[0]}'>Delete</a></td>
       ";
    echo "</tr>";
    
  }
  echo "</table><br>";


  if($page > 1) {
    $first = 1;
    $prev = $page - 1;
    echo "<a href='{$_SERVER['PHP_SELF']}?page_id=$first' id='pagi'>First</a>";
    echo "<a href='{$_SERVER['PHP_SELF']}?page_id=$prev' id='pagi'>Prev</a>";
  }
  for($i = 1; $i<$count+1; $i++){
    
      if($i>1){
        if($i == $page){
              echo "<span>$i</span>";
            }
            else {
              echo "<a href='{$_SERVER['PHP_SELF']}?page_id=$i' id='pagi'>$i</a>";
            }
      }
    
  }
  
  if($page < $count){
    $next = $page +1;;
    echo "<a href='{$_SERVER['PHP_SELF']}?page_id=$next' id='pagi'>Next</a>";
    echo "<a href='{$_SERVER['PHP_SELF']}?page_id=$count' id='pagi'>Last</a>";
  }
  
?>

<?php mysql_close(); ?>
<br>
          <a href="page.php?cat=insert" class="btn btn-info">Thêm</a>