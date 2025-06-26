<?php
    function count_islands(array $input)
    {
        $rows = sizeof($input);
        $cols = sizeof($input[0]);
        $visited = array_fill(0, $rows, array_fill(0, $cols, false));
        $island_count = 0;
        
        for ($i = 0; $i < $rows; $i++) {
            echo str_replace(["0", "1"], ["~", "X"], implode("", $input[$i]) . "\n");
        }
        echo "\n";
        
        for ($i = 0; $i < sizeof($input); $i++) {
            for ($j = 0; $j < sizeof($input[0]); $j++) {
                if ($input[$i][$j] == 1 && !$visited[$i][$j]) {
                    dfs($input, $visited, $i, $j, $rows, $cols);
                    $island_count++;
                }
            }
        }
        
        echo "Number of islands: " . $island_count . "\n";
        return $island_count;
    }
    
    function dfs($input, &$visited, $row, $col, $rows, $cols)
    {
        if ($row < 0 || $row >= $rows || $col < 0 || $col >= $cols || 
            $visited[$row][$col] || $input[$row][$col] == 0) {
            return;
        }
        
        $visited[$row][$col] = true;
        
        dfs($input, $visited, $row - 1, $col, $rows, $cols); 
        dfs($input, $visited, $row + 1, $col, $rows, $cols); 
        dfs($input, $visited, $row, $col - 1, $rows, $cols); 
        dfs($input, $visited, $row, $col + 1, $rows, $cols);
    }

    $input = [
        [1,1,1,1], 
        [0,1,1,0],
        [0,1,0,1],
        [1,1,0,0]
    ];

    count_islands($input);
?>