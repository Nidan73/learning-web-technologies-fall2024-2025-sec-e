<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Profile</title>
    <link rel="stylesheet" href="../asset/style.css">
</head>
<body>
    <div class="container">
        <h1>My Profile</h1>
        <div class="profile-info">
            <p><strong>Name:</strong> <?= $user['username']?></p>
            <p><strong>Email:</strong> <?= $user['email'] ?></p>
        </div>
        <div class="profile-actions">
            <a href="../view/profile.php" class ="button">Back to Profile Options</a>
            <a href="../view/edit_profile.php" class="button">Edit Profile</a>
            <a href="../controller/logout.php" class="button">Logout</a>
        </div>
    </div>
</body>
</html>