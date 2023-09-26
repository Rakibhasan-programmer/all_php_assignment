<?php

function sortDescending(&$array) {
    rsort($array);
}

$grades = array(85, 92, 78, 88, 95);

sortDescending($grades);
print_r($grades);

