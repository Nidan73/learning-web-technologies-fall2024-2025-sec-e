<?php
function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'project');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}
function addDonation($campaign_id, $backer_id, $amount, $currency, $payment_method) {
    $con = getConnection();
    $transaction_id = uniqid('TX'); 
    $status = 'Completed';

    $sql = "INSERT INTO donations (campaign_id, backer_id, amount, currency, transaction_id, status, created_at)
            VALUES ('$campaign_id', '$backer_id', '$amount', '$currency', '$transaction_id', '$status', NOW())";
    
    if (mysqli_query($con, $sql)) {
        updateCampaignAmount($con, $campaign_id, $amount);
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_close($con);
    return $transaction_id;
}

function getCampaignDonors($campaign_id) {
    $con = getConnection();
    $sql = "SELECT d.donation_id, d.amount, d.created_at AS donation_date, u.name AS donor_name
            FROM donations d
            JOIN users u ON d.backer_id = u.user_id
            WHERE d.campaign_id = '$campaign_id'";
    $result = mysqli_query($con, $sql);

    $donors = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $donors[] = $row;
    }
    mysqli_close($con);
    return $donors;
}


function updateCampaignAmount($con, $campaign_id, $amount) {
    $sql = "UPDATE Campaigns SET current_amount = current_amount + $amount WHERE campaign_id = $campaign_id";
    mysqli_query($con, $sql);
}
?>
