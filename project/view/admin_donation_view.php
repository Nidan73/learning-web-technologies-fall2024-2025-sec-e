<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Donation Overview</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>Admin Donation Overview</h1>
        <div class="dashboard-links">
            <a href="../controller/donations_controller.php?admin_action=view_all_donations" class="button">View All Donations</a><br><br>
            <a href="../controller/donations_controller.php?admin_action=download_reports" class="button">Download Donation Reports</a><br><br>
            <a href="../controller/donations_controller.php?admin_action=donation_analytics" class="button">Donation Analytics</a>
        </div>
        <div class="profile-actions">
            <a href="../view/home.php" class="button">Home</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>