<?php
session_start();
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recurring Payment Options</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>Recurring Payment Options</h1>
        <ul class="options-list">
            <li><a href="../controller/recurring_user_controller.php?action=enable_recurring_form" class="button">Enable Recurring Payment</a></li>
            <li><a href="../controller/recurring_user_controller.php?action=view_status&user_id=<?= $user_id ?>" class="button">View Recurring Payment Status</a></li>
            <li><a href="../view/recurring_payment_edit.php?action=view_status&user_id=<?= $user_id ?>" class="button">Edit Recurring Payment Status</a></li>
        </ul>
        <div class="profile-actions">
            <a href="../view/home.php" class="button">Home</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>