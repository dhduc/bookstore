<h2 class='text-info'>Danh sách các danh mục</h2>
<?php
  
  $str = "select * from category";
  $pre = mysql_query($str);
  $num = mysql_num_rows($pre);
  

  $post = 10; 
  $category = 1; 
  $count = ceil($num/$post); 
  if(isset($_GET['category_id'])) {
    $category = $_GET['category_id'];
  }
  if($category){
    $start = ($category-1)*$post; 
  }
  else {
    $start = 0;
  }


  $sql = "select * from category limit $start, $post";
  $result = mysql_query($sql);
  
  echo "<table width=500 cellpadding=20 cellspacing=20 >
      <th>STT</th>
      <th>Tên danh mục</th>
      <th>Xem</th>
      <th>Sửa</th>
      <th>Xóa</th>
      
     ";
  $i = $start;
  while($row = mysql_fetch_array($result)) {
    $i++;
    echo "<tr>";
    echo "
        <td>".$i."</td>
        <td><a href='#'>".ucwords($row['category_name'])."</a></td>
        <td><a target='_blank' href='".$row['category_url']."'>".$row['category_name']."</a></td>
       ";
     
    echo "    
        <td>
        <a href='category.php?cat=update&category_id={$row[0]}'>Edit</a>
        </td>
        <td><a href='category.php?cat=delete&category_id={$row[0]}'>Delete</a></td>
       ";
    echo "</tr>";
    
  }
  echo "</table><br>";


  if($category > 1) {
    $first = 1;
    $prev = $category - 1;
    echo "<a href='{$_SERVER['PHP_SELF']}?category_id=$first' id='pagi'>First</a>";
    echo "<a href='{$_SERVER['PHP_SELF']}?category_id=$prev' id='pagi'>Prev</a>";
  }
  for($i = 1; $i<$count+1; $i++){
    
      if($i>1){
        if($i == $category){
              echo "<span>$i</span>";
            }
            else {
              echo "<a href='{$_SERVER['PHP_SELF']}?category_id=$i' id='pagi'>$i</a>";
            }
      }
    
  }
  
  if($category < $count){
    $next = $category +1;;
    echo "<a href='{$_SERVER['PHP_SELF']}?category_id=$next' id='pagi'>Next</a>";
    echo "<a href='{$_SERVER['PHP_SELF']}?category_id=$count' id='pagi'>Last</a>";
  }
  
?>

<?php mysql_close(); ?>
<br>
          <a href="category.php?cat=insert" class="btn btn-info">Danh mục mới</a>