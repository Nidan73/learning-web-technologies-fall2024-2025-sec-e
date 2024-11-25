<?php
session_start();

function checkCredentials($username, $password) {
    foreach ($_SESSION['users'] as $user) {
        if ($user['name'] === $username && $user['password'] === $password) {
            return true;
        }
    }
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (checkCredentials($username, $password)) {
        $_SESSION['logged_in_user'] = $username;

      
        if (isset($_POST['remember'])) {
            setcookie('username', $username, time() + 86400 * 30);
            setcookie('password', $password, time() + 86400 * 30); 
        }

    
        header("Location: home.php");
        exit();
    } else {
        header("Location: login.html?error=invalid");
        exit();
    }
}
?>
