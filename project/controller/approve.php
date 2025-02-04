<?php
include '../model/category_model.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['action']) && isset($input['category_id'])) {
        $category_id = $input['category_id'];
        $action = $input['action'];
        $admin_id = isset($input['admin_id']) ? $input['admin_id'] : null;

        
        if ($action === 'approve' && $admin_id !== null) {
            $result = approveCategory($category_id, $admin_id);
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Category approved successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error processing the approval request.']);
            }
        }
        elseif ($action === 'reject') {
            $result = rejectCategory($category_id);
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Category rejected successfully.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error processing the rejection request.']);
            }
        }
        else {
            echo json_encode(['success' => false, 'message' => 'Invalid action provided.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing category ID or action.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
