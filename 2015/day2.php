<?php

$fileLines = file("day2.txt");

$totalArea = 0;
$totalRibbon = 0;
foreach ($fileLines as $fileLine) {
    $dimensions = explode("x", $fileLine);
    $l = $dimensions[0];
    $w = $dimensions[1];
    $h = $dimensions[2];
    
    asort($dimensions);

    $squarefeets = [$l * $w, $w * $h, $h * $l];
    asort($squarefeets);
    $slack = $squarefeets[array_key_first($squarefeets)];
    $area = (2 * $l * $w) + (2 * $w * $h) + (2 * $h * $l) + $slack;
    $totalArea += $area;

    $ribbon1 = current($dimensions);
    next($dimensions);
    $ribbon2 = current($dimensions);
    next($dimensions);
    $ribbon3 = current($dimensions);

    $ribbonWrap = $ribbon1 + $ribbon1 + $ribbon2 + $ribbon2;
    $ribbonBow = $ribbon1 * $ribbon2 * $ribbon3;

    $totalRibbon += $ribbonWrap + $ribbonBow;
}

echo "Total Area of wrap: " . $totalArea . ' 🟥🦶<br>';
echo "Total Length of Ribbon: " . $totalRibbon . ' 🦶';