  <?php
  error_reporting(0);
  session_start();
  ?>
  <?php include 'config.php'; ?> 
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>E-commerce</title>

    <link href="<?=HOME?>/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <link href="<?=HOME?>/css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    </style>

    <script type="text/javascript" src="<?=HOME?>/bootstrap/js/bootstrap-dropdown.js"></script>
    <script type="text/javascript" src="<?=HOME?>/bootstrap/js/jquery.js"></script>
    <script type="text/javascript" src="<?=HOME?>/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=HOME?>/bootstrap/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript">
    $('.dropdown-toggle').dropdown();
    </script>

    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <script src="<?=HOME?>/js/script.js"></script>
  </head>
  <body>
    <div class='page'>
     <div class='header'>
      <div class='grid logo'>
        <a href="<?=HOME?>">
          <span id='book'>BOOK</span>
          <span id='store'>STORE</span>
        </a>
      </div>
      <div class='grid search'>
        <div class="input-append">  
          <form id="form1" name="form1" method="post" action="search.php"> 
            <input class="span2" id="appendedInputButton search" type="text" name='ts' placeholder="Tìm Kiếm Tên Sách" >
            <button class="btn btn-info" type="submit"><i class="icon-search icon-white"></i> Search</button>
          </form>
        </div>  
      </div>
      <div class='grid user'>
       <ul class="nav nav-pills login">  
         <li class="dropdown all-camera-dropdown">  
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">  
           <i class='icon-user'></i> 
           <?php echo $name; ?>
          <b class="caret"></b>  
        </a>  
        <ul class="dropdown-menu">  
         <li data-filter-camera-type="all"><a data-toggle="tab" href="#" id="login">Đăng nhập</a>


         </li>  
         <li data-filter-camera-type="Alpha"><a data-toggle="tab" href="#" id="signup">Đăng ký</a></li>  
         <li data-filter-camera-type="Zed"><a href="<?=HOME?>/member/member.php">Tài khoản</a></li>  
         <li data-filter-camera-type="Bravo"><a href="<?=HOME?>/member/logout.php">Thoát</a></li>  
       </ul>  
     </li>
   </ul>
 </div>
 <div class='cart'>
  <?php
  if(isset($_SESSION['qty']) and $_SESSION['qty'] > 0){
    $count += $_SESSION['qty'];
    $d = '['.$count.']';
  }
  else $d = '';

  ?>
  <a class="" href='#' id='btn-cart'><i class="icon-shopping-cart"></i> Giỏ hàng </a><span class="text-cart"><?php echo $d; ?></span>
</div>
</div>
<div class='nav'>

  <div id='menu' class=''>
    <ul>
     <li class='active'><a href='<?=HOME?>'><span><i class='icon-home'></i> Home</span></a></li>
     <?php
     $cur = mysql_query("select * from menu");
     while($row = mysql_fetch_array($cur)){
      echo "
      <li><a href='".$row['item_url']."'>".$row['item_name']."</a></li>
      ";
    }
    ?>
    
  </ul>
</div>

</div>


<div id="log-in" title="Đăng nhập">

  <form method='post' action='member/login.php'>
    <fieldset>
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="" placeholder="email@example.com" class="text ui-widget-content ui-corner-all" required>
      <label for="password">Password</label>
      <input type="password" name="password" id="password" value="" placeholder="" class="text ui-widget-content ui-corner-all" required>
      
      <br>
      <input type="submit" value="Login" class='btn btn-info'>
      
    </fieldset>
  </form>

</div>
<div id="sign-up" title="Đăng ký">
 
  <form method='post' action='member/signup.php'>
    <fieldset>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="" placeholder="Username" class="text ui-widget-content ui-corner-all">
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="" placeholder="email@example.com" class="text ui-widget-content ui-corner-all" required>
      
      <label for="phone">Phone</label>
      <input type="text" name="phone" id="phone" value="" placeholder="0123456789" class="text ui-widget-content ui-corner-all">
      
      <label for="password">Password</label>
      <input type="password" name="password" id="password" value="" placeholder=""  class="text ui-widget-content ui-corner-all" required>
      
      <br>
      <input type="submit" value="Signup" class='btn btn-info'>
      
    </fieldset>
  </form>

</div>
<div id="cart" title="Giỏ hàng">
  
  <?php
  include 'cart.php';
  ?>
</div>
