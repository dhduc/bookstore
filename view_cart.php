<?php
/*
Create by Duc Huu, re-edit by Doan Vu

*/?>
<?php include 'header.php'; 
include('config.php');
?>
<?php
$id  = $_GET['id'];
$row = mysql_fetch_array(mysql_query("select * from post where id = '$id' ")); 
//declare variable for tranmission
			$pro_id="";
			$sdt="";
			$ht="";
			$diachi="";
			$soluong="";
			$thanhtien="";
			$trangthai="Chờ xác nhận";
			//end
?>
<?php
//Add

if(isset($_POST['btOrder'])){
	session_start();
	 $isdone="";
			$pro_id=$_POST['pro_id'];
			$sdt=$_POST['tbPhone'];
			$ht=$_POST['tbName'];
			$diachi=$_POST['tbAdd'];
			$soluong=$_POST['post_qty'];
			$thanhtien=$_POST['thanhtien'];
			$trangthai="Chờ xác nhận";
			 
                     foreach ($_SESSION["products"] as $cart_itm)
                    {
						$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
                      $total = ($total + $subtotal);
					//  <form name='form1' method='post' action='".HOME."/save_cart.php'>
					$pro_id=$cart_itm["code"];
					$soluong=$cart_itm["qty"];
					$thanhtien=$cart_itm["price"]*$soluong;
					//push
					 $sql = "
        INSERT INTO `order`(`product_id`, `sodt`, `hoten`, `diachi`, `soluong`, `thanhtien`, `trangthai`) VALUES ($pro_id,'$sdt','$ht','$diachi',$soluong,$thanhtien,'$trangthai')
        ";
		 $isdone= mysql_query($sql);
					}

                
			
		//echo $sql;
      
		
		unset($_SESSION['products']);	
        
        if($isdone==1){
			?>
			<script>
			alert("Đã mua thành công !");
			window.location="<?php echo HOME?>";
			</script>
			
			<?php
			}else{
				?>
                <script>
			alert("Đã mua thất bại !\nVui lòng thử lại.");
			window.location="<?php echo HOME?>";
			</script>
                <?php
				}
              


}
?>
 <div class='nav'>
      <div id="" class="drop">
        <ul class="drop_menu">
          <li class='active'><a href='<?=HOME?>'><span><i class='icon-home icon-white'></i> Home</span></a></li>
          <?php
          $cur = mysql_query("select * from menu");
          while($row = mysql_fetch_array($cur)){
            echo "
            <li><a href='".$row['item_url']."'>".$row['item_name']."</a>
            ";
            $supper_id=$row[0];
            $sub=mysql_query("select * from submenu where item_id=".$supper_id);
            if(mysql_num_rows($sub)>0){
              echo "<ul>";
              while($row=mysql_fetch_array($sub)){
                echo "
                <li><a href='{$row[3]}'>{$row[2]}</a></li>
                ";  
              }
              echo "</ul>";
            }
            echo "</li>";
          }
          ?>
        </ul>
      </div>
    </div>
<div class='index_view'>
 <a href="<?php echo HOME?>">Home</a> > Shopping cart
  <br>
  <p id='detail'>Chi Tiết Giỏ Hàng</p>

  <div id='post_view'>



    <table width="811" height="" border="0">
      <tr>
        <td width="450" valign="top" id='view-thumb'>

         <?php
           session_start();
           $member_check=$_SESSION['login_member'];				
           $ses_sql=mysql_query(" select * from member where email='$member_check' ");
           $row=mysql_fetch_array($ses_sql);
			
			

           if(!empty($row['email']))
           {
            
			$sdt= $row[4];
			$ht= $row[3];
            ?>

         <form id="form1" name="form1" method="post" action="">
          <table width="450" height="359" border="0" align="">
            <tr>
              <td height="48" colspan="2"><p id="title">Thông tin nhận hàng</p></td>
            </tr>
            <tr>
              <td width="120"><b>Họ tên:*</b></td>
              <td width="299"><label for="txtname"></label>
                <input type="text" name="tbName" id="tbName" readonly="readonly" value="<?php echo $row[3] ?>"/></td>
              </tr>
              <tr>
                <td width='120'><b>Số điện thoại:*</b></td>
                <td><label for="txtphone"></label>
                  <input type="text" name="tbPhone" id="tbPhone" readonly="readonly" value="<?php echo $row[4]?>"/></td>
                </tr>
                <tr>
                  <td><b>Địa chỉ:*</b></td>
                  <td><label for="txtaddress"></label>
                    <input type="text" name="tbAdd" id="tbAdd" required/></td>
                  </tr>
                  <tr>
                    <td><b>Ghi chú:</b></td>
                    <td><label for="txtnote"></label>
                      <textarea name="txtnote" id="txtnote" cols="45" rows="3"></textarea></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input type="submit" name="btOrder" id="btOrder" value="Xác nhận" class='btn btn-info' /></td>
                    </tr>
                  </table>
                 
                      
                </form>
                <?php } 
                else {
                  ?>
				  <script>
                  alert('You have to login');
                  window.location = "<?php echo HOME?>";
                  </script>
                  <?php
                }
                ?>



              </td>
              <td width="620" valign='top'>
                <div id="shopping-cart">
                  <?php
				  //Doan's customization
                  error_reporting(0);
                  session_start();
                  include_once("config.php");
                  $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

                  if(isset($_SESSION["products"]))
                  {
                    $total = 0;
                    echo '<ol>';

                    foreach ($_SESSION["products"] as $cart_itm)
                    {

                      echo '<li class="cart-itm">';
                      echo '<span id="name">'.ucwords($cart_itm["name"]).'</span>';
                      echo '<span class="remove-itm pull-right"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'"> <i class="icon-trash"></i></a></span>';
                      echo '<div class="p-code">Product ID : '.$cart_itm["code"].'</div>';
                      echo '<div class="p-qty">Số lượng : '.$cart_itm["qty"].'</div>';
                      echo '<div class="p-price">Đơn giá :'.$cart_itm["price"].' <u>đ</u></div>';
                      echo '</li>';
                      $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
                      $total = ($total + $subtotal);
					//  <form name='form1' method='post' action='".HOME."/save_cart.php'>
					$pro_id=$cart_itm["code"];
					$soluong=$cart_itm["qty"];
					$thanhtien=$cart_itm["price"]*$soluong;
                      echo "
                      
                      <input type='hidden' name='member_id' id='member_id' value='".$_SESSION['login_member']."'>
                      <input type='hidden' name='post_id' id='post_id' value='".$cart_itm["code"]."'>
                      <input type='hidden' name='post_name' id='post_name' value='".$cart_itm["name"]."'>
                      <input type='hidden' name='post_qty' id='post_qty' value='".$cart_itm["qty"]."'>
                      <input type='hidden' name='post_price' id='post_price' value='".$cart_itm["price"]."'>
                     
                      </form>

                      ";
					  // <input type='submit' name='save' id='save' value='Lưu' class='btn btn-info'>
                    }
                    echo '</ol>';
                    echo '<span class="check-out-txt text-warning lead"><strong>Tổng tiền : '.$total.'<u>đ</u></strong></span><br>';
                    
                  }
                  else{
                    echo 'Giỏ hàng của bạn trống';
                  }
                  ?>
                </div>
              </td>
            </tr>
          </table>

          <br/>

        </div>
      </div>	
      <br/>
      <?php include 'footer.php'; ?>
      <script type="text/javascript">
      $(function(){
        $('#save').click(function(){
          $('#save').removeClass('btn btn-info');
        });
      });
      </script>