<?php
$ammount = 3000;

echo "The Ammount is : ".$ammount ."<br>";
echo "The ammount including vat is  : " . $ammount + ((15/100) * $ammount )." <br> ";
?>