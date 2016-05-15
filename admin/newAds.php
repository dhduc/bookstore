<?php
include('lock.php');
include('layout/header.php');
?>

<?php
  
  if(isset($_POST['btAdd'])){
    $provider = $_POST['provider'];
    $link = $_POST['link'];
	$state=$_POST['state'];
   	$image_path="";
    if(isset($_FILES['myImage'])){

		
      copy($_FILES['myImage']['tmp_name'], '../ads/'.$_FILES['myImage']['name']) ;
       $image_path = "".HOME."/ads/".$_FILES['myImage']['name'];

    }
    $sql = "
      INSERT INTO `ads`( `provider`, `link`, `image_path`, `state`) VALUES ( '$provider','$link','$image_path',$state)
    ";
    $isAdded=mysql_query($sql);
 if($isAdded==1){?>
	 <script>
	 alert("Đã thêm !");
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
      <input type="text" name="provider" id="provider" placeholder="Tên nhà quảng cáo" size=70 required="required"/>
    </p>
      <p>Link:*</p>
      <p>
        <label for="info"></label>
      <input type="url" name="link" id="link" placeholder="Website"  size=70  required="required"/>
      </p>
      <p>Image:*</p>
      <p>
        <label for="thumb"></label>
        <input  size=70 type="file" name="myImage"/>
      </p>
      <p id='status'>State: 
        <input type="radio" name="state" id="radio" value="1" />        
      Active 
      <input type="radio" name="state" id="radio2" value="0" checked="checked"  />
     
      Deactive
      <input type="submit" name="btAdd" id="btAdd" value="Lưu" class='btn btn-info' />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" id="reset" value="Làm lại" class='btn btn-info' />
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