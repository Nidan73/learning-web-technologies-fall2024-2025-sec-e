<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../view/login.html');
    exit;
}

include '../model/userModel.php';

$user_id = $_SESSION['user_id'];
$user = getUser($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../asset/style.css">
    <script src="../asset/editProfileValidation.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Edit Profile</h1>
        <form id="editProfileForm">
            <fieldset>
                <legend>Profile Information</legend>
                <input type="hidden" id="user_id" name="user_id" value="<?= $user['user_id'] ?>">
                
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?= $user['username'] ?>" required>
                <div id="usernameError" class="text-center" style="color: red; font-size: 0.9em;"></div>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= $user['email'] ?>" required>
                <div id="emailError" class="text-center" style="color: red; font-size: 0.9em;"></div>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <div id="passwordError" class="text-center" style="color: red; font-size: 0.9em;"></div>

                <input type="submit" value="Update Profile">
            </fieldset>
        </form>
    </div>
</body>
</html>
