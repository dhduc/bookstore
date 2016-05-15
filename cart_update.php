<?php
session_start();
include_once("config.php");

if(isset($_GET["emptycart"]) && $_GET["emptycart"]==1)
{
		$return_url = base64_decode($_GET["return_url"]); //return url
		unset($_SESSION["products"]);
		unset($_SESSION["qty"]);
		
		
		header('Location:'.$return_url);
	}

	if(isset($_POST["type"]) && $_POST["type"]=='add')
	{
		$product_code 	= filter_var($_POST["product_code"], FILTER_SANITIZE_STRING); //product code
		$product_qty 	= filter_var($_POST["product_qty"], FILTER_SANITIZE_NUMBER_INT); //product code
		$qty 	= filter_var($_POST["qty"], FILTER_SANITIZE_NUMBER_INT); //product code
		$product_price 	= filter_var($_POST["product_price"], FILTER_SANITIZE_NUMBER_FLOAT); //product price
		$return_url 	= base64_decode($_POST["return_url"]); //return url
		$_SESSION['qty'] += $qty;
		
		$results = mysql_query("SELECT name,price FROM post WHERE id='$product_code'");
		$obj = mysql_fetch_object($results);
		
		if ($results) { 
			
			$new_product = array(array('name'=>$obj->name, 'code'=>$product_code, 'qty'=>$product_qty, 'price'=>$obj->price));
			
			if(isset($_SESSION["products"])) 
			{
				$found = false; 
				
				
				foreach ($_SESSION["products"] as $cart_itm) 
				{
					if($cart_itm["code"] == $product_code){ 

						$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$product_qty, 'price'=>$cart_itm["price"]);
						$found = true;
					}else{
						$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
					}
				}
				
				if($found == false) 
				{
					$_SESSION["products"] = array_merge($product, $new_product);
				}else{
					$_SESSION["products"] = $product;
				}
				
			}else{
				$_SESSION["products"] = $new_product;
			}
			
		}
		
		
		header('Location:'.$return_url);
	}

	if(isset($_GET["removep"]) && isset($_SESSION["products"]))
	{
		$product_code 	= $_GET["removep"]; 
		$return_url 	= base64_decode($_GET["return_url"]); 
		$_SESSION['qty'] -= 1;

		
		foreach ($_SESSION["products"] as $cart_itm) 
		{
			if($cart_itm["code"]!=$product_code){ 
				$product[] = array('name'=>$cart_itm["name"], 'code'=>$cart_itm["code"], 'qty'=>$cart_itm["qty"], 'price'=>$cart_itm["price"]);
			}
			
			$_SESSION["products"] = $product;
			
		}
		
		header('Location:'.$return_url);
	}

	mysql_close();
	?>