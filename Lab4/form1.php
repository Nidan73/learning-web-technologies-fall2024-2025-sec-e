<?php
$username = $_POST["username"];


function checkNumber($username) {
    $isNumber = "1234567890";
    $firstChar = $username[0];
    if (strpos($isNumber, $firstChar) !== false) {
        return false;
    }
    return true; 
}


function checkUsername($username) {
    $validChars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789.-_';

    for ($i = 0; $i < strlen($username); $i++) {
        if (strpos($validChars, $username[$i]) === false) {
            return false;
        }
    }

    return true;
}
if (strlen($username) < 2 || !checkUsername($username) || !checknumber($username) ) {
    echo "Invalid username. .";
    
}

else {
    echo "valid username";
    
}

?>