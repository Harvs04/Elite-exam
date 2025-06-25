<?php
    function shortest_word(string $str) 
    {
        $words = explode(" ", $str);
        $shortest = strlen($words[0]);

        for ($i = 1; $i < sizeof($words); $i++) {
            if ($shortest > strlen($words[$i])) 
                $shortest = strlen($words[$i]);
        }
        return $shortest;
    }
    
    echo shortest_word("TRUE FRIENDS ARE ME AND YOU") . "\n";
    echo shortest_word("I AM THE LEGENDARY VILLAIN") . "\n";
?>