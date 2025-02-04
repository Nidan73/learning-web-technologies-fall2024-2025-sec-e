<!DOCTYPE html>
<html>
<head>
    <title>All Donations</title>
</head>
<body>
    <h1>All Donations</h1>
    <table border="1">
        <tr>
            <th>Donation ID</th>
            <th>Campaign Title</th>
            <th>Backer Name</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        <?php if (!empty($all_donations)) { ?>
            <?php foreach ($all_donations as $donation) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($donation['donation_id']); ?></td>
                    <td><?php echo htmlspecialchars($donation['campaign_title']); ?></td>
                    <td><?php echo htmlspecialchars($donation['backer_name']); ?></td>
                    <td>$<?php echo number_format($donation['amount'], 2); ?></td>
                    <td><?php echo htmlspecialchars($donation['donation_date']); ?></td>
                </tr>
            <?php } ?>
        <?php } else { ?>
            <tr>
                <td colspan="5">No donations found.</td>
            </tr>
        <?php } ?>
    </table>
    <form action="controller.php?creator_action=download_reports" method="post">
        <button type="submit">Download Donation Report</button>
    </form>
</body>
</html>
