<?php
    function count_islands(array $input)
    {
        for ($i = 0; $i < sizeof($input); $i++) {
            echo str_replace(["0", "1"], ["~", "X"], implode("", $input[$i]) . "\n");
        }
    }

    $input = [
        [1,1,1,1], 
        [0,1,1,0],
        [0,1,0,1],
        [1,1,0,0]
    ];

    count_islands($input);
?>