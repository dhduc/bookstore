<h2 class='text-info'>Danh sách thành viên</h2>

<?php
  
  $str = "select * from member";
  $pre = mysql_query($str);
  $num = mysql_num_rows($pre);
  

  $post = 10; 
  $page = 1; 
  $count = ceil($num/$post); 
  if(isset($_GET['member_id'])) {
    $page = $_GET['member_id'];
  }
  if($page){
    $start = ($page-1)*$post; 
  }
  else {
    $start = 0;
  }


  $sql = "select * from member limit $start, $post";
  $result = mysql_query($sql);
  
  echo "<table width=500 cellpadding=20 cellspacing=20 >
      <th>STT</th>
      <th>Email</th>
      <th>Tên đầy đủ</th>      
      <th>Thông tin̉</th>   
	  <th>Xóa</th>   
     ";
  $i = $start;
  while($row = mysql_fetch_array($result)) {
    $i++;
    echo "<tr>";
    echo "
        <td>".$i."</td>
        <td>".$row['email']."</td>
        <td>".ucwords($row['fullname'])."</td>
        <td><a href='member.php?cat=view&member_id={$row['id']}'>Chi tiết</a></td>
		 <td><a href='member.php?cat=delete&member_id={$row['id']}'>Xóa</a></td>
       ";
     
    
    echo "</tr>";
    
  }
  echo "</table><br>";


  if($page > 1) {
    $first = 1;
    $prev = $page - 1;
    echo "<a href='{$_SERVER['PHP_SELF']}?member_id=$first' id='pagi'>First</a>";
    echo "<a href='{$_SERVER['PHP_SELF']}?member_id=$prev' id='pagi'>Prev</a>";
  }
  for($i = 1; $i<$count+1; $i++){
    
      if($i>1){
        if($i == $page){
              echo "<span>$i</span>";
            }
            else {
              echo "<a href='{$_SERVER['PHP_SELF']}?member_id=$i' id='pagi'>$i</a>";
            }
      }
    
  }
  
  if($page < $count){
    $next = $page +1;;
    echo "<a href='{$_SERVER['PHP_SELF']}?member_id=$next' id='pagi'>Next</a>";
    echo "<a href='{$_SERVER['PHP_SELF']}?member_id=$count' id='pagi'>Last</a>";
  }
  
?>

<?php mysql_close(); ?>