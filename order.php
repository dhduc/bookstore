   <meta charset="utf8"/>
        <?php
        include 'config.php';
        session_start();
      		$pro_id=$_POST['pro_id'];
			$sdt=$_POST['tbPhone'];
			$ht=$_POST['tbName'];
			$diachi=$_POST['tbAdd'];
			$soluong=$_POST['post_qty'];
			$thanhtien=$_POST['thanhtien'];
			$trangthai="Chờ xác nhận";
        $sql = "
        INSERT INTO `order`(`product_id`, `sodt`, `hoten`, `diachi`, `soluong`, `thanhtien`, `trangthai`) VALUES ($pro_id,'$sdt','$ht','$diachi',$soluong,$thanhtien,'$trangthai')
        ";
		//echo $sql;
       $isdone= mysql_query($sql);
		
		unset($_SESSION['products']);	
        
        if($isdone==1){
			?>
			<script>
			alert("Đã đặt hàng thành công !");
			window.location="<?php echo HOME?>";
			</script>
			
			<?php
			}else{
				?>
                <script>
			alert("Đặt hàng thất bại !\nVui lòng thử lại.");
			window.location="<?php echo HOME?>";
			</script>
                <?php
				}
        ?>            

        <?php mysql_close(); ?>