<?php
session_start();


if (isset($_COOKIE['username'])) {
    $rememberedUsername = $_COOKIE['username'];
} else {
    $rememberedUsername = null;
}


unset($_SESSION['logged_in_user']);


if (!$rememberedUsername) {
    setcookie('username', '', time() - 3600);
}


if ($rememberedUsername) {
    setcookie('username', $rememberedUsername, time() + (86400 * 30)); 
}

header("Location: login.html");
exit;
?>
