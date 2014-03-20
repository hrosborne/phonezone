<?php

// includes the database functions
include('db_fns.php');

// includes cart functions
include('cart_fns.php');

session_start();

// sets up the defaults for the cart
if(!isset($_SESSION['shopcart']))
{
	$_SESSION['shopcart'] = array();
	$_SESSION['total_items']= 0;
	$_SESSION['total_price']='0.00';
}

// defaults to index view unless a different view is requested
$view = empty($_GET['view']) ? 'index' : $_GET['view'];

//used for layout
$controller = 'shop' ;

// checks which view is requested
switch($view) {

case "update_cart";

	update_cart();
	$_SESSION['total_items'] = total_items($_SESSION['shopcart']);
	$_SESSION['total_price'] = total_price($_SESSION['shopcart']);
	// header redirects back to the checkout page after update complete
	header('Location: ?view=checkout');
break;


case "add_to_cart_search";
	// has to be a seperate view for each product type as each product type is on a different page
	$id=$_GET['id'];
	$add_item = add_to_cart($id);
	$_SESSION['total_items'] = total_items($_SESSION['shopcart']);
	$_SESSION['total_price'] = total_price($_SESSION['shopcart']);
	header('Location: index.php');
break;

case "add_to_cart_android";
	// has to be a seperate view for each product type as each product type is on a different page
	$id=$_GET['id'];
	$add_item = add_to_cart($id);
	$_SESSION['total_items'] = total_items($_SESSION['shopcart']);
	$_SESSION['total_price'] = total_price($_SESSION['shopcart']);
	header('Location: android.php');
break;

case "add_to_cart_iphone";

	$id=$_GET['id'];
	$add_item = add_to_cart($id);
	$_SESSION['total_items'] = total_items($_SESSION['shopcart']);
	$_SESSION['total_price'] = total_price($_SESSION['shopcart']);
	header('Location: iphone.php');
break;

case "add_to_cart_all";

	$id=$_GET['id'];
	$add_item = add_to_cart($id);
	$_SESSION['total_items'] = total_items($_SESSION['shopcart']);
	$_SESSION['total_price'] = total_price($_SESSION['shopcart']);
	header('Location: all.php');
break;

case "add_to_cart_bb";

	$id=$_GET['id'];
	$add_item = add_to_cart($id);
	$_SESSION['total_items'] = total_items($_SESSION['shopcart']);
	$_SESSION['total_price'] = total_price($_SESSION['shopcart']);
	header('Location: bb.php');
break;

case "add_to_cart_basic";

	$id=$_GET['id'];
	$add_item = add_to_cart($id);
	$_SESSION['total_items'] = total_items($_SESSION['shopcart']);
	$_SESSION['total_price'] = total_price($_SESSION['shopcart']);
	header('Location: basic.php');
break;

case "add_to_cart_acc";

	$id=$_GET['id'];
	$add_item = add_to_cart($id);
	$_SESSION['total_items'] = total_items($_SESSION['shopcart']);
	$_SESSION['total_price'] = total_price($_SESSION['shopcart']);
	header('Location: acc.php');
break;

case "add_to_cart_sim";

	$id=$_GET['id'];
	$add_item = add_to_cart($id);
	$_SESSION['total_items'] = total_items($_SESSION['shopcart']);
	$_SESSION['total_price'] = total_price($_SESSION['shopcart']);
	header('Location: sim.php');
break;







}

//includes layout for controller
include 'views/layouts/'.$controller.'.php';
?>

 