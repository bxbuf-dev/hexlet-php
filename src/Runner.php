<?php
namespace Hexlet\Php\Runner;

function run()
{
  $collection = collect(['taylor', 'abigaile', null])->map(function ($name){
    return mb_strtoupper($name);
  });

    echo $collection;
    return $collection;

}
