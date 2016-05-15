
<?php
    $id = $_GET['page_id'];
    
      $row = mysql_fetch_array(mysql_query("select * from page where page_id = '$id' "));  
    

?>

               

<table width="933" height="437" border="0" align="center">
  <tr>
    <td width="622" valign="top"><p>
      <label for="name"></label>
      <input type="text" name="name" id="name" size='70' placeholder="Enter title here" value="<?php echo $row['page_name']; ?>" />
    </p>
      <p>Content:</p>
      <p>
        <label for="info"></label>
        <textarea name="info" id="info" cols="70" rows="10" value=""><?php echo $row['page_content']; ?></textarea>
      </p>
        <input type="text" size='70' value="<?php echo $row['page_url']; ?>" />
      </td>
    <td width="295" valign="top">
      <p>Status:  <?php echo $row['page_status']; ?>
      </p></td>
  </tr>
</table>

<?php mysql_close(); ?>