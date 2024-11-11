<?php

echo "The odd numbers from 10 to 100 are : <br><br>" ;

for ($i = 10; $i <= 100; $i++) {
    
    if ($i % 2 != 0) 
    {
       
        echo $i . " , " ;
        
    }

}

