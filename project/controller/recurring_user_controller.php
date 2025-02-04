<?php
include '../model/recurring_model.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'enable_recurring_form') {
        $campaigns = getAvailableCampaigns();
        include '../view/recurring_payment_form.php'; 
        exit;
    } 
    
    elseif ($_GET['action'] == 'view_status') {
        include '../view/recurring_payment_status.php';
        exit;
    }
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'enable_recurring_form') {
        if (!isset($_POST['campaign_id'], $_POST['user_id'], $_POST['amount'], $_POST['currency'], $_POST['next_payment_date'])) {
            die("Error: Missing required fields.");
        }
        enableRecurringPayment($_POST['campaign_id'], $_POST['user_id'], $_POST['amount'], $_POST['currency'], $_POST['next_payment_date']);
       
        include '../view/recurring_payment_status.php';
        exit;
    } elseif ($_POST['action'] == 'edit_recurring') {
        if (!isset($_POST['payment_id'], $_POST['amount'], $_POST['currency'], $_POST['next_payment_date'])) {
            die("Error: Missing required fields.");
        }
        
        updateRecurringPayment($_POST['payment_id'], $_POST['amount'], $_POST['currency'], $_POST['next_payment_date']);
        header("Location: ../view/recurring_payment_status.php");
        exit;
    } elseif ($_POST['action'] == 'cancel_recurring') {
        if (!isset($_POST['payment_id'])) {
            die("Error: Missing payment ID.");
        }
        cancelRecurringPayment($_POST['payment_id']);
        header("Location: ../view/recurring_payment_status.php");
        exit;
    }
}
?>
