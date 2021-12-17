<?php

use App\Product;
use App\User;
use Database\Session;

require_once '../../../private/initialize.php';


$response = file_get_contents('php://input');
$data     = json_decode($response, true);

// check if user is logged in or not
if (!Session::getSessionData('user_logged')) {
    $return['status'] = 'userNotLoggedIn';
    $return['url'] = "dashboard/login.php";
    Session::setSessionData('error_message', 'Please login to purchase a product!');
    echo json_encode($return);
    die;
}

// reciving all data and calculation
$product_id = $data['productId'];
$quantity = $data['orderQuantity'];

$product = Product::find($product_id);
$unit_price = $product['unit_price'];
$product_location = $product['location'];

$user_id = Session::getSessionData('user_logged');
$user = User::findUser($user_id);
print_r($user);
die;
$amount = $unit_price * $quantity;

// // create new order
// $create_new_order = Order::create($customer_name, $ordered_items, $ordered_amount);
// if ($create_new_order) {
//     $return['status'] = 'success';
// } else {
//     $return['status'] = 'failure';
// }
// echo json_encode($return);
