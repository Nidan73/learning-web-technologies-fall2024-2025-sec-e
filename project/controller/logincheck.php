<?php
session_start();
require_once('../model/userModel.php'); 

header('Content-Type: application/json');

$response = [];

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['username']) && isset($data['password'])) {
    $username = trim($data['username']);
    $password = trim($data['password']);

    $user = login($username, $password); 

    if ($user) {
   
        setcookie('status', 'true', time() + 3600, '/');
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_type'] = $user['user_type'];
        $_SESSION['user_id'] = $user['user_id'];

        $response['status'] = 'success';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Invalid username or password!';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Username and password are required!';
}


echo json_encode($response);

?>