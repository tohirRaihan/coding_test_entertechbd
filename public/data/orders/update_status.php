<?php

require_once '../../../private/initialize.php';

use App\Order;
use Database\Session;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = file_get_contents('php://input');
    $data     = json_decode($response, true);
    // reciving all data
    $id     = $data['id'];
    $status = $data['status'];

    // update status
    $update_status = Order::updateStatus($status, $id);
    if ($update_status) {
        $return['status'] = 'success';

        Session::setSessionData('success_message', 'Status updated successfully!');
    } else {
        $return['status'] = 'failure';
    }
    echo json_encode($return);
}
