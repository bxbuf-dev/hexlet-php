<?php

namespace Hexlet\Php\StringUtilsTests;

use Hexlet\Php\StringUtils;

function testStringUtils()
{
    if (StringUtils\capitalize('') != '') {
    throw new \Exception("Функция работает не верно\n");
    }

    $res = StringUtils\capitalize('hello');
    if (StringUtils\capitalize('hello') != 'Hello') {
        throw new \Exception("Функция работает не верно\n{$res} не равно 'Hello'\n");
    }

    echo "Тесты прошли успешно\n";
}
