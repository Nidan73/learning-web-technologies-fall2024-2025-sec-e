<?php
include_once '../model/category_model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['add'])) {
        addCustomCategory($input['name'], $input['description']);
        echo json_encode(['success' => true, 'message' => 'Category added successfully.']);
    } elseif (isset($input['edit'])) {
        editCategory($input['category_id'], $input['name'], $input['description']);
        echo json_encode(['success' => true, 'message' => 'Category updated successfully.']);
    } elseif (isset($input['remove'])) {
        removeCategory($input['category_id']);
        echo json_encode(['success' => true, 'message' => 'Category removed successfully.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>