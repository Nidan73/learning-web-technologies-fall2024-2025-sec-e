<?php
session_start();

if (!isset($_SESSION['logged_in_user'])) {
    header("Location: login.html");
    exit;
}


$username = $_SESSION['logged_in_user'];
$users = $_SESSION['users'] ?? [];


$user = array_filter($users, function ($user) use ($username) {
    return $user['name'] === $username;
});


$user = reset($user);

if (!$user) {
    
    echo "User details not found.";
    exit;
}
?>
<html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Welcome, <?php echo ($user['name']); ?></h1>
    <table>
        <tr><td>Name:</td><td><?php echo ($user['name']); ?></td></tr>
        <tr><td>Email:</td><td><?php echo ($user['email']); ?></td></tr>
        <tr><td>Gender:</td><td><?php echo ($user['gender']); ?></td></tr>
        <tr><td>DOB:</td><td><?php echo ($user['dob']); ?></td></tr>
        <tr><td>Degree:</td><td><?php echo ($user['degree']); ?></td></tr>
        <tr><td>Blood Group:</td><td><?php echo($user['bloodgroup']); ?></td></tr>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>
