<?php
require_once '../model/payment_model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = [];
    $campaign_id = $_POST['campaign_id'];
    $backer_id = 2;
    $amount = $_POST['amount'];
    $currency = 'USD'; 
    $payment_method = $_POST['payment_method'];

  
    $transaction_id = addDonation($campaign_id, $backer_id, $amount, $currency, $payment_method);

    if ($transaction_id) {
        $response = [
            'success' => true,
            'message' => "Thank you for your donation!",
            'transaction_id' => $transaction_id
        ];
    } else {
        $response = [
            'success' => false,
            'message' => "There was an error processing your donation."
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
