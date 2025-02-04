<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recurring Payment Reports</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>Recurring Payment Reports</h1>
        <ul class="report-links">
            <li><a href="../controller/recurring_controller.php?admin_action=view_recurring_reports" class="button">View Recurring Payment Reports</a></li>
            <li><a href="../controller/recurring_controller.php?admin_action=view_top_campaigns" class="button">View Top Recurring Campaigns</a></li>
            <li><a href="../controller/recurring_controller.php?admin_action=view_top_contributors" class="button">View Top Contributors</a></li>
        </ul>
        
        <h2>Recurring Payment Overview</h2>
        <p><strong>Total Active Recurring Payments:</strong> <?= isset($overview['total_active_payments']) ? $overview['total_active_payments'] : 0 ?></p>
        <p><strong>Total Monthly Recurring Amount:</strong> $<?= number_format(isset($overview['total_monthly_amount']) ? $overview['total_monthly_amount'] : 0.00, 2) ?></p>

        <div class="profile-actions">
            <a href="../view/home.php" class="button">Home</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>