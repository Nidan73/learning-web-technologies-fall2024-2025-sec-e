<!DOCTYPE html>
<html lang="en">
<head>
    <title>Top Recurring Contributors</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>Top Recurring Contributors</h1>
        <table class="contributors-table">
            <thead>
                <tr>
                    <th>Backer</th>
                    <th>Total Contributions</th>
                    <th>Total Payments</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($contributors as $contributor): ?>
                <tr>
                    <td><?= $contributor['backer_name'] ?></td>
                    <td>$<?= number_format($contributor['total_contributed'], 2) ?></td>
                    <td><?= $contributor['total_payments'] ?></td>
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