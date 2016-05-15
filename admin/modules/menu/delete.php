<?php
$id = $_GET['item_id'];
$sql = "delete from menu where item_id = '$id'";
mysql_query($sql);
header('Location: '.ADMIN.'/menu.php');
?>