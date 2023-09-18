<?php

// Task 4: Fibonacci Series printing using a Function.


function fibSeries($num)
{
    if ($num == 0) {
        return 0;
    } else if ($num == 1) {
        return 1;
    } else {
        return (fibSeries($num - 1) + fibSeries($num - 2));
    }
}


for ($i=0; $i<15; $i++) {
    printf("%d ", fibSeries($i));
}