<?php

namespace Hexlet\Php\Functions;

use Funct\Collection;

function flatten(array $arr) //done
{
    if (empty($arr)) {
        return $arr;
    }
    $result = [];
    foreach ($arr as $item) {
        if (is_array($item)) {
            $result = [...$result, ...$item];
        } else {
            $result [] = $item;
        }
    }
    return $result;
}

function getComposerFileData()
{
    $arr = [
        "autoload" => [
            "files" => [
                "src/Arrays.php"
            ]
        ],
        "config" => [
            "vendor-dir" => "/composer/vendor"
        ]
    ];
    return $arr;
}

function getDomainInfo($url)
{
    $tmp = explode('://', $url);
    if (array_key_last($tmp) == 0) {
        $scheme = 'http';
        $name = $tmp[0];
    } else {
        $scheme = $tmp[0];
        $name = $tmp[1];
    }
    return ['scheme' => $scheme, 'name' => $name];
}

// BEGIN (write your solution here)
function countWords($string)
{
    $result = [];
    $lowerString = strtolower($string);
    $tmp = explode(' ', $lowerString);
    foreach ($tmp as $word) {
        if ($word !== '') {
            $result[$word] = ($result[$word] ?? 0) + 1;
        }
    }
    return $result;
}

function pick(array $input, array $criteria): array
{
    $result = [];
    foreach ($criteria as $key) {
        if (array_key_exists($key, $input)) {
            $result[$key] = $input[$key];
        }
    }
    return $result;
}

function getIn(array $input, array $keys)
{
    $result = $input;
    foreach ($keys as $key) {
        if (!is_array($result) || !array_key_exists($key, $result)) {
            return null;
        }
        $result = $result[$key];
    }
    return $result;
}

function genDiff(array $before, $after)
{
    $result = [];
    $keys = array_merge(array_keys($before), array_keys($after));
    $keys = array_unique($keys);
    foreach ($keys as $key) {
        if (!array_key_exists($key, $before)) {
            $result[$key] = 'added';
        } elseif (!array_key_exists($key, $after)) {
            $result[$key] = 'deleted';
        } else {
            $result[$key] = $before[$key] === $after[$key] ? 'unchanged' : 'changed';
        }
    }
    return $result;
}

function getSortedNames($users)
{
    $names = [];
    foreach ($users as ['name' => $name]) {
        $names[] = $name;
    }
    sort($names);
    return $names;
}

function buildQueryString(array $query)
{
    ksort($query);
    $res = [];
    foreach ($query as $param => $value) {
        $res[] = "{$param}={$value}";
    }
    return implode("&", $res);
}

function sayPrimeOrNot($num)
{
    $answer = isPrime($num) ? 'yes' : 'no';
    print_r($answer);
    return;
}

function isPrime($num): bool
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function average(...$numbers)
{
    return empty($numbers) ? null : array_sum($numbers) / count($numbers);
}

function union($first, ...$rest)
{
    $result = [];
    foreach (array_unique(array_merge($first, ...$rest)) as $item) {
        $result[] = $item;
    }
    return $result;
}

function slugify(string $text): string
{
    $functions = ['trim', 'strToLower'];
    foreach ($functions as $func) {
        $result = $func($text);
        $text = $result;
    }
    $result = explode(" ", $text);
    $result = Collection\compact($result);
    return implode('-', $result);
}

function run(string $text)
{
    // BEGIN (write your solution here)
    $last = fn($text) => $text == '' ? null : $text[strlen($text) - 1];
    // END

    return $last($text);
}

function takeOldest(array $list, int $number = 1): array
{
    $sortedList = $list;
    usort($sortedList, fn($a, $b) => $a['birthday'] <=> $b['birthday']);
    return Collection\firstN($sortedList, $number);
}

function getChildren($userList)
{
    $children = array_map(fn($users) => $users['children'], $userList);
    return Collection\flatten($children);
}

function getGirlFriends($userList)
{
    $girlFriends = array_map(fn($users) => $users['friends'], $userList);
    $girlFriends = Collection\flatten($girlFriends);
    $girlFriends = array_filter($girlFriends, fn($friends) => $friends['gender'] == 'female');
    
    return array_values($girlFriends);
}

function getMenCountByYear($users)
{
    $men = array_filter($users, fn($usersList) => $usersList['gender'] == 'male');
    $years = array_map(fn($list) => substr($list['birthday'], 0, 4), $men);
    $qtyByYear = array_reduce($years, function ($acc, $year) {
        $acc[$year] =
            array_key_exists($year, $acc) ? $acc[$year] + 1 : 1;
            return $acc;
    }, []);
    return $qtyByYear;
}
