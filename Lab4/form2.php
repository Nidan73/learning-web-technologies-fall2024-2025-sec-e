<?php
$email = "";


if (isset($_POST["username"])) {
    $email = $_POST["username"];

    
    function isValidEmail($email) {
     
        if (empty($email)) {
            return false;
        }
        $atPosition = strpos($email, '@');
        $dotPosition = strrpos($email, '.');
        if ($atPosition === false || $dotPosition === false) {
            return false;
        }
       
        if ($dotPosition <= $atPosition) {
            return false;
        }
       
        if ($dotPosition + 1 >= strlen($email)) {
            return false;
        }
        return true;
    }

    
    if (isValidEmail($email)) {
        echo "Valid email address.";
    } else {
        echo "Invalid email address.";
    }
} else {
    echo "Please submit an email address.";
}
?>
