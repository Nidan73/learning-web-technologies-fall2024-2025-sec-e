<?php
include_once '../model/recurring_model.php';

if (isset($_GET['admin_action'])) {
    
    if ($_GET['admin_action'] == 'view_recurring_reports') {
        $payments = getRecurringPayments(); 
       $overview = getRecurringOverview(); 
      include '../view/admin_recurring_reports.php';

    } elseif ($_GET['admin_action'] == 'view_top_campaigns') {
        $campaigns = getTopRecurringCampaigns();
        include '../view/admin_top_campaigns.php';
    } elseif ($_GET['admin_action'] == 'view_top_contributors') {
        $contributors = getTopContributors();
        include '../view/admin_top_contributors.php';
    } elseif ($_GET['admin_action'] == 'recurring_overview') {
        $overview = getRecurringOverview();
        include '../view/admin_recurring_overview.php';
    }

}
?>
