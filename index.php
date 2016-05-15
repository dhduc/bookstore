  <?php
  include 'header.php';
  ?>
  <style type="text/css">
      .slider {
        display: block;
      }
      .side_menu {
        float: left;
        margin-right: 30px;
        margin-bottom: 30px;
      }
      .slide {
        margin-right: 30px;
      }
      #post {
        position: relative;
      }
      #news {
        position: absolute;
        top: 0;
        right: 20px;
        z-index: 0;
        background: transparent;
      }
      #news img {
        width: 40px;
        height: 40px;
      }
      img#hot {
        width: 22px !important;
        height: 11px !important;
         
      }
  </style>
  <div class="slider">

    <div class="side_menu">
      <div id="cssmenu">
        <ul>
          <li class='active'><a href='<?=HOME?>'><span><i class='icon-home'></i> Home</span></a></li>
          <?php
          $cur = mysql_query("select * from menu");
          while($row = mysql_fetch_array($cur)){
            echo "
            <li class='has-sub'><a href='".$row['item_url']."'>".$row['item_name']."</a>
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
          <li><a href='<?=HOME?>/contact.php'><span><i class='icon-envelope icon-white'></i> Contact Us</span></a></li>
        </ul>
      </div>
    </div>

  <div class="slide">


    <div id="featured" >
      <ul class="ui-tabs-nav">
        <?php  
        $sql_slide = "select * from post where id in(SELECT product_id
FROM (
SELECT product_id, SUM( soluong ) AS  'total'
FROM  `order` 
GROUP BY product_id
ORDER BY total DESC 
LIMIT 0 , 5
) AS K)";
        $rs_slide = mysql_query($sql_slide);

        $m = 1;
        while($row_slide = mysql_fetch_array($rs_slide)) {
          echo "
          <li class='ui-tabs-nav-item' id='nav-fragment-".$m."' style='width: 330px;'>
          <p style='width: 330px; height: 100px'>
          <a href='#fragment-".$m."' style='width: 330px;'>
          <img src=".$row_slide['thumb']." alt='' />
          <b style='width: 200px;'>".ucwords($row_slide['name'])."</b>
          <br>
          <img id='hot' src='".HOME."/images/hots.png' />
          
          </a>
          </p>
          </li>
          ";  
          $m++;
        }
        ?>
    </ul>
    <?php  
    $sql_slide1 = "select * from post where id in(SELECT product_id
FROM (
SELECT product_id, SUM( soluong ) AS  'total'
FROM  `order` 
GROUP BY product_id
ORDER BY total DESC 
LIMIT 0 , 5
) AS K)";
    $rs_slide1 = mysql_query($sql_slide1);
    $i = 1;
    while($row = mysql_fetch_array($rs_slide1)) {
      if($i==1){
        echo "
        <div id='fragment-".$i."' class='ui-tabs-panel' style=''>
        <a href='view.php?id={$row['id']}'><img src=".$row['thumb']." alt='' /></a>
        <div class='info' >
        <h3><a href='view.php?id={$row['id']}'>".ucwords($row['name'])."</a></h3>
        </div>
        </div>
        "; 
      }
      else {
        echo "
        <div id='fragment-".$i."' class='ui-tabs-panel  ui-tabs-hide' style=''>
        <a href='view.php?id={$row['id']}'><img src=".$row['thumb']." alt='' /></a>
        <div class='info' >
        <h3><a href='view.php?id={$row['id']}'>".ucwords($row['name'])."</a></h3>
        </div>
        </div>
        "; 
      }
      $i++;
    }
    ?>
  </div>


  <img src="images/slide.png" style="height: 20px; width: 100%; padding-top: 10px"/>
    
  </div>
</div>


  <div class='index'>
   <!-- <font color="#0000FF">Trang chủ ::</font> <a href="<?php echo HOME;?>">Home</a> -->
    <br>
    <p id='new'>Sản Phẩm Mới</p>
    <div>
      <?php
      
      $str = "select post.id, post.name, post.thumb, post.author, post.category, post.price, post.pages,
                                        post.times, submenu.item_name, submenu.item_url from post, submenu
                                         where post.category = submenu.subItem_id order by  post.times DESC";
      $pre = mysql_query($str);
      $num = mysql_num_rows($pre);
      

      $post = 12; 
      $page = 1; 
      $count = ceil($num/$post); 
      if(isset($_GET['id'])) {
        $page = $_GET['id'];
      }
      if($page){
        $start = ($page-1)*$post; 
      }
      else {
        $start = 0;
      }


      $sql = "select post.id, post.name, post.thumb, post.author, post.category, post.price, post.pages,
                                        post.times, submenu.item_name, submenu.item_url,DATEDIFF(CURDATE(),post.times) as 'hot' from post, submenu
                                         where post.category = submenu.subItem_id order by  post.times DESC limit $start, $post";
      $result = mysql_query($sql);
      
      
      while($row = mysql_fetch_array($result)) {
        echo "
        <div id='post'>
        <a href='view.php?id={$row['id']}'><img class='preview' id='thumb' src=".$row['thumb']." title='".ucwords($row['name'])."' />";
		if($row['hot']<=1)
		echo"
		<span id='news'><img src='".HOME."/images/news.png' /></span>";
		
		echo"</a><br>
        <p id='name'><a href='view.php?id={$row['id']}'>".ucwords($row['name'])."</a></p>
        <a href='".$row['item_url']."'>".ucwords($row['item_name'])."</a> |<font color='orange'><b> Giá : {$row['price']}<u> VND</u></b></font>
        </div>
        ";  
        
      }
      
      echo "<br/><center><div id='pagination'>";

      if($page > 1) {
        $first = 1;
        $prev = $page - 1;
        echo "<a href='{$_SERVER['PHP_SELF']}?id=$first' id='pagi'>First</a>";
        echo "<a href='{$_SERVER['PHP_SELF']}?id=$prev' id='pagi'>Prev</a>";
      }
      for($i = 1; $i<$count+1; $i++){
       
         if ($i == $page) {
           echo "<a href='' id='pagi_active'>$i</a>";
         } else {
           echo "<a href='{$_SERVER['PHP_SELF']}?id=$i' id='pagi'>$i</a>";
         }
         
       

     }
     
     if($page < $count){
      $next = $page +1;;
      echo "<a href='{$_SERVER['PHP_SELF']}?id=$next' id='pagi'>Next</a>";
      echo "<a href='{$_SERVER['PHP_SELF']}?id=$count' id='pagi'>Last</a>";
    }

      echo "</div></center>";
      
    ?>
  </div>
</div>
<?php
include 'footer.php';
?>