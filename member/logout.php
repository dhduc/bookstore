<?php
include '../config.php';
session_start();
unset($_SESSION['login_member']);
header("Location: ".HOME."");

?>