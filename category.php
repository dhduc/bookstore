    <?php
    	include 'header.php';
    ?>
    <?php  
      if (isset($_GET['submenu'])) {
        $cat_name = $_GET['submenu'];
      } else {
        $cat_name = $_GET['category_name'];
      }
      
    ?>
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
    <div class='index'>
      <a href="<?php echo HOME;?>">Home</a> > <?php echo ucwords($cat_name); ?>
    <br>
    <h4>Danh mục sản phẩm <?php echo ucwords($cat_name); ?></h4>
    <div>
    <?php

      if (isset($_GET['submenu'])) {
        $subname = $_GET['submenu'];
        $str = "select post.id, post.name, post.thumb, post.author, post.category, post.price, post.pages,
                                        post.times, submenu.item_name, submenu.item_url from post, submenu
                                         where post.category = submenu.subItem_id and post.category = (select subItem_id from submenu where item_name = '$subname')";
      } else {
        $catname = $_GET['category_name'];
        $str = "select post.id, post.name, post.thumb, post.author, post.category, post.price, post.pages,
                                        post.times, submenu.item_name, submenu.item_url from post, submenu
                                         where post.category = submenu.subItem_id and post.category in (select subItem_id from submenu where item_id = (select item_id from menu where item_name = '$catname') )";
      
      }

      
      
      
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

      if (isset($_GET['submenu'])) {
         $sql = "select post.id, post.name, post.thumb, post.author, post.category, post.price, post.pages,
                                        post.times, submenu.item_name, submenu.item_url from post, submenu
                                         where post.category = submenu.subItem_id and post.category = (select subItem_id from submenu where item_name = '$subname') limit $start, $post";
      
      } else {
         $sql = "select post.id, post.name, post.thumb, post.author, post.category, post.price, post.pages,
                                        post.times, submenu.item_name, submenu.item_url from post, submenu
                                         where post.category = submenu.subItem_id and post.category in (select subItem_id from submenu where item_id = (select item_id from menu where item_name = '$catname') )  limit $start, $post";
      
      }

    
      
      $result = mysql_query($sql);
      
      
      while($row = mysql_fetch_array($result)) {
        echo "
        <div id='post'>
        <a  href='view.php?id={$row['id']}' class='thumbnail'><img class='preview' id='thumb' src=".$row['thumb']." title='".ucwords($row['name'])."' /></a><br>
        <p id='name'><a href='view.php?id={$row['id']}'>".ucwords($row['name'])."</a></p>
        <a href='".$row['item_url']."'>".ucwords($row['item_name'])."</a> |<font color='orange'><b> Giá : {$row['price']}<u> VND</u></b></font>
        </div>
        "; 
        
      }
     
       echo "<br/><center><div id='pagination'>";

      if($page > 1) {
        $first = 1;
        $prev = $page - 1;
        echo "<a href='{$_SERVER['PHP_SELF']}?category_name=$catname&id=$first' id='pagi'>First</a>";
        echo "<a href='{$_SERVER['PHP_SELF']}?category_name=$catname&id=$prev' id='pagi'>Prev</a>";
      }
      for($i = 1; $i<$count+1; $i++){
        if ($i == $page) {
           echo "<a href='' id='pagi_active'>$i</a>";
         } else {
           echo "<a href='{$_SERVER['PHP_SELF']}?category_name=$catname&id=$i' id='pagi'>$i</a>";
         }
      }
      
      if($page < $count){
        $next = $page +1;;
        echo "<a href='{$_SERVER['PHP_SELF']}?category_name=$catname&id=$next' id='pagi'>Next</a>";
        echo "<a href='{$_SERVER['PHP_SELF']}?category_name=$catname&id=$count' id='pagi'>Last</a>";
      }

       echo "</div></center>";
      
    ?>
    </div>
    </div>
    <?php
    	include 'footer.php';
    ?>