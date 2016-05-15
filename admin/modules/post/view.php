
<?php
    $id = $_GET['post_id'];
    
      $row = mysql_fetch_array(mysql_query("select * from post where id = '$id' "));  
    

?>

               

<table width="933" height="437" border="0" align="center">
  <tr>
    <td width="622" valign="top"><p>
      <label for="name"></label>
      <input type="text" name="name" id="name" size='70' placeholder="Enter title here" value="<?php echo $row[1]; ?>" />
    </p>
      <p>Content:</p>
      <p>
        <label for="info"></label>
        <textarea name="info" id="info" cols="70" rows="10" value=""><?php echo $row[7]; ?></textarea>
      </p>
      <p>Thumbnail:</p>
      <img id='thumb' src="<?php echo $row['thumb']; ?>">
      </td>
    <td width="295" valign="top"><p>Author:</p>
      <p>
        <label for="author"></label>
        <input type="text" name="author" id="author" value="<?php echo $row[3]; ?>" />
      </p>
      <p>Category:</p>
      <p>
        <label for="cat"></label>
        <select name="cat" id="cat" value="<?php echo $row[4]; ?>">
          <option value='Web Programming'>Web Programming</option>
        </select>
      </p>
      <p>Price:</p>
      <p>
        <label for="price"></label>
        <input type="text" name="price" id="price" value="<?php echo $row[5]; ?>" />
      </p>
      <p>Pages:</p>
      <p>
        <label for="page"></label>
        <input type="text" name="page" id="page" value="<?php echo $row[6]; ?>" />
      </p>
      <p>Status:  <?php echo $row['status']; ?>
      </p></td>
  </tr>
</table>




<?php mysql_close(); ?>