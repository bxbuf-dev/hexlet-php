<?php

namespace Hexlet\Php\StringUtilsTests;

use Hexlet\Php\StringUtils;
use Webmozart\Assert\Assert;

function testStringUtils()
{
    Assert::eq(StringUtils\capitalize(''), '');
    Assert::eq(StringUtils\capitalize('hello'), 'Hello');
    Assert::eq(StringUtils\capitalize('h'), 'H');
    Assert::eq(StringUtils\capitalize('hello world!'), 'Hello world!');
    echo "Тесты прошли успешно\n";
}
