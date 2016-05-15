<meta charset="utf8" />
<h2 class='text-info'>Thông tin liên hệ:</h2>
<?php
if(isset($_GET['contact_id'])){ 
  $id = $_GET['contact_id'];
        $row = mysql_fetch_array(mysql_query("select * from contact where contact_id = '$id' "));  

 }
    
?>
<?php
  if(isset($_POST['btContact'])){
	$to      = $_POST['email'];//'vudoanbt3@gmail.com';
	$subject = 'Re:'.$_POST['name'];;
	$message = $_POST['answer'];//'hello';
	$headers = 'From: contact@buymore.com.vn' . "\r\n" .
    "Reply-To: {$to} \r\n\"";
	$isSend=mail($to,$subject,$message,$headers);
	if($isSend==1){
		?>
        <script>
		alert("Đã phản hồi thành công !");
		window.location="<?php echo HOME.'/admin/contact.php'?>";
		</script>
        <?php
		}
		else
		{
			?>
             <script>
		alert("Đã phản hồi thát bại !");
		window.location="<?php echo HOME.'/admin/contact.php'?>";
		</script>
            <?php
			}
    
  }
?>
<form class="form" action="" method="post" name="frmContact" onsubmit="return validateForm()">
  <p class="name">
    <label for="name"><b>Họ & tên:</b></label>
    <input type="text" name="name" id="name" readonly="readonly" value="<?php echo $row[1]; ?>" />
  </p>
  <p class="email">
    <label for="email"><b>E-mail:</b></label>
    <input type="text" name="email" id="email" readonly="readonly" value="<?php echo $row[2]; ?>" />
  </p>
  <p class="web">
    <label for="web"><b>Website:</b></label>
    <input type="text" name="web" id="web" readonly="readonly" value="<?php echo $row[3]; ?>" />
  </p>
  <p class="text">
    <label for="text"><b>Ý kiến</b>:</label>
    <textarea name="text" placeholder="Your message here" readonly="readonly" ><?php echo $row[4]; ?></textarea>
  </p>
  <p class="answer">
    <label for="answer"><b>Trả lời:</b></label>
    <textarea name="answer" placeholder="Phản hồi"></textarea>
  </p>
  <p class="submit">
    <input type="submit" value="Phản hồi" class='btn btn-info' name="btContact">
    <input type="reset" value="Làm lại" class='btn btn-primary'>
  </p>
</form>
<?php mysql_close(); ?>
