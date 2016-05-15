<?php
include 'config.php';

$member_id = $_POST['member_id'];
$post_id = $_POST['post_id'];
$post_name = $_POST['post_name'];
$post_qty = $_POST['post_qty'];
$post_price = $_POST['post_price'];
$time = date('Y-m-d', time());
$total = $post_qty*$post_price;

$sql = "
INSERT INTO cart VALUES ('$member_id', '$post_id', '$post_name', '$post_qty', '$post_price', '$total', '$time')
";
mysql_query($sql);
header("Location: ".HOME."/view_cart.php");  

    // echo $sql;


?>            

<?php mysql_close(); ?>