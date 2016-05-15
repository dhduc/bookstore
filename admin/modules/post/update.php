<h2 class='text-info'>Sửa thông tin sách</h2>
<?php
if(isset($_GET['post_id'])){ 
  $id = $_GET['post_id'];
        $row = mysql_fetch_array(mysql_query("select * from post where id = '$id' "));  
$gia=$row[5];
$sotrang=$row[6];
$soluong=$row[10];
$menu_id=$row[4];
 }
    
?>
<?php
  if(isset($_POST['update'])){
    $name = $_POST['name'];
    $info = $_POST['info'];
    $author = $_POST['author'];
    $cat = $_POST['subItem_id'];
    $price = $_POST['price'];
    $page = $_POST['page'];
    $time = date('Y-m-d', time());
	$soluong=$_POST['soluong'];
    if(isset($_POST['stataus'])) {$status = $_POST['status'];}
    else { $status = 1;}
    
    if(isset($_FILES['thumb'])){
      copy($_FILES['thumb']['tmp_name'], '../post/image/'.$_FILES['thumb']['name']);
      $thumb = "".HOME."/post/image/".$_FILES['thumb']['name'];
    }
    if($thumb == "".HOME."/post/image/" ){
      $sql = "
      update post set name='$name', author='$author', category='$cat', price='$price',
       pages='$page', info='$info', times='$time', status='$status',soluong='$soluong'
      where id=$id; 
    ";
    }
    else
    $sql = "
      update post set name='$name', thumb='$thumb', author='$author', category='$cat', price='$price',
       pages='$page', info='$info', time='$time', status='$status',,soluong='$soluong'
      where id=$id; 
    ";
    mysql_query($sql);
    header("Location: ".ADMIN."/post.php");  
    
  }
?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="933" height="437" border="0" align="center">
  <tr>
    <td width="622" valign="top"><p>
      <label for="name"></label>
      <input type="text" name="name"  id="name" size='70' placeholder="Tên sách" value="<?php echo $row[1]; ?>" />
    </p>
      <p>Phần giới thiệu:</p>
      <p>
        <label for="info"></label>
        <textarea name="info" id="info" cols="70" rows="10" value=""><?php echo $row[7]; ?></textarea>
      </p>
      <p>Ảnh bìa:</p>
      <p>
        <label for="thumb"></label>
        <input type="file" name="thumb"  />
      </p>
      <p>
        <input type="submit" name="update" id="update" value="Lưu" class="btn btn-info" />
      </p></td>
    <td width="295" valign="top"><p>Tác giả:</p>
      <p>
        <label for="author"></label>
        <input type="text" name="author" id="author" value="<?php echo $row[3]; ?>" />
      </p>
      <p>Danh mục:</p>
      <p>
        <label for="cat"></label>
        <select name="subItem_id" id="subItem_id">
          <?php
            $cur = mysql_query("select * from submenu");
            while($row = mysql_fetch_array($cur)){
				if($row[0]==$menu_id){
					echo "<option value='".$row[0]."' selected='selected'>".$row[2]."</option>";
					}else
              echo "<option value='".$row[0]."'>".$row[2]."</option>";
            }

          ?>
        </select>
      </p>
      <p>Đơn giá: (VND)</p>
      <p>
        <label for="price"></label>
        <input type="text" name="price" id="price" value="<?php echo  $gia?>" />
      </p>
      <p>Số trang:</p>
      <p>
        <label for="page"></label>
        <input type="text" name="page" id="page" value="<?php echo $sotrang?>" />
      </p>
      <p>Số lượng:</p>
      <p>
        <label for="page"></label>
        <input type="text" name="soluong" id="soluong" value="<?php echo $soluong?>" />
      </p>
      <p>Trạng thái: 
        <input type="radio" name="status" id="radio" value="radio" checked="checked" />
        
      Hiển thị
      <input type="radio" name="status" id="radio2" value="radio2" />
      
      Lưu</p></td>
  </tr>
</table>
</form>
<?php mysql_close(); ?>