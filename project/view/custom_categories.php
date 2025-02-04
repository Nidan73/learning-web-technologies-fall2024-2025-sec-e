<?php
include_once '../model/category_model.php';
$categories = getCustomCategories();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Custom Categories</title>
    <link rel="stylesheet" href="../asset/style.css">
    <script src="../asset/customCategory.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Custom Categories</h1>

        <fieldset>
            <legend>Add New Category</legend>
            <form id="addCategoryForm">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required><br><br>
                <label for="description">Description:</label>
                <textarea name="description" id="description" required></textarea><br><br>
                <button type="submit" class="button">Add</button>
            </form>
        </fieldset>

        <fieldset>
            <legend>Manage Existing Categories</legend>
            <div id="categoryList">
                <?php foreach ($categories as $category): ?>
                    <div class="category-item" data-id="<?= $category['category_id']; ?>">
                        <label for="name<?= $category['category_id']; ?>">Name:</label>
                        <input type="text" id="name<?= $category['category_id']; ?>" name="name" value="<?= ($category['name']); ?>" required>
                        
                        <label for="description<?= $category['category_id']; ?>">Description:</label>
                        <textarea id="description<?= $category['category_id']; ?>" name="description" required><?= ($category['description']); ?></textarea>
                        
                        <button class="edit-button" data-id="<?= $category['category_id']; ?>">Edit</button>
                        <button class="remove-button" data-id="<?= $category['category_id']; ?>">Remove</button>
                    </div>
                    <hr>
                <?php endforeach; ?>
            </div>
        </fieldset>

        <div class="profile-actions">
            <a href="../view/home.php" class="button">Home</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>