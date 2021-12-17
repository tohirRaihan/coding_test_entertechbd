<?php
require_once '../../../private/initialize.php';

use App\User;
use Database\Session;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = file_get_contents('php://input');
    $data     = json_decode($response, true);
    // reciving all data
    $email    = $data['email'];
    $password = md5($data['password']);

    // logging in
    $user_login = User::login($email, $password);
    if ($user_login) {
        $return['status'] = 'success';
        if ((int)$user_login['role'] === 1) {
            $return['url'] = "index.php";
        } else {
            $return['url'] = "../index.php";
        }
        Session::setSessionData('user_logged', $user_login['id']);
        Session::setSessionData('user_role', $user_login['role']);
        Session::setSessionData('user_name', $user_login['name']);
    } else {
        $return['status'] = 'failure';
    }
    echo json_encode($return);
}
