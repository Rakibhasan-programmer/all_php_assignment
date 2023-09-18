<?php

// First 10 fibonacchi numbers and breaks if number is greater than 100.

$num = 0;
$n1 = 0;
$n2 = 1;

printf("Fibonacci series for first 10 numbers: \n");
printf("{$n1} {$n2} ");
while ($num < 8) {
    $n3 = $n2 + $n1;
    // checking if number is greater than 100 or not
    if($n3 > 100){
        break;
    }
    printf("{$n3} ");
    $n1 = $n2;
    $n2 = $n3;
    $num++;
}