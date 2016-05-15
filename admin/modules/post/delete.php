<?php
 	$id = $_GET['post_id'];
    $sql = "
      delete from post where id = '$id' 
    ";
    mysql_query($sql);
    header('Location: '.ADMIN.'/post.php');

  
?>