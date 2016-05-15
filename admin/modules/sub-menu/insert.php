<h2 class='text-info'>Danh mục sub-menu mới</h2>
<?php
  
  if(isset($_POST['insert_sub'])){
   
      $name = $_POST['sub_name'];	
	  $menu_id=$_POST['menu_id'];//id of menu
	  $rs=mysql_query("select item_url from menu where item_id=".$menu_id);
	  $menu_url="";
	  while($row=mysql_fetch_array($rs))
	 	 $menu_url=$row[0];  
      $url = $menu_url.'&submenu='.$name;
       $sql = "
      INSERT INTO submenu(item_id,item_name, item_url) 
      VALUES ('$menu_id', '$name','$url')
    ";
    mysql_query($sql);
    
    
   
    header("Location: ".ADMIN."/submenu.php?cat=insert");  
  
  }
?>
<table width="1000" height="374" border="0">
  <tr>
    <td valign="top"><h4>Tên Sub-Menu:</h4>
      <form id="form44" name="form22" method="post" action="">
        <p> Danh mục:<br/>
          <label for="cat_url"></label>
          <select name="menu_id" id="menu_id">
            <?php
            $cur = mysql_query("select * from menu");
            while($row = mysql_fetch_array($cur)){
              echo "<option value='".$row[0]."'>".$row[1]."</option>";
            }

          ?>
          </select>
        </p>
        <p>Tên hiển thị:<br/>
          <label for="cat_name"></label>
          <input type="text" name="sub_name" id="sub_name" />
        </p>
        <p>
          <input type="submit" class="btn btn-info" name="insert_sub" id="insert_sub" value="Thêm" />
        </p>
      </form></td>
  </tr>
</table>
<?php mysql_close(); ?>
