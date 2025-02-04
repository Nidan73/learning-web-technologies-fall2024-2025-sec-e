<?php
include_once '../model/donation_model.php';

session_start();
$user_id = $_SESSION['user_id']; 

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'view_my_donations') {
        $donations = getUserDonations($user_id);
        include '../view/donation_history.php';
    } elseif ($_GET['action'] == 'donation_summary') {
        $summary = getDonationSummary($user_id);
        include '../view/donation_summary.php';
    }


}

if (isset($_GET['creator_action'])) {
    if ($_GET['creator_action'] == 'view_all_donations') {
        $all_donations = getAllDonations(); 
        include '../view/admin_all_donations.php';
    } elseif ($_GET['creator_action'] == 'download_reports') {
        $donation_report = generateDonationReport();
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="creator_donation_report.csv"');
        $output = fopen('php://output', 'w');
        fputcsv($output, ['Donation ID', 'Campaign', 'Backer', 'Amount', 'Date']);
        foreach ($donation_report as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
        exit;
    } elseif ($_GET['creator_action'] == 'creator_donation_summary') {
        $summar = getDonationSummar(); 
        include '../view/creator_donation_summary.php';
    }
}


if (isset($_GET['admin_action'])) {
    if ($_GET['admin_action'] == 'view_all_donations') {
        $all_donations = getAllDonations();
        include '../view/admin_all_donations.php';
    } elseif ($_GET['admin_action'] == 'download_reports') {
        $donation_report = generateDonationReport();
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="donation_report.csv"');
        $output = fopen('php://output', 'w');
        fputcsv($output, ['Campaign', 'Backer', 'Amount', 'Date']);
        foreach ($donation_report as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
        exit;
    } elseif ($_GET['admin_action'] == 'donation_analytics') {
        $analytics = getDonationAnalytics();
        include '../view/admin_donation_analytics.php';
    }
}

?>