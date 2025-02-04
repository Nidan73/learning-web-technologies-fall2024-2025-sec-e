<?php
session_start();
if(!isset($_COOKIE['status'])){
    header('location: login.html');
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>

<body>
    <h1>Welcome Home! <?= ($_SESSION['username']) ?></h1>  
    <div class="dashboard">
        <?php 
        if ($_SESSION['user_type'] === 'Backer') { 
            echo '<h2>Backer Dashboard</h2>';
            echo '<a href="../view/profile.php">View Profile</a>';
            echo '<a href="../view/predefined_categories.php">View Predefined</a>';
            echo '<a href="../view/payment_gateway.php">Donation</a>';
            echo '<a href="../view/Donation_view.php">Donation View</a>';
            echo '<a href="../view/recurring_payment_option.php">Recurring Payment Option</a>';
            echo '<a href="../controller/logout.php">Logout</a>';
        } elseif ($_SESSION['user_type'] === 'Creator') {
            echo '<h2>Creator Dashboard</h2>';
            echo '<a href="../view/profile.php">View Profile</a>';
            echo '<a href="../view/predefined_categories.php">View Predefined</a>';
            echo '<a href="../view/custom_categories.php">Custom Categories</a>';
            echo '<a href="../view/payment_gateway.php">Donation</a>';
            echo '<a href="../view/creator_donation_overview.php">View Donations</a>';
            echo '<a href="../controller/logout.php">Logout</a>';
        } elseif ($_SESSION['user_type'] === 'Admin') {
            echo '<h2>Admin Dashboard</h2>';
            echo '<a href="../view/profile.php">View Profile</a>';
            echo '<a href="../view/predefined_categories.php">View Predefined</a>';
            echo '<a href="../view/approve_categories.php">Approval/ Pending Categories</a>';
            echo '<a href="../view/admin_donation_view.php">Donation Tracking</a>';
            echo '<a href="../view/admin_recurring_reports.php">Recurring Payment Reports</a>';
            echo '<a href="../controller/logout.php">Logout</a>';
        } else {
            echo '<p>Error: Unauthorized access.</p>';
            echo '<a href="../controller/logout.php">Logout</a>';
        }
        ?>
    </div>
</body>
</html>