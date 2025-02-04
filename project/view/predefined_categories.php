<?php
include_once '../model/category_model.php';

$predefinedCategories = getPredefinedCategories();
$selectedCategories = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['category'])) {
        $selectedCategories = array_filter($_POST['category'], function($value) {
            return is_numeric($value);
        });
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Predefined Categories</title>
    <link rel="stylesheet" href="../asset/style.css">
    <script src="../asset/categorySelection.js" defer></script>
</head>
<body>
    <div class="container">
        <fieldset>
            <legend><h2>View Predefined Categories</h2></legend>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <ul class="category-list">
                    <?php foreach ($predefinedCategories as $category): ?>
                        <li>
                            <input type="checkbox" name="category[]" value="<?php echo $category['category_id']; ?>"
                                   <?php echo in_array($category['category_id'], $selectedCategories) ? 'checked' : ''; ?>
                            > <?php echo $category['name']; ?>
                        </li>
                    <?php endforeach; ?>
                </form>
        </fieldset>

        <br>
        <fieldset>
            <legend><h2>Selected Categories</h2></legend>
            <ul id="selected-categories">
            </ul>
        </fieldset>

        <div class="profile-actions">
            <a href="../view/home.php" class="button">Home</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>

    <!-- Hidden data for JavaScript -->
    <input type="hidden" id="categories-data" value='<?php echo json_encode($predefinedCategories); ?>' />
</body>
</html>
