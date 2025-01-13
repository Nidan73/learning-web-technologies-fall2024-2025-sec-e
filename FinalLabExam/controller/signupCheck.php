<?php
require_once '../model/userModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    
    if (!empty($username) && !empty($name) && !empty($password) && !empty($contact)) {
        registerUser($username, $name, $password, $contact);
        header('Location: ../view/login.html');
    } else {
        echo "All fields are required!";
    }
}
?>
