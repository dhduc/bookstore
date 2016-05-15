<h2 class='text-info'>Danh mục mới</h2>
<?php
  
  if(isset($_POST['insert'])){
    $name = $_POST['name'];
    $url = HOME.'/category.php?category_name='.$name;

    
    
    
    $sql = "
      INSERT INTO category(category_name, category_url) 
      VALUES ('$name', '$url')
    ";
    mysql_query($sql);
    header("Location: ".ADMIN."/category.php");  
    
    //echo $sql;
    
  }
?>            
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="933" height="437" border="0" align="center">
  <tr>
    <td width="622" valign="top">
    <p>
      <label for="name"></label>
      <input type="text" name="name" id="name" size='70' placeholder="Tên danh mục" />
    </p>
      
      
      <p>
        <input type="submit" name="insert" id="insert" value="Lưu" class='btn btn-info' />
      </p>
    </td>
    <td width="295" valign="top">
      
      
      
      </td>
  </tr>
</table>
</form>
          
<?php mysql_close(); ?>