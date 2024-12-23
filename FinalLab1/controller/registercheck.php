<?php
    session_start();
    include '../model/userModel.php';

    if (isset($_POST['register'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        if ($username == null || $password == null || $email == null) {
            echo "All fields are required!";
        } else {
            $status = addUser($username, $password, $email);
            if ($status) {
                echo "Registration successful!";
                header('Refresh: 3; URL=../view/login.html'); 
            } else {
                echo "Registration failed!";
            }
        }
    } else {
        header('location: register.html'); 
    }
?>
