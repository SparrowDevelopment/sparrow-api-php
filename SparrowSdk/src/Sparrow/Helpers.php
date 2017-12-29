<?php
namespace Sparrow;

class Helpers
{
    public static function tryGetValue($array, $key)
    {
        return (array_key_exists($key, $array)) ? $array[$key] : null;
    }
}

