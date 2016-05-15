
<?php include 'header.php'; ?>
<?php
$id = $_GET['id'];

$row = mysql_fetch_array(mysql_query("select post.name, post.thumb, post.author, post.category, post.price, post.pages,
                                       DATE_FORMAT(post.times,'%d-%m-%Y') as 'times', post.info, submenu.item_name, submenu.item_url,post.soluong from post, submenu where id = '$id' and post.category = submenu.subItem_id ")); 
if (!$row) {
    # code...
    echo "error";
}

?>
<div class='nav'>
      <div id="" class="drop">
        <ul class="drop_menu">
          <li class='active'><a href='<?=HOME?>'><span><i class='icon-home icon-white'></i> Home</span></a></li>
          <?php
          $cur = mysql_query("select * from menu");
          while($row1 = mysql_fetch_array($cur)){
            echo "
            <li><a href='".$row1['item_url']."'>".$row1['item_name']."</a>
            ";
            $supper_id=$row1[0];
            $sub=mysql_query("select * from submenu where item_id=".$supper_id);
            if(mysql_num_rows($sub)>0){
              echo "<ul>";
              while($row1=mysql_fetch_array($sub)){
                echo "
                <li><a href='{$row1[3]}'>{$row1[2]}</a></li>
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
     <a href="<?php echo HOME;?>">Home</a> > <a href="<?php echo $row['item_url']; ?>"><?php echo $row['item_name']; ?></a> > <?php echo ucwords($row['name']); ?>
    <br>
    <p id='detail'>Chi Tiết Sản Phẩm</p>

    <div id='post_view'>
       
       

        <table width="811" height="" border="0">
          <tr>
            <td width="277" valign="top" id='view-thumb'>
            <span class="zoom" id='ex1'>
               <a href="<?php echo $row['thumb']; ?>"><img src="<?php echo $row['thumb']; ?>" class="preview" title='"<?php echo $row['name']; ?>"' /></a>
               </span>
           </td>
           <td width="518">
            <h4><?php echo ucwords($row['name']); ?></h4>
            <p><b>Tác giả: <?php echo $row['author']; ?></b></p>
            <p><b>Danh mục: <?php echo $row['item_name']; ?></b></p>
            <p><b>Đơn giá: <?php echo $row['price']; ?> <sup>đ</sup></b></p>
            <p><b>Số trang: <?php echo $row['pages']; ?></b></p>
            <p><b>Sách còn: <?php echo $row['soluong']; ?> cuốn</b></p>
            <p><b>Ngày đăng: <?php echo $row['times']; ?></b></p>
            <?php
            $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
            echo '<div class="product">';
            echo '<form method="post" action="cart_update.php">';
            echo '<b>Số lượng: <input type="text" name="product_qty" value="1" size="3" /></b><br>';
            echo '<button class="add_to_cart btn btn-info" id="" onclick="javascript: alert(\'Xem trong giỏ hàng\');">Add To Cart</button></div>';
            echo '<input type="hidden" name="product_code" value="'.$id.'" />';
            echo '<input type="hidden" name="product_price" value="'.$row['price'].'" />';
            echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
            echo '<input type="hidden" name="type" value="add" />';
            echo '<input type="hidden" name="qty" value="1" />';
            echo '</form>';
            echo '</div>';
            ?>
        </td>
    </tr>
</table>

<br/>
<p style="font-size: 20px;color:#07c">Giới thiệu sách:</p> 
<p id="post_info"><?php echo $row['info']; ?></p>


</div>
</div>	
<br/>
<?php include 'footer.php'; ?>