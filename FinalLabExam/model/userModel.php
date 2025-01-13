<?php

function connect(){
    $con = mysqli_connect('127.0.0.1', 'root', '', 'blog');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}
function registerUser($username, $name, $password, $contact, $type = 'author') {
    $conn = connect();
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO authors (username, name, password, contact, type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $username, $name, $password, $contact, $type);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function getAllAuthors() {
    $conn = connect();
    $sql = "SELECT * FROM authors";
    $result = $conn->query($sql);
    $authors = [];
    while ($row = $result->fetch_assoc()) {
        $authors[] = $row;
    }
    $conn->close();
    return $authors;
}

function searchAuthors($query) {
    $conn = connect();
    $sql = "SELECT * FROM authors WHERE name LIKE ? OR username LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeQuery = '%' . $query . '%';
    $stmt->bind_param('ss', $likeQuery, $likeQuery);
    $stmt->execute();
    $result = $stmt->get_result();
    $authors = [];
    while ($row = $result->fetch_assoc()) {
        $authors[] = $row;
    }
    $stmt->close();
    $conn->close();
    return $authors;
}

function updateUser($username, $name, $contact) {
    $conn = connect();
    $sql = "UPDATE authors SET name = ?, contact = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sss', $name, $contact, $username);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function deleteUser($username) {
    $conn = connect();
    $sql = "DELETE FROM authors WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

function validateLogin($username, $password) {
    $conn = connect();
    $sql = "SELECT password FROM authors WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();
    $stmt->close();
    $conn->close();
    return password_verify($password, $hashedPassword);
}


?>
