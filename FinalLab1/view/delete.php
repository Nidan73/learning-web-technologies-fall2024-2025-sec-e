<?php
session_start();
if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit;
}

include '../model/userModel.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if(deleteUser($id)){
        header('Location: userlist.php');
    } else {
        echo "Error deleting record";
    }
} else {
    header('Location: userlist.php');
}
?>
