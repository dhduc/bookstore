
<?php include 'header.php'; ?>
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
<div class='index_view'>
  Trang chủ :: <a href="#">Home </a>> <?php echo ucwords($row['name']); ?>
  <br>
  <p id='detail'>Tìm Kiếm Sản Phẩm</p>
  <?php
  $ts = '';
  if(isset($_POST['ts'])){
    $ts = $_POST['ts'];
  }
  if (isset($_GET['key'])) {
    $ts = $_GET['key'];
  }
  ?>
  <h4>Từ khóa: <?php echo $ts; ?></h4>
  <?php
  
  
  $st = "
  select *
  from post
  where name like '%$ts%'
  ";
  $kq = mysql_query($st);
  $post = mysql_num_rows($kq);
  $limit = 2; 
  $pages = ceil($post/$limit); 
  $page = 1; 
  if(isset($_GET['id'])){
    $page = $_GET['id'];
  }
  $start = ($page-1)*$limit; 

  $str = "
  select *
  from post
  where name like '%$ts%'
  limit $start, $limit
  ";
  $result = mysql_query($str);
  $num = mysql_num_rows($result);
  if($num > 0) {
    while($row = mysql_fetch_array($result)) {
      echo "
      <div id='post'>
      <a href='view.php?id={$row['id']}'><img id='thumb' src=".$row['thumb']." /></a><br>
      <p id='name'><a href='view.php?id={$row['id']}'>".ucwords($row['name'])."</a></p>
      <a href='#'>{$row['category']}</a> | <span id='price'>{$row['price']}$</span>
      </div>
      ";  
      
    }
  }
  else {
    echo "<h4>Not Found</h4>";
  }  
  

  echo '<br>';

  echo "<div class='pagi'>";
  if($page> 1){
    $first = 1;
    $prev = $page -1;
    echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?key=$ts&id=$first'>First</a>";
    echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?key=$ts&id=$prev'>Prev</a>";
  }
          # for
  for($i=1; $i<=$pages; $i++){
    if($i>1){
      if($i == $page){
        echo "<span id='active'>$i</span>";
      }
      else {
        echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?key=$ts&id=$i'>$i</a>";
      }
    }

  }
  if($page < $pages) {
    $last = $pages;
    $next = $page + 1;
    echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?key=$ts&id=$next'>Next</a>";
    echo "<a id='pagi' href='{$_SERVER['PHP_SELF']}?key=$ts&id=$last'>Last</a>";
  }  
  echo "</div>";

  
  ?>
</div>	
<br/>
<?php include 'footer.php'; ?>