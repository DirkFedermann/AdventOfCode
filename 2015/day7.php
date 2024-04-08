<?php

$wires = [];
$wires2 = [];
$op = [
    'AND' => '&',
    'OR' => '|',
    'NOT' => '~',
    'RSHIFT' => '>>',
    'LSHIFT' => '<<'
];

foreach (file('day7.txt', FILE_IGNORE_NEW_LINES) as $line) {
    [$k, $v] = explode(' -> ', $line);
	$wires[$v] = $k;
	$wires2[$v] = $k;
}

function f($w) {
	global $wires;

    if (!isset($wires[$w])) {
        return $w;
    }

    if (str_contains((string) $wires[$w], ' ')) {
        eval('$wires[$w] = (' . preg_replace_callback(
            '#(([a-z0-9]+) )?([A-Z]+) ([a-z0-9]+)#',
            static fn($p): string => f($p[2]) . $GLOBALS['op'][$p[3]] . f($p[4]),
            (string) $wires[$w]) . ' & 65535);'
        );
    }
	
	return f($wires[$w]);
}

function f2($w) {
	global $wires2;

    if (!isset($wires2[$w])) {
        return $w;
    }

    if (str_contains((string) $wires2[$w], ' ')) {
        eval('$wires2[$w] = (' . preg_replace_callback(
            '#(([a-z0-9]+) )?([A-Z]+) ([a-z0-9]+)#',
            static fn($p): string => f2($p[2]) . $GLOBALS['op'][$p[3]] . f2($p[4]),
            (string) $wires2[$w]) . ' & 65535);'
        );
    }
	
	return f2($wires2[$w]);
}

$wires['b'] = 1674;
$partOne = f('a');
echo "Part 1: " . $partOne . "<br>";

$wires2['b'] = 46065;
$partTwo = f2('a');
echo "Part 2: " . $partTwo;

