<h2 class='text-info'>Trang mới</h2>
<?php
  
  if(isset($_POST['insert'])){
    $name = $_POST['name'];
    $info = $_POST['info'];
    $author = $login_session;
    $url = HOME.'/page.php?page_name='.$name;
    
    $time = date('Y-m-d', time());
    if(isset($_POST['stataus'])) {$status = $_POST['status'];}
    else { $status = 1;}
    
    
    $sql = "
      INSERT INTO page(page_name, page_author, page_content, page_time, page_status, page_url) 
      VALUES ('$name', '$author', '$info', '$time', '$status', '$url')
    ";
    mysql_query($sql);
    header("Location: ".ADMIN."/page.php");  
    
    //echo $sql;
    
  }
?>            
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="933" height="437" border="0" align="center">
  <tr>
    <td width="622" valign="top"><p>
      <label for="name"></label>
      <input type="text" name="name" id="name" size='70' placeholder="Tên trang" />
    </p>
      <p>Nội dung:</p>
      <p>
        <label for="info"></label>
        <textarea name="info" id="info" cols="70" rows="10"></textarea>
      </p>
      
      <p>
        <input type="submit" name="insert" id="insert" value="Lưu" class='btn btn-info' />
      </p>
    </td>
    <td width="295" valign="top">
      
      
      
     <p id='status'>Trạng thái: 
        <input type="radio" name="status" id="radio" value="1" checked="checked" />
        
      Hiển thị 
      <input type="radio" name="status" id="radio2" value="0" />
     
      Lưu</p></td>
  </tr>
</table>
</form>
          
<?php mysql_close(); ?>