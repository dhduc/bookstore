<div id="shopping-cart">
    <?php
    error_reporting(0);
    session_start();
    include_once("config.php");
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    if(isset($_SESSION["products"])){
        $total = 0;
        echo '<ol>';
        foreach ($_SESSION["products"] as $cart_itm)
        {

            echo '<li class="cart-itm">';
            echo '<span id="name">'.ucwords($cart_itm["name"]).'</span>';
            echo '<span class="remove-itm pull-right"><a href="'.HOME.'/cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'"> <i class="icon-trash"></i></a></span>';
            echo '<div class="p-code">Product ID : '.$cart_itm["code"].'</div>';
            echo '<div class="p-qty">Số lượng : '.$cart_itm["qty"].'</div>';
            echo '<div class="p-price">Đơn giá :'.$cart_itm["price"].' VND</div>';
            echo '</li>';
            $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
            $total = ($total + $subtotal);
        }
        echo '</ol>';
        echo '<span class="check-out-txt"><strong>Tổng tiền : '.$total.' VND</strong>
        <br>
        <a href="'.HOME.'/view_cart.php" class="btn btn-info">Thanh toán</a></span>';
        echo '<span class="empty-cart pull-right"><a class="btn btn-info" style="width: 50px;" href="'.HOME.'/cart_update.php?emptycart=1&return_url='.$current_url.'">Empty</a></span>';
    }
    else{
        echo 'Giỏ hàng của bạn trống';
    }
    ?>
</div>