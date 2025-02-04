<?php
function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'project');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function getUserDonations($user_id) {
    $con = getConnection();
    $sql = "SELECT d.donation_id, d.amount, d.created_at AS donation_date, c.title AS campaign_title
            FROM donations d
            JOIN campaigns c ON d.campaign_id = c.campaign_id
            WHERE d.backer_id = '$user_id'";
    $result = mysqli_query($con, $sql);

    $donations = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $donations[] = $row;
    }
    mysqli_close($con);
    return $donations;
}

function getDonationSummary($user_id) {
    $con = getConnection();
    $sql = "SELECT COUNT(*) AS total_donations, SUM(amount) AS total_amount
            FROM donations
            WHERE backer_id = '$user_id'";
    $result = mysqli_query($con, $sql);
    $summary = mysqli_fetch_assoc($result);
    mysqli_close($con);
    return $summary;
}

function getDonationSummar() {
    $con = getConnection();
    $sql = "SELECT COUNT(*) AS total_donations, SUM(amount) AS total_amount
            FROM donations";
    $result = mysqli_query($con, $sql);
    $summar = mysqli_fetch_assoc($result);
    mysqli_close($con);
    return $summar;
}
function getAllDonations() {
    $con = getConnection();
    $sql = "SELECT d.donation_id, d.amount, d.created_at, c.title AS campaign_title, u.username AS backer_name
            FROM donations d
            JOIN campaigns c ON d.campaign_id = c.campaign_id
            JOIN users u ON d.backer_id = u.user_id
            ORDER BY d.created_at DESC";
    $result = mysqli_query($con, $sql);

    $donations = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $donations[] = $row;
    }
    mysqli_close($con);
    return $donations;
}

function generateDonationReport() {
    $con = getConnection();
    $sql = "SELECT d.amount, c.title AS campaign_title, u.username AS backer_name, d.created_at
            FROM donations d
            JOIN campaigns c ON d.campaign_id = c.campaign_id
            JOIN users u ON d.backer_id = u.user_id";
    $result = mysqli_query($con, $sql);

    $donations = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $donations[] = $row;
    }
    mysqli_close($con);
    return $donations;
}

function getDonationAnalytics() {
    $con = getConnection();
    $sql = "SELECT c.title AS campaign_title, SUM(d.amount) AS total_raised
            FROM donations d
            JOIN campaigns c ON d.campaign_id = c.campaign_id
            GROUP BY c.campaign_id";
    $result = mysqli_query($con, $sql);

    $analytics = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $analytics[] = $row;
    }
    mysqli_close($con);
    return $analytics;
}
function getDonationsByCampaign($campaignId) {
    global $conn;
    $query = "SELECT donor_name, amount, donation_date FROM donations WHERE campaign_id = $campaignId";
    $result = mysqli_query($conn, $query);
    $donations = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $donations[] = $row;
        }
    }
    return $donations;
}


?>