<?php

if (!empty($_POST)) {
    if (isset($_POST["gender"]) && !empty($_POST["gender"])) {
        $gender = $_POST["gender"];
        echo "Gender selected: " . $gender;
    } else {
        echo "Please select a gender.";
    }

}
else if(empty($_POST)){
    echo "select an option";
}
else {
    echo "Form not submitted.";
}
?>
