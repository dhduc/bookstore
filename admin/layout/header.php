<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Dashboard Administrator</title>
<meta name="generator" content="Bootply" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/styles.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Doan's customization-->
<script language="javascript">
function isBuilding(){
	alert("Chức năng này đang được xây dựng.\nVui lòng trở lại sau.");
	}
</script>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="#">Buy More</a> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?=HOME?>" target="_blank">Home page</a></li>
        <li><a href="adminPage.php">Administrator page</a></li>
        <?php
        /*
		Doan's customization
		*/
		$id="";
		$res=mysql_query("SELECT * 
								FROM  `admin` 
									WHERE username =  '$login_session'");
		
		while($row=mysql_fetch_array($res)) $id=$row[0];
		?>
        
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class='icon-user icon-white'></i> <?php echo $login_session; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li> <a href="./updateAdministrator.php?id=<?php echo $id?>"><i class="fa fa-fw fa-user"></i> Account</a> </li>
            <li> <a href="#" onClick="isBuilding()"><i class="fa fa-fw fa-envelope"></i> Notification</a> </li>
            <li> <a href="#"  onClick="isBuilding()"><i class="fa fa-fw fa-gear"></i> Setting</a> </li>
            <li class="divider"></li>
            <li> <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a> </li>
          </ul>
        </li>
        <li><a href="#">Help</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container-fluid">
<div class="row row-offcanvas row-offcanvas-left">
<div class="col-sm-3 col-md-2 sidebar-offcanvas" id="sidebar" role="navigation">
  <ul class="nav nav-sidebar">
    <li class="active"><a href="admin.php"><i class='icon-home'></i> Overview</a></li>
    <li><a href="post.php">Product</a></li>
    <li><a href="order.php">Order</a></li>
    <li><a href="member.php">Member</a></li>
    <li><a href="page.php">Page</a></li>
    <li><a href="category.php">Category</a></li>
    <li><a href="menu.php">Menu</a></li>
    <li><a href="submenu.php">Sub-Menu</a></li>
    <li><a href="contact.php">Contact</a></li>
    <li><a href="ads.php">Advertisement</a></li>
  </ul>
</div>
<!--/span--> 

