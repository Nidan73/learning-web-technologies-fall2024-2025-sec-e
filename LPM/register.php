<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $data = [
        "name" => $_POST['name'] ?? null,
        "email" => $_POST['email'] ?? null,
        "password" => $_POST['password'] ?? null,
        "gender" => $_POST['gender'] ?? null,
        "dob" => $_POST['dob'] ?? null,
        "degree" => $_POST['degree'] ?? null,
        "bloodgroup" => $_POST['bloodgroup'] ?? null,
    ];

   
    foreach ($data as $key => $value) {
        if (empty($value)) {
            die("Error: All fields are required.");
        }
    }

    
    $_SESSION['users'][] = $data;

    
    header("Location: home.php");
    exit();
}
?>
