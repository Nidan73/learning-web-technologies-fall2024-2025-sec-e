<?php
require_once '../model/userModel.php';

if (isset($_GET['id'])) {
    deleteUser($_GET['id']);
    header('Location: ../view/userlist.php');
}
?>
