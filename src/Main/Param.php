<?php

namespace Versonix\Interview\Main;

use Versonix\Interview\Helpers\StrHelper;

class Param
{

    const SEPARATE = ".";

    private static $storage = [];

    public static function set($key, $value): void
    {
        $key = StrHelper::trimToLower($key);
        $deepKeys = self::getDeepKeys($key);

        if ($deepKeys) {
            $result = &self::$storage;

            foreach ($deepKeys as $item) {
                if (!isset($result[$item])) {
                    $result[$item] = [];
                }
                $result = &$result[$item];
            }
            $result = $value;

        } else {
            self::$storage[$key] = $value;
        }
    }

    public static function get(string $key, $default = null)
    {
        $key = StrHelper::trimToLower($key);
        $deepKeys = self::getDeepKeys($key);

        if ($deepKeys) {
            $result = self::$storage;

            foreach ($deepKeys as $item) {
                if (isset($result[$item])) {
                    $result = $result[$item];
                } else {
                    return $default;
                }
            }

            if ($result) {
                return $result;
            }
        }

        return (isset(self::$storage[$key])) ? self::$storage[$key] : $default;
    }

    public static function all(): array
    {
        return self::$storage;
    }

    public static function remove($key): void
    {
        unset(self::$storage[$key]);
    }

    public static function clean(): void
    {
        self::$storage = [];
    }

    private static function getDeepKeys(string $key): array
    {
        $arr = [];

        if (strpos($key, self::SEPARATE) !== false) {
            $arr = explode(self::SEPARATE, $key);
        }

        return $arr;
    }
}