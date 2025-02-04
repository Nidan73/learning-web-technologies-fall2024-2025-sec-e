<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donation Summary</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>Donation Summary</h1>
        <p><strong>Total Donations:</strong> <?= $summary['total_donations'] ?></p>
        <p><strong>Total Amount Donated:</strong> $<?= number_format($summary['total_amount'], 2) ?></p>
        
        <div class="profile-actions">
            <a href="../controller/donations_controller.php?action=view_my_donations" class="button">Back to Donation History</a>
            <br><br>
            <a href="../view/home.php" class="button">Home</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>