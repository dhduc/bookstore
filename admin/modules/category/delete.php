<?php
 	$id = $_GET['category_id'];
    $sql = "
      delete from category where category_id = '$id' 
    ";
    mysql_query($sql);
    header('Location: '.ADMIN.'/category.php');

  
?>