<?php include '../header.php'; ?>
<?php
include("../config.php");
session_start();
$error = '';
?>
<?php

if(isset($_POST['login'])){

  $myemail=mysql_real_escape_string($_POST['email']); 
  $mypassword=mysql_real_escape_string($_POST['password']); 


  $sql="SELECT id FROM member WHERE email='$myemail' and password='$mypassword'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);

  $count=mysql_num_rows($result);


  if($count==1){
    session_start();
    $_SESSION['login_member']=$myemail;
    header("location: ".HOME."/member/member.php");
  }
  else {
    $error="Your Login Name or Password is invalid";
  }

}

?>
<div class='index_view'>
  Trang chủ :: <a href="#">Home </a>> Login
  <br>
  <div class='login'>
    <form method='post' action=''>
      <fieldset>
        <label for="email">Email</label>
        <input type="text" name="email" id="email" value="" placeholder="email@example.com" class="text ui-widget-content ui-corner-all" required>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="" placeholder="" class="text ui-widget-content ui-corner-all" required>
        
        <br>
        <input type="submit" name='login' value="Login" class='btn btn-info'>
        
      </fieldset>
    </form>
  </div>
</div>	
<br/>
<?php include '../footer.php'; ?>