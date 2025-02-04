<?php
session_start();
require_once('../model/userModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $input = json_decode(file_get_contents('php://input'), true);

    
    $user_id = $input['user_id'];
    $username = trim($input['username']);
    $email = trim($input['email']);
    $password = trim($input['password']);

   
    if (empty($username) || empty($email) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit;
    }

  
    $result = updateUser($user_id, $username, $email, $password);

    
    if ($result) {
        echo json_encode(['success' => true, 'message' => 'Profile updated successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update profile.']);
    }
} else {
    
    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
