<?php

$array = array( 1,2,3,4,5,6,7,8,9,10);
$search = 5;
for ($i = 0; $i < count($array); $i++) {
    if ($array[$i] == $search) 
    {
        echo "The element is found <br> <br>" ;
        echo "The element is : " . $search ;
        break;
    }
    
}
?>