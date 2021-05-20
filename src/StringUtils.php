<?php

namespace Hexlet\Php\StringUtils;

function capitalize(string $text): string
{
    if ($text == '') {
        return '';
    }
    $firstSymbol = strtoupper($text[0]);
    $restText = substr($text, 1);
    return $firstSymbol . $restText;
}
