<?php

$fileLines = file("day8.txt", FILE_IGNORE_NEW_LINES);

$countString = 0;
$countMemory = 0;
$countNewEncoded = 0;

foreach ($fileLines as $fileLine) {
  eval('$str = ' . $fileLine . ';');
  $countString += strlen($fileLine);
  $countMemory += strlen((string) $str);
  $countNewEncoded += strlen(addslashes($fileLine)) + 2;
}


echo "countString: " . $countString . "<br>";
echo "countMemory: " . $countMemory . "<br>";
echo "countNewEncoded: " . $countNewEncoded . "<br>";
echo "<br>";
echo "Answer Part 1: " . $countString - $countMemory . "<br>";
echo "Answer Part 2: " . $countNewEncoded - $countString . "<br>";
