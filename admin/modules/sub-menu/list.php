<h2 class='text-info'>Danh sách các danh mục trong sub-menu</h2>

<?php
  
  $str = "select * from submenu";
  $pre = mysql_query($str);
  $num = mysql_num_rows($pre);
  

  $post = 10; 
  $page = 1; 
  $count = ceil($num/$post); 
  if(isset($_GET['item_id'])) {
    $page = $_GET['item_id'];
  }
  if($page){
    $start = ($page-1)*$post; 
  }
  else {
    $start = 0;
  }


  $sql = "select subItem_id,submenu.item_name,submenu.item_url,menu.item_name from submenu inner join menu on menu.item_id=submenu.item_id limit $start, $post";
  $result = mysql_query($sql);
  
  echo "<table width=600 cellpadding=20 cellspacing=20 >
      <th>STT</th>
      <th>Tên mục</th>
	  <th>Danh mục</th>    
      <th>Xem</th>
      <th>Sửa</th>
      <th>Xóa</th>
      
     ";
  $i = $start;
  while($row = mysql_fetch_array($result)) {
    $i++;
    echo "<tr>";
    echo "
        <td>".$i."</td>
        <td><a href='#'>".ucwords($row[1])."</a></td>
       ";//tên mục
     echo "
	 <td><a href='#'>".ucwords($row[3])."</a></td>
	 ";//tên category
    echo "
        <td><a target='_blank' href='{$row[2]}'>".ucwords($row[1])."</a></td>   
        <td>
        <a href='submenu.php?cat=update&item_id={$row[0]}&supermenu={$row[3]}&subname={$row[1]}'>Edit</a>
        
        </td>
        <td><a href='submenu.php?cat=delete&item_id={$row[0]}'>Delete</a></td>
       ";
    echo "</tr>";
    
  }
  echo "</table><br>";


  if($page > 1) {
    $first = 1;
    $prev = $page - 1;
    echo "<a href='{$_SERVER['PHP_SELF']}?item_id=$first' id='pagi'>First</a>";
    echo "<a href='{$_SERVER['PHP_SELF']}?item_id=$prev' id='pagi'>Prev</a>";
  }
  for($i = 1; $i<$count+1; $i++){
    
      if($i>1){
        if($i == $page){
              echo "<span>$i</span>";
            }
            else {
              echo "<a href='{$_SERVER['PHP_SELF']}?item_id=$i' id='pagi'>$i</a>";
            }
      }
    
  }
  
  if($page < $count){
    $next = $page +1;;
    echo "<a href='{$_SERVER['PHP_SELF']}?item_id=$next' id='pagi'>Next</a>";
    echo "<a href='{$_SERVER['PHP_SELF']}?item_id=$count' id='pagi'>Last</a>";
  }
  
?>

<?php mysql_close(); ?>
<br>
          <a href="submenu.php?cat=insert" class="btn btn-info">Thêm</a>