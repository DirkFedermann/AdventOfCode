<?php

$input = "bgvyzdsv";

while (substr($hash, 0, 5) !== "00000") {
    ++$i;
    $hash = md5($input . $i);
}

echo "Lowest Number that produces 5 leading zeros in the hash: " . $i . '<br>';



while (substr($hash, 0, 6) !== "000000") {
    ++$j;
    $hash = md5($input . $j);
}

echo "Lowest Number that produces 6 leading zeros in the hash: " . $j;