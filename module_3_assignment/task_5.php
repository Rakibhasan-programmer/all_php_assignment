<?php

function generatePassword($length){
    $str = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()_+ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    return substr(str_shuffle($str), 0, $length);
}
printf(generatePassword(12));