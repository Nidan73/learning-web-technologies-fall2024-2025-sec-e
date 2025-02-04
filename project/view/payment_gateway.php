<!DOCTYPE html>
<html lang="en">
<head>
    <title>Make a Donation</title>
    <link rel="stylesheet" href="../asset/style.css">
    <script src="../asset/donation.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Make a Donation</h1>
        <?php
        include_once '../model/category_model.php';

        $campaigns = getAllCampaigns();
        ?>
        <form id="donation-form">
            <label for="campaign">Choose a campaign:</label>
            <select name="campaign_id" id="campaign" required>
                <?php foreach ($campaigns as $campaign): ?>
                    <option value="<?php echo $campaign['campaign_id']; ?>" data-raised-amount="<?php echo $campaign['current_amount']; ?>">
                      <?php echo $campaign['title']; ?>
                      (Goal: <?php echo $campaign['goal_amount']; ?>, Raised: <span id="campaign-raised-amount-<?php echo $campaign['campaign_id']; ?>"><?php echo $campaign['current_amount']; ?></span>)
                      </option>
                <?php endforeach; ?>
            </select><br><br>

            <label for="amount">Enter donation amount (USD):</label>
            <input type="number" id="amount" name="amount" min="1" required><br><br>

            <div class="payment-methods">
                <button type="button" data-method="bKash" class="payment-button">Donate via bKash</button>
                <button type="button" data-method="Nagad" class="payment-button">Donate via Nagad</button>
                <button type="button" data-method="Rocket" class="payment-button">Donate via Rocket</button>
                <button type="button" data-method="Card Payment" class="payment-button">Donate via Card Payment</button>
            </div>
        </form>

        <div id="donation-response" style="margin-top: 20px;">
        </div>

        <div class="profile-actions">
            <a href="../view/home.php" class="button">Home</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>
