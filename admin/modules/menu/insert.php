<h2 class='text-info'>Danh mục mới</h2>

<?php
  
  if(isset($_POST['insert_page'])){
    if(isset($_POST['page_url'])) {
      $name = $_POST['page_name'];
      $url = $_POST['page_url'];
       $sql = "
      INSERT INTO menu(item_name, item_url) 
      VALUES ('$name', '$url')
    ";
    mysql_query($sql);
    }
    
   
    header("Location: ".ADMIN."/menu.php?cat=insert");  
  
  }
  if(isset($_POST['insert_cat'])){
    
    if(isset($_POST['cat_url'])) {
      $name = $_POST['cat_name'];
      $url = $_POST['cat_url'];
       $sql = "
      INSERT INTO menu(item_name, item_url) 
      VALUES ('$name', '$url')
      ";
      mysql_query($sql);
    }
    
   
    header("Location: ".ADMIN."/menu.php?cat=insert");  
  
  }
  if(isset($_POST['insert_link'])){
   
      $name = $_POST['link_name'];
      $url = $_POST['link_url'];
     
    $sql = "
      INSERT INTO menu(item_name, item_url) 
      VALUES ('$name', '$url')
    ";
    mysql_query($sql);
    header("Location: ".ADMIN."/menu.php?cat=insert");  
  
  }
?>            
<table width="1000" height="374" border="0">
    <tr>
      <td height="370" valign="top"><h4>Trang:</h4>
        <form id="form1" name="form1" method="post" action="">
          <p>Tên hiển thị: 
            <label for="page_name"></label>
            <input type="text" name="page_name" id="page_name" />
          </p>
          <p>
            <?php
            $cur = mysql_query("select * from page");
            while($row = mysql_fetch_array($cur)){
              echo "<input type='radio' name='page_url' value='".$row[6]."'>".$row[2]."</input>";
            }
        ?>    
          </p>
          <p>
            <input name="insert_page" type="submit" class="btn btn-info" id="insert_page" value="Thêm" />
          </p>
        </form>
        <p><br />
        </p>
        <p>&nbsp;</p>
        <h4>&nbsp;</h4>
      <p>&nbsp;</p></td>
      <td valign="top"><h4>Danh mục:</h4>
        <form id="form4" name="form2" method="post" action="">
          <p>Tên hiển thị:
            <label for="cat_name"></label>
            <input type="text" name="cat_name" id="cat_name" />
          </p>
          <p>
            <label for="cat_url"></label>
            <select name="cat_url" id="cat_url">
              <?php
            $cur = mysql_query("select * from category");
            while($row = mysql_fetch_array($cur)){
              echo "<option value='".$row[2]."'>".$row[1]."</option>";
            }

          ?>
            </select>
          </p>
          <p>
            <input type="submit" class="btn btn-info" name="insert_cat" id="insert_cat" value="Thêm" />
          </p>
      </form></td>
      <td valign="top"><h4>Link:</h4>
        <form id="form5" name="form3" method="post" action="">
          <p>Tên hiển thị:
            <label for="link_name2"></label>
            <input type="text" name="link_name" id="link_name2" />
          </p>
          <p>Địa chỉ URL:
            <label for="link_url2"></label>
            <input type="text" name="link_url" id="link_url2" />
          </p>
          <p>
            <input type="submit" class="btn btn-info" name="insert_link" id="insert_link" value="Thêm" />
          </p>
      </form></td>
    </tr>
  </table>
          
<?php mysql_close(); ?>