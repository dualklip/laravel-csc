<?php

namespace Dualklip\Csc;

class Csc
{
    protected static $config = [];

    public static function setConfig(array $config): void
    {
        static::$config = $config;
    }

    public static function getConfig(string $key = null)
    {
        if ($key) {
            return static::$config[$key] ?? null;
        }

        return static::$config;
    }
}
