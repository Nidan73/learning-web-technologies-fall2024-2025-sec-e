<?php
include '../model/category_model.php';
$pendingCategories = getPendingCategories(); // Fetch pending categories from the database
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Approve Categories</title>
    <link rel="stylesheet" href="../asset/style.css">
    <script src="../asset/approveCategories.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Approve Categories</h1>
        <table class="category-table">
            <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="categoryTableBody">
                <?php foreach ($pendingCategories as $category): ?>
                <tr id="row-<?= $category['category_id'] ?>">
                    <td><?= $category['category_id'] ?></td>
                    <td><?= htmlspecialchars($category['name']) ?></td>
                    <td><?= htmlspecialchars($category['description']) ?></td>
                    <td>
                        <button class="approve-button" data-id="<?= $category['category_id']; ?>">Approve</button>
                        <button class="reject-button" data-id="<?= $category['category_id']; ?>">Reject</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="profile-actions">
            <a href="../view/home.php" class="button">Home</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>
