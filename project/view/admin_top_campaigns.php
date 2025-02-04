<!DOCTYPE html>
<html lang="en">
<head>
    <title>Top Recurring Campaigns</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>Top Recurring Campaigns</h1>
        <table class="campaigns-table">
            <thead>
                <tr>
                    <th>Campaign</th>
                    <th>Number of Contributors</th>
                    <th>Total Recurring Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($campaigns as $campaign): ?>
                <tr>
                    <td><?= $campaign['campaign_name'] ?></td>
                    <td><?= $campaign['contributors'] ?></td>
                    <td>$<?= number_format($campaign['total_amount'], 2) ?></td>
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