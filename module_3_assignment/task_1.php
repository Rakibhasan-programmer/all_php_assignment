<?php

function lowerString($text){
    $lowerStr = strtolower($text);
    str_replace("brown", "red", $lowerStr);

    return $lowerStr;
}

$text = "The quick brown fox jumps over the lazy dog.";
echo lowerString($text);
