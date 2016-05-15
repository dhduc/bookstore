<?php
include('lock.php');
include('layout/header.php');
?>


<div class="col-sm-9 col-md-10 main">
  
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
  </p>
  
  <?php
  if(isset($_GET['action'])){
    if($_GET['action'] == 'view'){
      include 'modules/order/view.php';  
    }
    if($_GET['action'] == 'insert'){
      include 'modules/order/insert.php';  
    }
    if($_GET['action'] == 'update'){
      include 'modules/order/update.php';  
    }
    if($_GET['action'] == 'delete'){
      include 'modules/order/delete.php';  
    }
  }
  else {
    include 'modules/order/list.php';
  }
  ?>

</div>





<?php include 'layout/footer.php'; ?>  