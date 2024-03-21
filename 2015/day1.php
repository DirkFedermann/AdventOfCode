<?php

$timeStart = microtime(true);

$file = file("day1.txt");
$timeReadFile = microtime(true);

$string = $file[0];
$timeToPutFileInString = microtime(true);

$floorNumber = 0;
$enteredBasement = false;
$timeToAssignVariables = microtime(true);
for ($i = 0; $i < strlen($string); ++$i) {
    if ($string[$i] === "(") {
        ++$floorNumber;
    }

    if ($string[$i] === ")") {
        --$floorNumber;
    }
    
    if ($floorNumber < 0 && !$enteredBasement) {
        echo "Character Position that causes entering the basement: " . $i+1 . "<br>";
        $enteredBasement = true;
    }
}

$timeToGoThroughForLoop = microtime(true);

echo "Final Floor Number: " . $floorNumber;
$timeToEchoFinalFloorNumber = microtime(true);

$timeEnd = microtime(true);
$time = $timeEnd - $timeStart;

echo "<br><br>Calculation Time: " . $time * 1000 . " ns<br>";
echo "-- Time to Read File: " . ($timeReadFile - $timeStart) * 1000 . " ns<br>";
echo "-- Time to Put File in String: " . ($timeToPutFileInString - $timeReadFile) * 1000 . " ns<br>";
echo "-- Time to Assign Variables: " . ($timeToAssignVariables - $timeToPutFileInString) * 1000 . " ns<br>";
echo "-- Time to go through For Loop: " . ($timeToGoThroughForLoop - $timeToAssignVariables) * 1000 . " ns<br>";
echo "---- Each iteration took on average: " . (($timeToGoThroughForLoop - $timeToAssignVariables) / $i ) * 1000 . " ns<br>";
echo "-- Time to echo Final Floor: " . ($timeToEchoFinalFloorNumber - $timeToGoThroughForLoop) * 1000 . " ns<br>";
