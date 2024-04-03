<?php

$fileLines = file("day6.txt");

$lights = [];
$lightBrightness = [];

for ($i = 0; $i < 1000; ++$i) {
    for ($j = 0; $j < 1000; ++$j) {
        $lights[$i][$j] = false;
        $lightBrightness[$i][$j] = 0;
    }
}

foreach ($fileLines as $fileLine) {
    $words = explode(" ", $fileLine);

    if ($words[0] == "turn") {
        $lightsFrom = explode(",", $words[2]);
        $lightsTo = explode(",", $words[4]);

        $lightXFrom = $lightsFrom[0];
        $lightYFrom = $lightsFrom[1];
        $lightXTo = $lightsTo[0];
        $lightYTo = $lightsTo[1];

        for ($k = $lightXFrom; $k <= $lightXTo; ++$k) {
            for ($l = $lightYFrom; $l <= $lightYTo; ++$l) {
                if ($words[1] == "on") {
                    $lights[$k][$l] = true;
                    ++$lightBrightness[$k][$l];
                }

                if ($words[1] == "off") {
                    $lights[$k][$l] = false;
                    if ($lightBrightness[$k][$l] > 0) {
                        --$lightBrightness[$k][$l];
                    }
                }
            }
        }
    }

    if ($words[0] == "toggle") {
        $lightsFrom = explode(",", $words[1]);
        $lightsTo = explode(",", $words[3]);

        $lightXFrom = $lightsFrom[0];
        $lightYFrom = $lightsFrom[1];
        $lightXTo = $lightsTo[0];
        $lightYTo = $lightsTo[1];

        for ($m = $lightXFrom; $m <= $lightXTo; ++$m) {
            for ($n = $lightYFrom; $n <= $lightYTo; ++$n) {
                $lights[$m][$n] = $lights[$m][$n] === false;
                $lightBrightness[$m][$n] += 2;
            }
        }
    }
}

$lightsOn = 0;
$lightsOnBrightness = 0;
for ($o = 0; $o < 1000; ++$o) {
    $lightsOn += array_sum($lights[$o]);
    $lightsOnBrightness += array_sum($lightBrightness[$o]);
}

echo $lightsOn . " Lights are on<br>";
echo "Brightness of the lights is " . $lightsOnBrightness . '<br>';
