<?php
include('config.php');
?>
<style>
.BottomBox {
height: 22px;
background: url(images/dot.png) repeat-x bottom;
text-align: center;
}
.vdot {
background: url(images/vdot.png) repeat-y left;
padding-left:3px;
}
</style>
<div class="BottomBox">            
        </div>
        <br/>
<div class="footer"><!--footer-->
  <div class="info"> 
  
  
  <span id='grid1'>
    <p><b>Buy More</b></p>
    <a href="<?php echo ABOUT?>">Về chúng tôi</a><br>
    <a href="<?php echo POLICY?>">Quy chế sàn giao dịch</a><br>
    <a href="<?php echo FAQ?>">Hỏi đáṕ</a> </span>
    
    
    
     <span id='grid2'>
    <p><b>Liên hệ</b></p>
    <a href='<?=HOME?>/contact.php'>Liên hệ với chúng tôi</a><br>
    <font color="#0033FF"><?php echo MOBILE?></font><br />
Từ 8h-21h, kể cả Thứ 7-CN<br/>
   </span> 
   
   <span id='grid3'>
    <p><b>Contact</b></p>
    <a href="<?php echo FACEBOOK?>" target="_blank"><img src="img/facebook.png" /></a> <a href="mailto:<?php echo EMAIL?>"><img src="img/google.png" /></a> <a href="<?php echo TWITTER?>" target="_blank"><img src="img/twitter.png" /></a> <br>
     <br>Design by <span class='design'> <a href="<?=HOME?>/info.php">Group 3<sup>rd</sup></a> 
    <br>
    </span> </div>
</div>
</div>
<a href="#" class="scrollToTop"><img src="<?=HOME?>/img/top.png" id="top" /></a>
<?php mysql_close(); ?>
<img src="<?=HOME?>/images/footer.png" />
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});
</script>