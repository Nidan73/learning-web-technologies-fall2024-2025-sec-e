<?php
$number1 = 50;
$number2 = 100;
$number3 = 150;

echo "The number1 is " . $number1 . "<br>";
echo "The number2 is " . $number2 . "<br>";
echo "The number3 is " . $number3 . "<br> <br>";

if ($number1 > $number2 && $number1 > $number3) {
    echo "The largest number is: " . $number1;
} 
elseif ($number2 > $number1 && $number2 > $number3) {
    echo "The largest number is: " . $number2;
} 

else {
    echo "The largest number is: " . $number3;
}
?>
