<?php

function removeEvenNumbers($numbers){
    $newArray = array_filter($numbers, function ($value) {
        return $value % 2 != 0;
    });
    return $newArray;
}

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
print_r(removeEvenNumbers($numbers));