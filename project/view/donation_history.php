<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Donations</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>My Donation History</h1>
        <table class="contribution-table">
            <thead>
                <tr>
                    <th>Campaign</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donations as $donation): ?>
                <tr>
                    <td><?= $donation['campaign_title'] ?></td>
                    <td><?= $donation['amount'] ?></td>
                    <td><?= $donation['donation_date'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="profile-actions">
            <a href="../controller/donations_controller.php?action=donation_summary" class="button">View Donation Summary</a>
            <br><br>
            <a href="../view/home.php" class="button">Home</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>