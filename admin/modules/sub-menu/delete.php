<?php
$id = $_GET['item_id'];
$sql = "delete from submenu where subitem_id = '$id'";
mysql_query($sql);
header('Location: '.ADMIN.'/submenu.php');
?>