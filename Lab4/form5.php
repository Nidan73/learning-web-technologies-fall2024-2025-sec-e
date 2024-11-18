<?php
if (!empty($_POST)) {
    if (isset($_POST["Degree"]) && count($_POST["Degree"]) >= 2) {
        $degrees = $_POST["Degree"];
        $output = "";
        foreach ($degrees as $degree) {
            $output .= $degree . ', ';
        }
        $output = rtrim($output, ', ');
        echo "Degrees selected: " . $output;
    } else {
        echo "Please select at least two degrees.";
    }
} else {
    echo "Form not submitted.";
}
?>
