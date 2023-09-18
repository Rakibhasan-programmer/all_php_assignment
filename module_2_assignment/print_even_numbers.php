<?php

// Task 1: Looping with Increment using a Function

function print_even_numbers($start, $end, $step){
    if($start%2 == 1)
        $start+=1;
    
    for($i=$start; $i<=$end; $i+=$step){
        if($i == $end)
            printf("%d. ", $i);
        else
            printf("%d, ", $i);
    }
}

print_even_numbers(1, 20, 2);