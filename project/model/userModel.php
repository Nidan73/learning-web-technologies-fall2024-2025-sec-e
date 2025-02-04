<?php

function getConnection(){
    $con = mysqli_connect('127.0.0.1', 'root', '', 'project');
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
        return mysqli_fetch_assoc($result) ;
    }else{
        return false;
    }
}
function getAllUser(){
    $con = getConnection();
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);
    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    return $users;
}

function getUser($id) {
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE user_id={$id}";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return mysqli_fetch_assoc($result);
}
function updateUser($id, $username, $email, $password) {
    $con = getConnection();
    $sql = "UPDATE users SET username = '$username', email = '$email', password = '$password' WHERE user_id = $id";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}

?>
