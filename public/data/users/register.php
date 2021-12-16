<?php
require_once '../../../private/initialize.php';

use App\User;
use Database\Session;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = file_get_contents('php://input');
    $data     = json_decode($response, true);

    // reciving all data
    $name    = $data['name'];
    $email    = $data['email'];
    $password = md5($data['password']);

    // check if user exist? if not then create a new user
    if (User::checkUser($email)) {
        $return['status'] = 'user_exist';
    } else if ($user_register = User::register($name, $email, $password)) {
        $return['status'] = 'success';
        $return['url'] = "login.php";
        Session::setSessionData('success_message', 'Registration successfull! Please login.');
    } else {
        $return['status'] = 'failure';
    }
    echo json_encode($return);
}
