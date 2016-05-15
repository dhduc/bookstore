<?php
include('../config.php');
session_start();
$member_check=$_SESSION['login_member'];

$ses_sql=mysql_query(" select email from member where email='$member_check' ");

$row=mysql_fetch_array($ses_sql);

$member_session=$row['email'];

if(!isset($member_session))
{
header("Location: ".HOME."");
}
?>