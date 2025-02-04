<?php
include_once '../model/category_model.php';

if (isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];
    $campaigns = getCampaignsByCategories([$categoryId]); 
} else {
    echo "No category selected.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Category Details</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <fieldset>
            <legend><h2>Category Campaigns</h2></legend>
            <?php if (count($campaigns) > 0): ?>
                <table class="campaign-table">
                    <thead>
                        <tr>
                            <th>Campaign Title</th>
                            <th>Description</th>
                            <th>Goal Amount</th>
                            <th>Current Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($campaigns as $campaign): ?>
                        <tr>
                            <td><?php echo $campaign['title']; ?></td>
                            <td><?php echo $campaign['description']; ?></td>
                            <td><?php echo $campaign['goal_amount']; ?></td>
                            <td><?php echo $campaign['current_amount']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No campaigns found for this category.</p>
            <?php endif; ?>
        </fieldset>
    </div>
    <br>
    <div class="profile-actions">
        <a href="../view/predefined_categories.php" class="button">Back to Categories</a>
    </div>
</body>
</html>