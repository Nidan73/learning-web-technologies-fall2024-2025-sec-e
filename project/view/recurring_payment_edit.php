<?php
include_once '../model/recurring_model.php';
session_start();
$user_id = $_SESSION['user_id'];
$payments = getUserRecurringPayments($user_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Recurring Payment Status</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Recurring Payment Status</h1>
        <table class="contribution-table">
            <thead>
                <tr>
                    <th>Campaign</th>
                    <th>Amount</th>
                    <th>Currency</th>
                    <th>Next Payment Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?= $payment['campaign_title'] ?></td>
                    <td><?= $payment['amount'] ?></td>
                    <td><?= $payment['currency'] ?></td>
                    <td><?= $payment['next_payment_date'] ?></td>
                    <td><?= $payment['status'] ?></td>
                    <td>
                        <form action="../controller/recurring_user_controller.php" method="post" style="display:inline;">
                            <input type="hidden" name="payment_id" value="<?= $payment['payment_id'] ?>">
                            <input type="hidden" name="action" value="edit_recurring">
                            
                            <input type="number" step="10.00" name="amount" value="<?= $payment['amount'] ?>" required>
                            <input type="text" name="currency" value="<?= $payment['currency'] ?>" readonly>
                            <input type="date" name="next_payment_date" value="<?= $payment['next_payment_date'] ?>" required>
                            <button type="submit" class="button">Update</button>
                        </form>
                        <form action="../controller/recurring_user_controller.php" method="post" style="display:inline;">
                            <input type="hidden" name="payment_id" value="<?= $payment['payment_id'] ?>">
                            <input type="hidden" name="action" value="cancel_recurring">
                            <button type="submit" class="button">Cancel</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="profile-actions">
            <a href="../view/home.php" class="button">Home</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>