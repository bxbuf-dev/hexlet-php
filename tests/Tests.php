<?php

namespace Hexlet\Php\Tests;

use function Hexlet\Php\Functions\getSortedNames;

use function Hexlet\Php\Map\make;
use function Hexlet\Php\Map\get;
use function Hexlet\Php\Map\set;

use function Hexlet\Php\Algorythms\mathFunc;
use function Hexlet\Php\Algorythms\binarySearch;

use function Hexlet\Php\Functions\buildQueryString;
use function Hexlet\Php\Functions\sayPrimeOrNot;
use function Hexlet\Php\Functions\average;
use function Hexlet\Php\Functions\union;
use function Hexlet\Php\Functions\slugify;
use function Hexlet\Php\Functions\run;
use function Hexlet\Php\Functions\takeOldest;
use function Hexlet\Php\Functions\getChildren;
use function Hexlet\Php\Functions\getGirlFriends;
use function Hexlet\Php\Functions\getMenCountByYear;
use function Hexlet\Php\Functions\getFreeDomainsCount;
use function Hexlet\Php\Functions\getManWithLeastFriends;
use function Hexlet\Php\Functions\without;
use function Hexlet\Php\Functions\enlargeArrayImage;

function testEnlargeArrayImage()
{
    $image = [
        ['*','*','*','*'],
        ['*',' ',' ','*'],
        ['*',' ',' ','*'],
        ['*','*','*','*']
      ];
    var_dump(enlargeArrayImage($image));
}

function testWithout()
{
    print_r(without([3, 4, 10, 4, 'true'], 4)); // [3, 10, 'true']
    print_r(without(['3', 2, 6, 5, 11, 0], 0, 5, 11)); // ['3', 2]
}

function testGetManWithLeastFriends()
{
    $users = [
        ['name' => 'Tirion', 'friends' => [
            ['name' => 'Mira', 'gender' => 'female'],
            ['name' => 'Ramsey', 'gender' => 'male']
        ]],
        ['name' => 'Bronn', 'friends' => []],
        ['name' => 'Sam', 'friends' => [
            ['name' => 'Aria', 'gender' => 'female'],
            ['name' => 'Keit', 'gender' => 'female']
        ]],
        ['name' => 'Keit', 'friends' => []],
        ['name' => 'Rob', 'friends' => [
            ['name' => 'Taywin', 'gender' => 'male']
        ]],
    ];

    var_dump(getManWithLeastFriends([]));
    var_dump(getManWithLeastFriends($users));
}


function testGetFreeDomainsCount()
{
    $emails = [
        'info@gmail.com',
        'info@yandex.ru',
        'info@hotmail.com',
        'mk@host.com',
        'support@hexlet.io',
        'key@yandex.ru',
        'sergey@gmail.com',
        'vovan@gmail.com',
        'vovan@hotmail.com'
    ];
     
    print_r(getFreeDomainsCount($emails)); 
}

function testGetMenCountByYear()
{
    $users = [
        ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1999-03-23'],
        ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1999-11-03'],
        ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
        ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2015-11-03'],
        ['name' => 'Jon', 'gender' => 'male', 'birthday' => '1980-11-03'],
        ['name' => 'Robb','gender' => 'male', 'birthday' => '1980-05-14'],
        ['name' => 'Tisha', 'gender' => 'female', 'birthday' => '2015-11-03'],
        ['name' => 'Rick', 'gender' => 'male', 'birthday' => '1999-11-03'],
        ['name' => 'Joffrey', 'gender' => 'male', 'birthday' => '1999-11-03'],
        ['name' => 'Edd', 'gender' => 'male', 'birthday' => '1999-11-03']
    ];
    print_r(getMenCountByYear($users));
}

function testGetGirlFriends()
{
    $users = [
        ['name' => 'Tirion', 'friends' => [
            ['name' => 'Mira', 'gender' => 'female'],
            ['name' => 'Ramsey', 'gender' => 'male']
        ]],
        ['name' => 'Bronn', 'friends' => []],
        ['name' => 'Sam', 'friends' => [
            ['name' => 'Aria', 'gender' => 'female'],
            ['name' => 'Keit', 'gender' => 'female']
        ]],
        ['name' => 'Rob', 'friends' => [
            ['name' => 'Taywin', 'gender' => 'male']
        ]],
    ];
     
    print_r(getGirlFriends($users));
}

