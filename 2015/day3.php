<?php

$fileLines = file("day3.txt");

$string = $fileLines[0];

$houses = ['0/0' => 1];
$currentPositionX = 0;
$currentPositionY = 0;

for ($i = 0; $i < strlen($string); ++$i) {
    if ($string[$i] === "^") {
        ++$currentPositionY;
    }

    if ($string[$i] === ">") {
        ++$currentPositionX;
    }

    if ($string[$i] === "v") {
        --$currentPositionY;
    }
    
    if ($string[$i] === "<") {
        --$currentPositionX;
    }

    $currentPosition = $currentPositionX . "/" . $currentPositionY;

    if (array_key_exists($currentPosition, $houses)) {
        ++$houses[$currentPosition];
    } else {
        $houses += [$currentPosition => 1];
    }
}

echo "Santa delivers presents to <b>" . count($houses) . "</b> houses<br>";

$housesNextYear = ['0/0' => 2];
$currentPositionXSanta = 0;
$currentPositionYSanta = 0;
$currentPositionXRobo = 0;
$currentPositionYRobo = 0;
$santasTurn = true;

for ($j = 0; $j < strlen($string); ++$j) {
    if ($santasTurn) {
        if ($string[$j] === "^") {
            ++$currentPositionYSanta;
        }

        if ($string[$j] === ">") {
            ++$currentPositionXSanta;
        }

        if ($string[$j] === "v") {
            --$currentPositionYSanta;
        }

        if ($string[$j] === "<") {
            --$currentPositionXSanta;
        }

        $santasTurn = false;
        $currentPositionSanta = $currentPositionXSanta . "/" . $currentPositionYSanta;

        if (array_key_exists($currentPositionSanta, $housesNextYear)) {
            ++$housesNextYear[$currentPositionSanta];
        } else {
            $housesNextYear += [$currentPositionSanta => 1];
        }

    } else {
        if ($string[$j] === "^") {
            ++$currentPositionYRobo;
        }

        if ($string[$j] === ">") {
            ++$currentPositionXRobo;
        }

        if ($string[$j] === "v") {
            --$currentPositionYRobo;
        }

        if ($string[$j] === "<") {
            --$currentPositionXRobo;
        }

        $santasTurn = true;
        $currentPositionRobo = $currentPositionXRobo . "/" . $currentPositionYRobo;

        if (array_key_exists($currentPositionRobo, $housesNextYear)) {
            ++$housesNextYear[$currentPositionRobo];
        } else {
            $housesNextYear += [$currentPositionRobo => 1];
        }

    }
}

echo "Santa and Robo-Santa deliver presents to <b>" . count($housesNextYear) . "</b> houses";