<?php


$day = $month = $year = "";


if (isset($_POST["day"], $_POST["month"], $_POST["year"])) {
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];

   
    function isValidDateOfBirth($day, $month, $year) {
       
        if (empty($day) || empty($month) || empty($year)) {
            return false;
        }

       
        if (!is_numeric($day) || (int)$day < 1 || (int)$day > 31) {
            return false;
        }
        if (!is_numeric($month) || (int)$month < 1 || (int)$month > 12) {
            return false;
        }
        if (!is_numeric($year) || (int)$year < 1953 || (int)$year > 1998) {
            return false;
        }

        return true;
    }

   
    if (isValidDateOfBirth($day, $month, $year)) {
        echo "Valid date of birth.";
    } else {
        echo "Invalid date of birth";
    }
} else {
    echo "Please submit all date of birth fields.";
}
?>
