<?php
require_once '../model/userModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (validateLogin($username, $password)) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: ../view/userlist.php');
    } else {
        echo "Invalid username or password!";
    }
}
?>
