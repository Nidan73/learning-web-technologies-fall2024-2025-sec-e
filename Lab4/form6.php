<?php
$bloodGroup = $_POST["bloodGroup"];
if (!empty($_POST)) {
    if (isset($bloodGroup) && !empty($bloodGroup)) {
       
        echo "Blood Group selected: " .$bloodGroup;
    } else {
        echo "Please select a blood group.";
    }
} else {
    echo "Form not submitted.";
}
?>
