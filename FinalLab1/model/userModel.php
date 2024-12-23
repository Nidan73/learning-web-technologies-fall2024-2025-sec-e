<?php

function getConnection(){
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}
function login($username, $password){
    $con = getConnection();
    $sql = "select * from users where username='{$username}' and password='{$password}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count ==1){
        return true;
    }else{
        return false;
    }
}
function getAllUser(){
    $con = getConnection();
    $sql = "SELECT id, username, email FROM users";
    $result = mysqli_query($con, $sql);
    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    return $users;
}

function getUser($id){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE id={$id}";
    $result = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($result);
}

function addUser($username, $password, $email){
    $con = getConnection();
    $sql = "INSERT INTO users(username, password, email) VALUES('{$username}', '{$password}', '{$email}')";
    if(mysqli_query($con, $sql)){
        return true;
    } else {
        return false;
    }
}



function updateUser($id, $username, $password, $email){
    $con = getConnection();
    $sql = "UPDATE users SET username='{$username}', password='{$password}', email='{$email}' WHERE id={$id}";
    return mysqli_query($con, $sql);
}

function deleteUser($id){
    $con = getConnection();
    $sql = "DELETE FROM users WHERE id={$id}";
    return mysqli_query($con, $sql);
}


?>
