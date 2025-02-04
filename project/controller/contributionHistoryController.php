<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.html');
    exit;
}

include '../model/donation_model.php';

$user_id = $_SESSION['user_id'];
$donations = getUserDonations($user_id);

include '../view/contribution_history.php';
?>
