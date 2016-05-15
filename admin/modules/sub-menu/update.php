<?php
  $sub_id="";
  $sub_name="";
  $super_menu="";
  //kiêm tra và check item
  if(isset($_GET['cat']))
   if($_GET['cat']==="update"&&isset($_GET['item_id'])){
   		$sub_id=$_GET['item_id']; 
		$sub_name=$_GET['subname']; 
		$super_menu=$_GET['supermenu']; 
  
  }
  ?>
<h4 align="center">Cập nhật sub-menu</h4>

  <?php
  //update
  if(isset($_POST['btUpdate_Submenu'])){
   $name = $_POST['sub_name'];	
	  $menu_id=$_POST['menu_id'];//id of menu
	  //tìm url của super menu
	  $rs=mysql_query("select item_url from menu where item_id=".$menu_id);
	  $menu_url="";
	  while($row=mysql_fetch_array($rs))
	 	 $menu_url=$row[0];  
      $url = $menu_url.'&submenu='.$name;
	  //update db
       $sql = "
      UPDATE submenu set item_id='$menu_id',item_name='$name',item_url='$url' where subItem_id=$sub_id
    ";
    mysql_query($sql);
    
    
   
    header("Location: ".ADMIN."/submenu.php");  
  }
?>
<table width="1000" height="374" border="0">
  <tr>
    <td valign="top"><h4>Tên Sub-Menu:<?php echo $sub_name?></h4>
      <form id="form414" name="form122" method="post" action="">
        <p> Danh mục:<br/>
          <label for="cat_url"></label>
          <select name="menu_id" id="menu_id">
            <?php
            $cur = mysql_query("select * from menu");
            while($row = mysql_fetch_array($cur)){
				if($row[0]== $super_menu) echo "<option value='".$row[0]."' selected=\"selected\">".$row[1]."</option>";
				else
              echo "<option value='".$row[0]."'>".$row[1]."</option>";
            }

          ?>
          </select>
        </p>
        <p>Tên hiển thị:<br/>
          <label for="cat_name"></label>
          <input type="text" name="sub_name" id="sub_name" value="<?php echo $sub_name?>"/>
        </p>
        <p>
          <input type="submit" class="btn btn-info" name="btUpdate_Submenu" id="btUpdate_Submenu" value="Cập nhật" />
        </p>
      </form></td>
  </tr>
</table>
<?php mysql_close(); ?>
