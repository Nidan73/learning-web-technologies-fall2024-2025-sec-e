<?php

function getConnection() {
    $con = mysqli_connect('127.0.0.1', 'root', '', 'project');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

function getAllCampaigns() {
    $con = getConnection();
    $sql = "SELECT campaign_id, title, description, goal_amount, current_amount FROM Campaigns WHERE status = 'Active'";
    $result = mysqli_query($con, $sql);
    $campaigns = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $campaigns[] = $row;
    }
    mysqli_close($con);
    return $campaigns;
}
function getPredefinedCategories() {
    $con = getConnection();
    $sql = "SELECT * FROM categories WHERE is_custom = 0 OR (is_custom = 1 AND approved_by IS NOT NULL)";
    $result = mysqli_query($con, $sql);

    $categories = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $categories[] = $row;
    }
    mysqli_close($con);
    return $categories;
}

function addCustomCategory($name, $description) {
    $con = getConnection();
    $sql = "INSERT INTO categories (name, description, is_custom, approved_by) VALUES ('$name', '$description', 1, NULL)";
    mysqli_query($con, $sql);
    mysqli_close($con);
}


function getCustomCategories() {
    $con = getConnection();
    $sql = "SELECT * FROM categories WHERE is_custom = 1";
    $result = mysqli_query($con, $sql);
    $categories = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
    } else {
        echo "Error in query execution: " . mysqli_error($con);
    }
    mysqli_close($con);
    return $categories;
}

function removeCategory($category_id) {
    $con = getConnection();
    $sql = "DELETE FROM categories WHERE category_id = $category_id";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function editCategory($category_id, $name, $description) {
    $con = getConnection();
    $sql = "UPDATE categories SET name = '$name', description = '$description' WHERE category_id = $category_id";
    mysqli_query($con, $sql);
    mysqli_close($con);
}

function getPendingCategories() {
    $con = getConnection();
    $sql = "SELECT * FROM categories WHERE is_custom = 1 AND approved_by IS NULL";
    $result = mysqli_query($con, $sql);

    $pending_categories = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $pending_categories[] = $row;
    }
    mysqli_close($con);
    return $pending_categories;
}

function approveCategory($category_id, $admin_id) {
    $con = getConnection();
    $sql = "UPDATE categories SET approved_by = $admin_id WHERE category_id = $category_id";
    return mysqli_query($con, $sql);
}

function rejectCategory($category_id) {
    $con = getConnection();
    $sql = "DELETE FROM categories WHERE category_id = $category_id";
    return mysqli_query($con, $sql);
}
function getCampaignsByCategories($categoryId) {
    $con = getConnection(); 


    $categoryIdString = join(',', $categoryId);  

   
    $sql = "SELECT * FROM campaigns WHERE category_id IN ($categoryIdString)";
    $result = mysqli_query($con, $sql);

    $campaigns = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $campaigns[] = $row;
        }
    } else {
        echo "Error retrieving campaigns: " . mysqli_error($con);
    }

    mysqli_close($con);
    return $campaigns;
}
?>
