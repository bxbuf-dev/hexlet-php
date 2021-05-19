<?php

namespace Hexlet\Php\Map;

function getIndex(string $key)
{
    return crc32($key) % 1000;
}

function isCollision(array $dic, $key)
{
    $index = getIndex($key);
    [$curKey] = $dic[$index];
    return $curKey != $key;
}

function make()
{
    return [];
}

function get(array &$dic, string $key, $defaultValue = null)
{
    $index = getIndex($key);
    return (empty($dic[$index]) || isCollision($dic, $key)) ? $defaultValue : $dic[$index][1];
}

function set(array &$dic, $key, $value)
{
    $index = getIndex($key);
    if (!empty($dic[$index]) && isCollision($dic, $key)) {
        return false;
    }
    $dic[$index] = [$key, $value];
    return true;
}
