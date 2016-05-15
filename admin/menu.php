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
      include 'modules/menu/view.php';  
    }
    if($_GET['cat'] == 'insert'){
      include 'modules/menu/insert.php';  
    }
    if($_GET['cat'] == 'update'){
      include 'modules/menu/update.php';  
    }
    if($_GET['cat'] == 'delete'){
      include 'modules/menu/delete.php';  
    }
  }
  else {
    include 'modules/menu/list.php';
  }
  ?>

</div>

<?php include 'layout/footer.php'; ?>          

