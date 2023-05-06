<?php

namespace Versonix\Interview\Helpers;

class StrHelper {

    public static function trimToLower(string $value): string
    {
        return trim(strtolower($value));
    }
}