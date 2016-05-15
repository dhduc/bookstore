<?php
  error_reporting(0);
  session_start();
  ?>
<?php include 'config.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Buy More - Sell Books Online</title>
<link href="<?=HOME?>/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/jquery-ui.css">
<link rel="stylesheet" href="css/topmenu.css">
<link href="<?=HOME?>/css/style.css" rel="stylesheet" type="text/css" />
<style>
/*Doan's customization*/
.banner_left_home {
	width: 140px;
	position: fixed;
	top: 125px;
	left: 15px;
}
.banner_right_home {
width: 140px;
position: fixed;
top: 125px;
right: 0px;
}
/* end */
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
<script src="<?=HOME?>/js/main.js"></script>
<link rel="stylesheet" type="text/css" href="<?=HOME?>/css/slide.css" />
<script type="text/javascript" src="<?=HOME?>/js/jquery-1.8.2.js" ></script>
<script type="text/javascript" src="<?=HOME?>/js/jquery-ui-1.9.0.custom.min.js" ></script>
<script type="text/javascript" src="<?=HOME?>/js/jquery-ui-tabs-rotate.js" ></script>
<script type="text/javascript">
  $(document).ready(function(){
    $("#featured").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
    $('img').addClass('preview');
  });
</script>
<style type="text/css">
  body {
    background: url('<?=HOME?>/images/topbg.png') no-repeat, url('<?=HOME?>/images/bgr.png');
  }
  #slogan {
    margin: 20px 0 0 20px;
    color: #07c;
    font-size: 15px;
  }
</style>
</head>
<body>

<div class='page'>

<img src="<?=HOME?>/images/bgtop.png" style="" />
<div class='header'>
  <div class='grid logo'> <a href="<?=HOME?>"> <span id='book'>Buy</span> <span id='store'>More</span>
   </a><br><span id='slogan'>Sell Books Online </span> </div>
  <div class='grid search'>
    <div class="input-append">
      <form id="form1" name="form1" method="post" action="search.php">
        <input class="span2" id="appendedInputButton search" type="text" name='ts' placeholder="Tìm Kiếm Tên Sách" >
        <button class="btn btn-info" type="submit"><i class="icon-search icon-white"></i> Search</button>
      </form>
    </div>
  </div>
  <div class='grid user'>
    <ul class="nav nav-pills login">
      <li class="dropdown all-camera-dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <i class='icon-user'></i>
        <?php
           session_start();
           $member_check=$_SESSION['login_member'];

           $ses_sql=mysql_query(" select * from member where email='$member_check' ");

           $row=mysql_fetch_array($ses_sql);


           if(!empty($row['email']))
           {
            echo $row['fullname'];

            ?>
        <b class="caret"></b> </a>
        <ul class="dropdown-menu">
          <li data-filter-camera-type="Zed"><a href="<?=HOME?>/member/member.php">Tài khoản</a></li>
          <li data-filter-camera-type="Bravo"><a href="<?=HOME?>/member/logout.php">Thoát</a></li>
        </ul>
        <?php             

       }
       else {
        
        echo "Thành viên";
        ?>
        <b class="caret"></b> </a>
        <ul class="dropdown-menu">
          <li data-filter-camera-type="all"><a data-toggle="tab" href="#" id="login">Đăng nhập</a></li>
          <li data-filter-camera-type="Alpha"><a data-toggle="tab" href="#" id="signup">Đăng ký</a></li>
          <li data-filter-camera-type="Alpha"><a data-toggle="tab" href="#" id="forgot">Mật khẩu</a></li>
        </ul>
        <?php            
   }

   ?>
      </li>
    </ul>
  </div>
  <div class='cart'>
    <?php
  if(isset($_SESSION['qty']) and $_SESSION['qty'] > 0){
    $count = count($_SESSION['products']);
    if($count > 0){
      $d = '['.$count.']';
    }
  }
  else $d = '';

  ?>
    <a class="" href='#' id='btn-cart'><i class="icon-shopping-cart"></i> Giỏ hàng </a><span class="text-cart"><?php echo $d; ?></span> </div>
</div>
<div id="log-in" title="Đăng nhập">
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
<div id="forgot_pass" title="Mật khẩu">
  <form method='post' action='member/forgot.php'>
    <fieldset>
      <label for="email">Email</label>
      <input type="text" name="email" id="email" value="" placeholder="email@example.com" class="text ui-widget-content ui-corner-all" required>
      <br>
      <input type="submit" value="Submit" class='btn btn-info'>
    </fieldset>
  </form>
