<!DOCTYPE html>
<html lang="en">
<head>
    <title>All Donations</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>All Donations</h1>
        <div class="dashboard">
            <table class="donations-table">
                <thead>
                    <tr>
                        <th>Campaign</th>
                        <th>Backer</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_donations as $donation): ?>
                    <tr>
                        <td><?= htmlspecialchars($donation['campaign_title']) ?></td>
                        <td><?= htmlspecialchars($donation['backer_name']) ?></td>
                        <td>$<?= number_format($donation['amount'], 2) ?></td>
                        <td><?= htmlspecialchars($donation['created_at']) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <br>
        <div class="profile-actions">
            <a href="../view/home.php" class="button">Home</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>