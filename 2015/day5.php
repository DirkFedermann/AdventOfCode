<?php

$fileLines = file("day5.txt", FILE_IGNORE_NEW_LINES);

foreach ($fileLines as $fileLine) {
    $hasVowel = ['a' => 0, 'e' => 0, 'i' => 0, 'o' => 0, 'u' => 0];
    $hasDoubleLetter = false;
    $hasForbidden = false;
    $letters = str_split($fileLine);

    for ($i = 0; $i < count($letters); ++$i) {
        if (array_key_exists($letters[$i], $hasVowel)) {
            ++$hasVowel[$letters[$i]];
        }
        
        if ($letters[$i] == $letters[$i + 1]) {
            $hasDoubleLetter = true;
        }

        $doubledLetters = $letters[$i] . $letters[$i + 1];
        if (
            $doubledLetters == "ab" ||
            $doubledLetters == "cd" ||
            $doubledLetters == "pq" ||
            $doubledLetters == "xy"
        ) {
            $hasForbidden = true;
        }

    }
    
    if (array_sum($hasVowel) >= 3 && $hasDoubleLetter && !$hasForbidden) {
        ++$numberLinesNice;
    }

}

echo $numberLinesNice . "<hr>";
