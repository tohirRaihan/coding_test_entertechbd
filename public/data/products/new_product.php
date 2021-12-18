<?php

require_once '../../../private/initialize.php';

use App\Product;
use Database\Session;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = file_get_contents('php://input');
    $data     = json_decode($response, true);

    // reciving all data
    $name       = $data['name'];
    $unit_price = $data['unitPrice'];
    $location  = $data['location'];

    // creating new product
    $create_new_product = Product::create($name, $unit_price, $location);
    if ($create_new_product) {
        $return['status'] = 'success';
        Session::setSessionData('success_message', 'New product has been created successfully!');
    } else {
        $return['status'] = 'failure';
    }
    echo json_encode($return);
}
