<?php

namespace Hexlet\Php\Algorythms;

use Funct\Collection;

function mathFunc(string $exp): int
{
    $exp = str_replace(')', ',', $exp);
    $exp = str_replace('(', ',', $exp);
    $expData = explode(',', $exp);
    $expData = array_values(Collection\compact($expData));
    for ($i = 0; $i < count($expData) - 2; $i++) {
        if (is_numeric($expData[$i + 1]) && is_numeric($expData[$i + 2])) {
            $expData[$i] = $expData[$i]($expData[$i + 1], $expData[$i + 2]);
            array_splice($expData, $i + 1, 2);
            $i = -1;
        }
    }
    return $expData[0];
}

function binarySearch(array $list, $item): int
{
    $low = 0;
    $high = count($list) - 1; //9
    while ($low <= $high) {
        $mid = round(($high - $low) / 2, 0, PHP_ROUND_HALF_DOWN); //4 
        if ($item == $list[$mid]) {
            return $mid;
        }
        if ($item > $list[$mid]) {
            $high = $mid - 1;
        } else {
            $low = $mid  + 1;
        }
    }
}