function testGetChildren()
{
    $users = [
        ['name' => 'Tirion', 'children' => [
            ['name' => 'Mira', 'birdhday' => '1983-03-23']
        ]],
        ['name' => 'Bronn', 'children' => []],
        ['name' => 'Sam', 'children' => [
            ['name' => 'Aria', 'birdhday' => '2012-11-03'],
            ['name' => 'Keit', 'birdhday' => '1933-05-14']
        ]],
        ['name' => 'Rob', 'children' => [
            ['name' => 'Tisha', 'birdhday' => '2012-11-03']
        ]],
    ];
 //   var_dump($users[0]['children']);     
    print_r(getChildren($users));
}

function testBinarySearch()
{
    $list = [1,4,6,7,90,97,100,110,340,505];
    var_dump(binarySearch($list, 90));
    var_dump(binarySearch($list, 505));
}

function testMathFunc()
{
    $i = min(100, max(min(45, max(34, 18)), min(45, 4)));
    print_r($i);
    echo "=>";
    $j = mathFunc('min(100,max(min(45,max(34,18)),min(45,4)))');
    var_dump($j);
    echo "\n";

    $i = min(12, 18);
    print_r($i);
    echo "=>";
    $j = mathFunc('min(12,18)');
    var_dump($j);
    echo "\n";
}

function testTakeOldest()
{
    $users = [
        ['name' => 'Tirion', 'birthday' => '1988-11-19', 'id' => 0],
        ['name' => 'Sam', 'birthday' => '1999-11-22', 'id' => 1],
        ['name' => 'Rob', 'birthday' => '1975-01-11', 'id' => 2],
        ['name' => 'Sansa', 'birthday' => '2001-03-20', 'id' => 3],
        ['name' => 'Tisha', 'birthday' => '1992-02-27', 'id' => 4]
    ];
    var_dump(takeOldest($users));
    var_dump(takeOldest($users, 2));
}

function testRun()
{
    var_dump(run(''));     // null
    var_dump(run('0'));    // 0
    var_dump(run('210'));  // 0
    var_dump(run('pow'));  // w
    var_dump(run('kids')); // s
}

function testSlugify()
{
    print_r(slugify('La La la LA'));
    echo "\n";
    print_r(slugify('')); // ''
    echo "\n";
    print_r(slugify('test')); // 'test'
    echo "\n";
    print_r(slugify('test me')); // 'test-me'
    echo "\n";
    print_r(slugify('La La la LA')); // 'la-la-la-la'
    echo "\n";
    print_r(slugify('O la      lu')); // 'o-la-lu'
    echo "\n";
    print_r(slugify(' yOu   ')); // 'you'
    echo "\n";
}

function testUnion()
{
    var_dump(union([3]));
    var_dump(union([3, 2], [2, 2, 1]));
    var_dump(union(['a', 3, false], [true, false, 3], [false, 5, 8]));
}


function testAverage()
{
    var_dump(average(-3, 4, 2, 10));
}


function testPrime()
{
    sayPrimeOrNot(5);
    sayPrimeOrNot(4);
}

function testBuildQuery()
{
    var_dump(buildQueryString(['per' => 10, 'page' => 1]));
// → page=1&per=10
}

function testMap() {
    $map = make();
 
    $result = get($map, 'key');
    var_dump($result); // => null
 
    $result = get($map, 'key', 'value');
    var_dump($result); // => value

    set($map, 'key2', 'value2');
    $result = get($map, 'key2');
    var_dump($map); // => value2

    set($map, 'key1', 'value2-1');
    var_dump($map);

}

function testGetSortedNames()
{
    $users = [
        ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
        ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
        ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
        ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03']
    ];
    
    var_dump(getSortedNames($users));
}