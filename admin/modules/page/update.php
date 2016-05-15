<h2 class='text-info'>Sửa bài viết</h2>
<?php
if(isset($_GET['page_id'])){ 
  $id = $_GET['page_id'];
        $row = mysql_fetch_array(mysql_query("select * from page where page_id = '$id' "));  

 }
    
?>
<?php
  if(isset($_POST['update'])){
    $name = $_POST['name'];
    $info = $_POST['info'];
    $url = HOME.'/page.php?page_name='.$name;
   
    $time = date('Y-m-d', time());
    if(isset($_POST['stataus'])) {$status = $_POST['status'];}
    else { $status = 1;}
    
    $sql = "
      update page set page_name='$name',
        page_content='$info', page_time='$time', page_status='$status', page_url='$url'
      where page_id=$id; 
    ";
    mysql_query($sql);
    header("Location: ".ADMIN."/page.php");  
    
  }
?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="933" height="437" border="0" align="center">
  <tr>
    <td width="622" valign="top"><p>
      <label for="name"></label>
      <input type="text" name="name"  id="name" size='70' value="<?php echo $row['page_name']; ?>" />
    </p>
      <p>Nội dung:</p>
      <p>
        <label for="info"></label>
        <textarea name="info" id="info" cols="70" rows="10" value=""><?php echo $row['page_content']; ?></textarea>
      </p>
      
      <p>
        <input type="submit" name="update" id="update" value="Lưu" class="btn btn-info" />
      </p></td>
    <td width="295" valign="top"><p>Người đăng:</p>
      <p>
        <label for="author"></label>
        <input type="text" name="author" id="author" value="<?php echo $login_session; ?>" readonly />
      </p>
      
      
      
      <p id='status'>Trạng thái: 
        <input type="radio" name="status" id="radio" value="1" checked="checked" />
        
      Hiển thị 
      <input type="radio" name="status" id="radio2" value="0" />
     
      Lưu</p></td>
  </tr>
</table>
</form>
<?php mysql_close(); ?>