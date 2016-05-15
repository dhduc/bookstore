<?php
include('lock.php');
include('layout/header.php');
?>
<?php
 $provider="";
 $link="";
 $state="";
$image_path="";
/*Doan's customization*/
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$adsR=mysql_query("SELECT `ads_id`, `provider`, `link`, `image_path`, `state` FROM `ads` WHERE `ads_id`=$id");
	while($row=mysql_fetch_array($adsR)){
		
		$provider=$row[1];
				$link=$row[2];
						$state=$row[4];
								
		}
	}
?>
<?php
  
  if(isset($_POST['btUpdate'])){
    $provider = $_POST['provider'];
   $link = $_POST['link'];
	$state=$_POST['state'];
   	$image_path="";
    if(isset($_FILES['myImage'])){
		//echo "".HOME."/ads/".$_FILES['myImage']['name'];     	
      copy($_FILES['myImage']['tmp_name'], '../ads/'.$_FILES['myImage']['name']) ;
       $image_path = "".HOME."/ads/".$_FILES['myImage']['name'];
	}
	if($image_path=="".HOME."/ads/"){
	 
	$sql = "UPDATE `ads` SET `provider`='$provider',`link`='$link',`state`=$state WHERE `ads_id`=$id
    ";
    }else
	  $sql = "
	   UPDATE `ads` SET `provider`='$provider',`link`='$link',`image_path`='$image_path',`state`=$state WHERE `ads_id`=$id
    ";
	
    
    $isAdded=mysql_query($sql);
 if($isAdded==1){?>
	 <script>
	 alert("Đã cập nhật !");
	 window.location="ads.php";
	 </script>
	 <?php
	 }else{?>
		 	 <script>
	 alert("Đã có lỗi xảy ra\nVui lòng kiểm tra lại dữ liệu !");
	 </script>
		 
		 <?php }
    
    //echo $sql;
    
  }
?>      
<div class="col-sm-9 col-md-10 main">   
<h2 class='text-info'>
  <p align="center"><b>Thêm quảng cáo</b></p>
</h2>   
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
<center>
<table width="933" height="437" border="0" align="center">
  <tr>
    <td width="622" valign="top"><p>
    <p>Provider:*</p>
      <label for="name"></label>
      <input type="text" name="provider" id="provider" placeholder="Tên nhà quảng cáo" size=70 required="required" value="<?php echo $provider?>"/>
    </p>
      <p>Link:*</p>
      <p>
        <label for="info"></label>
      <input type="url" name="link" id="link" placeholder="Website"  size=70  required="required" value="<?php echo $link?>"/>
      </p>
      <p>Image:*</p>
      <p>
        <label for="thumb"></label>
        <input  size=70 type="file" name="myImage"/>
      </p>
      <p id='status'>State: 
        <input type="radio" name="state" id="radio" value="1" <?php if($state==1) echo "checked='checked'";?>/>        
      Active 
      <input type="radio" name="state" id="radio2" value="0" <?php if($state==0) echo "checked='checked'";?>  />
     
      Deactive
      <input type="submit" name="btUpdate" id="btUpdate" value="Lưu" class='btn btn-info' />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" id="reset" value="Làm lại" class='btn btn-info' />
      </p>
      
      <p align="center">
        
      </p>
      </td>
  </tr>
</table>
</center>
</form>
   </div>       
<?php mysql_close(); ?>
<?php include 'layout/footer.php'; ?>