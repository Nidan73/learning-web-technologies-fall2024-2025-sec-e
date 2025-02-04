<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donation Analytics</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>Donation Analytics</h1>
        <table class="analytics-table">
            <thead>
                <tr>
                    <th>Campaign</th>
                    <th>Total Funds Raised</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($analytics as $data): ?>
                <tr>
                    <td><?= htmlspecialchars($data['campaign_title']) ?></td>
                    <td>$<?= number_format($data['total_raised'], 2) ?></td>
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