</div>
<div id="sign-up" title="Đăng ký">
  <form method='post' action='member/signup.php'>
    <fieldset>
      <label for="name">Họ & tên:</label>
      <input type="text" name="name" id="name" value="" placeholder="Nhập họ tên" class="text ui-widget-content ui-corner-all" required="required">
      <label for="email">Địa chỉ email:</label>
      <input type="email" name="email" id="email" value="" placeholder="example@domain.com" class="text ui-widget-content ui-corner-all" required>
      <label for="phone">Số điện thoại</label>
      <input type="tel" name="phone" id="phone" value="" placeholder="0123456789" class="text ui-widget-content ui-corner-all" required="required">
      <label for="password">Mật khẩu</label>
      <input type="password" name="password" id="password" value="" placeholder="Nhập mật khẩu"  class="text ui-widget-content ui-corner-all" required>
      <br>
      <input type="submit" value="Signup" class='btn btn-info'>
    </fieldset>
  </form>
</div>
<div id="cart" title="Giỏ hàng">
  <?php
  include 'cart.php';
  ?>
</div>
<script src="<?=HOME?>/js/mmenu.js"></script> 
<script>


// resizereinit=true;

// menu[1] = {
//   id:'sidemenu', 
//   fontsize:'100%', 
//   linkheight:22 ,  
//   hdingwidth:210 ,  
//   bartext:'BUY MORE',     

//   menuItems:[ 
// ["Menu"], //create header

// <?php
// $cur = mysql_query("select * from menu");
// while($row = mysql_fetch_array($cur)){
//   echo "

//   [\"{$row[1]}\", \"{$row[2]}\", \"\"],      
  
//   ";
// }
// ?>

// ]}; 

// make_menus();

</script> 
<!-- Doan - left banner -->
<!-- Start Ads -->
<?php
$link1 ="";
$image1="";
$link2 ="";
$image2="";
$result=mysql_query("select link,image_path from ads where state=1 limit 0,2");
$no_row=mysql_num_rows($result);
if($no_row==2){
	echo"<!-- ILOVEYOU-->";
	$i=0;
	while($row=mysql_fetch_array($result)){
		$i++;
		if($i==1){
			$link1=$row[0];$image1=$row[1];
			}
			else
			$link2=$row[0];$image2=$row[1];
		}
		
	?>
	
<div id="divAdRight" class="banner_right_home"> <a href="<?php echo $link1?>"  target="_blank"><img src="<?php echo $image1?>" width="125" /></a> </div>
<div id="divAdLeft" class="banner_left_home"> <a href="<?php echo $link2?>"  target="_blank"><img src="<?php echo $image2?>" width="125" /></a> </div>

<?php
	}
?>
<script> function FloatTopDiv() { startLX = ((document.body.clientWidth -MainContentW)/2)-LeftBannerW-LeftAdjust , startLY = TopAdjust+80; startRX = ((document.body.clientWidth -MainContentW)/2)+MainContentW+RightAdjust , startRY = TopAdjust+80; var d = document; function ml(id) { var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id]; el.sP=function(x,y){this.style.left=x + 'px';this.style.top=y + 'px';}; el.x = startRX; el.y = startRY; return el; } function m2(id) { var e2=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id]; e2.sP=function(x,y){this.style.left=x + 'px';this.style.top=y + 'px';}; e2.x = startLX; e2.y = startLY; return e2; } window.stayTopLeft=function() { if (document.documentElement && document.documentElement.scrollTop) var pY = document.documentElement; else if (document.body) var pY = document.body; if (document.body.scrollTop > 30){startLY = 3;startRY = 3;} else {startLY = TopAdjust;startRY = TopAdjust;}; ftlObj.y += (pY+startRY-ftlObj.y)/16; ftlObj.sP(ftlObj.x, ftlObj.y); ftlObj2.y += (pY+startLY-ftlObj2.y)/16; ftlObj2.sP(ftlObj2.x, ftlObj2.y); setTimeout("stayTopLeft()", 1); } ftlObj = ml("divAdRight"); //stayTopLeft(); ftlObj2 = m2("divAdLeft"); stayTopLeft(); } function ShowAdDiv() { var objAdDivRight = document.getElementById("divAdRight"); var objAdDivLeft = document.getElementById("divAdLeft"); if (document.body.clientWidth < 1000) { objAdDivRight.style.display = "none"; objAdDivLeft.style.display = "none"; } else { objAdDivRight.style.display = "block"; objAdDivLeft.style.display = "block"; FloatTopDiv(); } } </script> <script> document.write("<script type='text/javascript' language='javascript'>MainContentW = 1052;LeftBannerW = 140;RightBannerW = 140;LeftAdjust = 5;RightAdjust = 5;TopAdjust = 125;ShowAdDiv();window.onresize=ShowAdDiv;;<\/script>"); </script> 
<!-- End Ads -->