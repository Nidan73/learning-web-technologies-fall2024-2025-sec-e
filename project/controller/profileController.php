<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.html');
    exit;
}

include '../model/userModel.php';

$user_id = $_SESSION['user_id'];
$user = getUser($user_id);

include '../view/view_profile.php';
?>
