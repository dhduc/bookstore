<h2 class='text-info'>Danh sách các liên hệ</h2>

<?php
  
  $str = "select * from contact";
  $pre = mysql_query($str);
  $num = mysql_num_rows($pre);
  

  $post = 10; 
  $page = 1; 
  $count = ceil($num/$post); 
  if(isset($_GET['contact_id'])) {
    $page = $_GET['contact_id'];
  }
  if($page){
    $start = ($page-1)*$post; 
  }
  else {
    $start = 0;
  }


  $sql = "select * from contact limit $start, $post";
  $result = mysql_query($sql);
  
  echo "<table width=500 cellpadding=20 cellspacing=20 >
      <th>STT</th>
      <th>Tên</th>
      <th>Email̉</th>      
      <th>Web̉</th>      
     ";
  $i = $start;
  while($row = mysql_fetch_array($result)) {
    $i++;
    echo "<tr>";
    echo "
        <td>".$i."</td>
        <td>".$row['name']."</td>
        <td>".ucwords($row['email'])."</td>
        <td><a href='contact.php?cat=view&contact_id={$row['contact_id']}'>Chi tiết</a></td>
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