<?php
    $arr = [
        ['1', '2', '3', 'A'],
        ['1', '2', 'B', 'C'],
        ['1', 'D', 'E', 'F']
    ];

    echo "First Shape:<br>";
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr[$i]) - $i - 1; $j++) {
            echo $arr[$i][$j] . " ";
        }
        echo "<br>";
    }

    echo "<br>";

        echo "Second Shape:<br>";
        for ($i = 0; $i > count($arr); $i++) {
            for ($j = 3; $j > count($arr[$i]) - $i - 1; $j--) {
                echo $arr[$i][$j] . " ";
            }
            echo "<br>";
        }
?>
