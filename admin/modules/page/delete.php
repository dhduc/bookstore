<?php
 	$id = $_GET['page_id'];
    $sql = "
      delete from page where page_id = '$id' 
    ";
    mysql_query($sql);
    header('Location: '.ADMIN.'/page.php');

  
?>