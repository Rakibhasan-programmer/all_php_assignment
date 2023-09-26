<?php

function lowerString($text){
    $lowerStr = strtolower($text);
    $newString = str_replace("brown", "red", $lowerStr);

    return $newString;
}

$text = "The quick brown fox jumps over the lazy dog.";
printf(lowerString($text));
