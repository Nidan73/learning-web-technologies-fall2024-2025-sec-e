<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enable Recurring Payment</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>Enable Recurring Payment</h1>
        <form action="../controller/recurring_user_controller.php" method="post">
            <input type="hidden" name="action" value="enable_recurring_form">
            <input type="hidden" name="user_id" value="<?= isset($user_id) ? $user_id : '' ?>">
            
            <label for="campaign_id">Campaign:</label>
            <select name="campaign_id" id="campaign_id" required>
                <?php if (!empty($campaigns)) { ?>
                    <?php foreach ($campaigns as $campaign) { ?>
                        <option value="<?= $campaign['campaign_id'] ?>"><?= $campaign['title'] ?></option>
                    <?php } ?>
                <?php } else { ?>
                    <option value="">No active campaigns available</option>
                <?php } ?>
            </select><br><br>

            <label for="amount">Amount:</label>
            <input type="number" step="10" name="amount" id="amount" required><br><br>

            <label for="currency">Currency:</label>
            <input type="text" name="currency" id="currency" value="USD" readonly><br><br>

            <label for="next_payment_date">Next Payment Date:</label>
            <input type="date" name="next_payment_date" id="next_payment_date" required><br><br>

            <button type="submit" class="button">Enable Recurring Payment</button>
        </form>
        <div class="profile-actions">
            <a href="../view/home.php" class="button">Home</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>