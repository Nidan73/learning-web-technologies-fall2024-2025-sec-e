<?php
session_start();
if (!isset($_COOKIE['status'])) {
    header('location: login.html');
    exit;
}

include '../model/userModel.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('location: userlist.php');
    exit;
}

$user = getUser($id);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    
    if (updateUser($id, $username, $password, $email)) {
        header('location: userlist.php');
        exit;
    } else {
        echo "Error updating record";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="post">
        Username: <input type="text" name="username" value="<?= $user['username'] ?>"><br>
        Password: <input type="password" name="password" value="<?= $user['password'] ?>"><br>
        Email: <input type="email" name="email" value="<?= $user['email'] ?>"><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>
