<?php
include('lock.php');
include('layout/header.php');
?>


<div class="col-sm-9 col-md-10 main">
  
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
  </p>
  
  <?php
  if(isset($_GET['cat'])){
    if($_GET['cat'] == 'view'){
      include 'modules/member/view.php';  
    }
    if($_GET['cat'] == 'insert'){
      include 'modules/member/insert.php';  
    }
    if($_GET['cat'] == 'update'){
      include 'modules/member/update.php';  
    }
    if($_GET['cat'] == 'delete'){
      //include 'modules/member/delete.php';  
	  $isDeleted=mysql_query("delete from member where id=".$_GET['member_id']);
	  if($isDeleted==1){
		  ?>
          <script>
		  alert("Xóa thành công !");
		  window.location="member.php";
		  </script>
          <?php
		  
		  }
		  else
		  {
			  ?>
               <script>
		  alert("Xóa thất bại !");
		  
		  </script>
          
              <?php
			  }
    }
  }
  else {
    include 'modules/member/list.php';
  }
  ?>

</div>

<?php include 'layout/footer.php'; ?>          

