<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contribution History</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>Contribution History</h1>
        <table class="contribution-table">
            <thead>
                <tr>
                    <th>Donation ID</th>
                    <th>Campaign</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donations as $donation): ?>
                <tr>
                    <td><?= $donation['donation_id'] ?></td>
                    <td><?= $donation['campaign_title']?></td>
                    <td><?= $donation['amount'] ?></td>
                    <td><?= $donation['donation_date'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <br>
    <div class="profile-actions">
        <a href="../view/home.php" class="button">Home</a>
        <a href="../controller/profileController.php" class="button">Back to Profile Options</a>
    </div>
</body>
</html>