<h2 class='text-info'>Sửa danh mục</h2>

<?php
if(isset($_GET['category_id'])){ 
  $id = $_GET['category_id'];
        $row = mysql_fetch_array(mysql_query("select * from category where category_id = '$id' "));  

 }
    
?>
<?php
  if(isset($_POST['update'])){
    $name = $_POST['name'];
    $url = HOME.'/category.php?category_name='.$name;

    
    $sql = "
      update category set category_name='$name', category_url='$url'
      where category_id=$id; 
    ";
    mysql_query($sql);
    header("Location: ".ADMIN."/category.php");  
    
  }
?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="933" height="437" border="0" align="center">
  <tr>
    <td width="622" valign="top"><p>
      <label for="name"></label>
      <input type="text" name="name"  id="name" size='70' value="<?php echo $row['category_name']; ?>" />
    </p>
      
      
      <p>
        <input type="submit" name="update" id="update" value="Lưu" class="btn btn-info" />
      </p></td>
    <td width="295" valign="top">
      
      
      </td>
  </tr>
</table>
</form>
<?php mysql_close(); ?>