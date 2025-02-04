<?php

function getConnection(){
    $con = mysqli_connect('127.0.0.1', 'root', '', 'project');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}
function getRecurringPayments() {
    $con = getConnection();
    $sql = "SELECT rp.payment_id, rp.amount, rp.next_payment_date, c.title AS campaign_name, u.username AS backer_name
            FROM recurring_payments rp
            JOIN campaigns c ON rp.campaign_id = c.campaign_id
            JOIN users u ON rp.backer_id = u.user_id
            ORDER BY rp.next_payment_date ASC";
    $result = mysqli_query($con, $sql);

    $payments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $payments[] = $row;
    }
    mysqli_close($con);
    return $payments;
}

function getTopRecurringCampaigns() {
    $con = getConnection();
    $sql = "SELECT c.title AS campaign_name, COUNT(rp.payment_id) AS contributors, SUM(rp.amount) AS total_amount
            FROM recurring_payments rp
            JOIN campaigns c ON rp.campaign_id = c.campaign_id
            GROUP BY c.campaign_id
            ORDER BY total_amount DESC";
    $result = mysqli_query($con, $sql);

    $campaigns = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $campaigns[] = $row;
    }
    mysqli_close($con);
    return $campaigns;
}

function getTopContributors() {
    $con = getConnection();
    $sql = "SELECT u.username AS backer_name, SUM(rp.amount) AS total_contributed, COUNT(rp.payment_id) AS total_payments
            FROM recurring_payments rp 
            JOIN users u ON rp.backer_id = u.user_id
            GROUP BY rp.backer_id
            ORDER BY total_contributed DESC";
    $result = mysqli_query($con, $sql);

    $contributors = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $contributors[] = $row;
    }
    mysqli_close($con);
    return $contributors;
}

function getRecurringOverview() {
    $con = getConnection();
    $sql = "SELECT COUNT(*) AS total_active_payments, SUM(amount) AS total_monthly_amount
            FROM recurring_payments WHERE status = 'Active'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $overview = mysqli_fetch_assoc($result);
    } else {
        $overview = [
            'total_active_payments' => 0,
            'total_monthly_amount' => 0.00
        ];
    }

    mysqli_close($con);
    return $overview;
}

function getUserRecurringPayments($user_id) {
    $con = getConnection();
    $sql = "SELECT rp.payment_id, rp.amount, rp.currency, rp.next_payment_date, rp.status, c.title AS campaign_title
            FROM recurring_payments rp
            JOIN campaigns c ON rp.campaign_id = c.campaign_id
            WHERE rp.backer_id = '$user_id'";
    $result = mysqli_query($con, $sql);

    $payments = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $payments[] = $row;
    }
    mysqli_close($con);
    return $payments;
}

function enableRecurringPayment($campaign_id, $user_id, $amount, $currency, $next_payment_date) {
    $con = getConnection();
    $sql = "INSERT INTO recurring_payments (campaign_id, backer_id, amount, currency, next_payment_date, status)
            VALUES ('$campaign_id', '$user_id', '$amount', '$currency', '$next_payment_date', 'Active')";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function updateRecurringPayment($payment_id, $amount, $currency, $next_payment_date) {
    $con = getConnection();
    $sql = "UPDATE recurring_payments 
            SET amount = '$amount', currency = '$currency', next_payment_date = '$next_payment_date'
            WHERE payment_id = '$payment_id'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function cancelRecurringPayment($payment_id) {
    $con = getConnection();
    $sql = "UPDATE recurring_payments 
            SET status = 'Cancelled'
            WHERE payment_id = '$payment_id'";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function getAvailableCampaigns() {
    $con = getConnection();
    $sql = "SELECT * FROM campaigns WHERE status = 'Active'";
    $result = mysqli_query($con, $sql);

    $campaigns = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $campaigns[] = $row;
        }
    }

    mysqli_close($con);
    return $campaigns;
}


?>
