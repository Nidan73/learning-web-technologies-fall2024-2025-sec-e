<?php
session_start();
if (isset($_COOKIE['status']) && $_COOKIE['status'] === 'logged_in') {
    header('Location: view/home.php');
    exit;
} else {
    header('Location: view/login.html');
    exit;
}
?>
