<h2 class='text-info'>Products</h2>

<?php
  
  $str = "select * from post";
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


  $sql = "select * from post limit $start, $post";
  $result = mysql_query($sql);
  
  echo "<table width=500 cellpadding=20 cellspacing=20 >
      <th align='center'>STT</th>
      <th align='center'>Tên sách</th>
      <th align='center'>Tác giả</th>
      <th align='center'>Danh mục</th>
      <th align='center'>Trạng thái</th>
	  <th align='center'>Số lượng</th>
      <th align='center'></th>
      <th align='center'></th>
      
     ";
  $i = $start;
  while($row = mysql_fetch_row($result)) {
    $i++;
    echo "<tr>";
    echo "
        <td>".$i."</td>
        <td><a href='post.php?cat=view&post_id={$row[0]}'>".ucwords($row[1])."</a></td>
        <td>".$row[3]."</td>
       ";
     
    echo "    
        <td>".$row[4]."</td>
        <td>".$row[9]."</td>
		<td>".$row[10]."</td>
        <td>
        <a href='post.php?cat=update&post_id={$row[0]}'><img src='edit.png' alt='Sửa' title='Sửa'/></a>
        
        </td>
        <td><a href='post.php?cat=delete&post_id={$row[0]}'><img src='delete.png' alt='Xóa' title='Xóa'/></a></td>
       ";
    echo "</tr>";
    
  }
  echo "</table><br>";


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
<br>
          <a href="post.php?cat=insert" class="btn btn-info">Thêm</a>