<?php

require_once '../../../private/initialize.php';

use App\Order;
use App\Product;
use App\User;
use Database\Session;

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
$user_location = $user['location'];

if ($user_location === $product_location) {
    $amount = $unit_price * $quantity * 0.75;
    $return['successMessage'] = 'Hurrah! Your order placed successfully and you get 25% discount';
} else {
    $amount = $unit_price * $quantity;
    $return['successMessage'] = 'Your order placed successfully!';
}

// create new order
$create_new_order = Order::create($user_id, $product_id, $quantity, $amount);
if ($create_new_order) {
    $return['status'] = 'success';
} else {
    $return['status'] = 'failure';
}
echo json_encode($return);
