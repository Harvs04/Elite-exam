<?php
    function word_search(string $target, array $words)
    {   
        $indeces = [];

        for($i = 0; $i < sizeof($words); $i++) {
            if (strcmp($words[$i], $target) == 0) {
                $indeces[] = $i;
            }
        }
        return $indeces;
    }

    $ret = word_search("TWO", ["I", "TWO", "FORTY", "THREE", "JEN", "TWO", "tWo", "Two"]);
    foreach($ret as $index) {
        echo $index . " ";
    }
?>