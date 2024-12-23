<?php
    session_start();
    if (!isset($_COOKIE['status'])) {
        header('location: login.html');
        exit; 
    }

    include '../model/userModel.php';
    $users = getAllUser(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List</title>
</head>
<body>
    <h2>User List</h2>
    <a href="home.php">Back</a> 
    <a href="../controller/logout.php">Logout</a>

    <br>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php if ($users): foreach ($users as $user): ?>
        <tr>
            <td><?= ($user['id']) ?></td>
            <td><?= ($user['username']) ?></td>
            <td><?= ($user['email']) ?></td>
            <td>
                <a href="edit.php?id=<?= ($user['id']) ?>">EDIT</a> |
                <a href="delete.php?id=<?= ($user['id']) ?>">DELETE</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr>
            <td colspan="4">No users found</td>
        </tr>
        <?php endif; ?>
    </table>
</body>
</html>
