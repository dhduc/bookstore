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
      include 'modules/category/view.php';  
    }
    if($_GET['cat'] == 'insert'){
      include 'modules/category/insert.php';  
    }
    if($_GET['cat'] == 'update'){
      include 'modules/category/update.php';  
    }
    if($_GET['cat'] == 'delete'){
      include 'modules/category/delete.php';  
    }
  }
  else {
    include 'modules/category/list.php';
  }
  ?>

</div>

<?php include 'layout/footer.php'; ?>          

