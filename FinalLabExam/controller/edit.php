<?php
require_once '../model/userModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['id'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];

    if (!empty($name) && !empty($contact)) {
        updateUser($username, $name, $contact);
        header('Location: ../view/userlist.php');
    } else {
        echo "All fields are required!";
    }
}
?>
