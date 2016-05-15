

<?php
if(isset($_GET['item_id'])){ 
  $id = $_GET['item_id'];
        $row = mysql_fetch_array(mysql_query("select * from menu where item_id = '$id' "));  

 }
    
?>
<?php
  if(isset($_POST['update'])){
    $name = $_POST['name'];
   
    
    $sql = "
      update menu set item_name='$name'
      where item_id=$id; 
    ";
    mysql_query($sql);
    header("Location: ".ADMIN."/menu.php");  
    
  }
?>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<table width="933" height="437" border="0" align="center">
  <tr>
    <td width="622" valign="top"><p>
      <label for="name"></label>
      <input type="text" name="name"  id="name" size='70' placeholder="Enter title here" value="<?php echo $row['item_name']; ?>" />
    </p>
      
      <p>
        <input type="submit" name="update" id="update" value="Lưu" class="btn btn-info" />
      </p></td>
    <td width="295" valign="top"></td>
  </tr>
</table>
</form>
<?php mysql_close(); ?>