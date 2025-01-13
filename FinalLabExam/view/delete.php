<?php
require_once '../model/userModel.php';
if (isset($_GET['id'])) {
    deleteAuthor($_GET['id']);
    header('Location: ../view/userlist.php');
}
?>
