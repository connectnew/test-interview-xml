<?php

namespace Versonix\Interview\Services\Logbook;

use Versonix\Interview\Main\Logger;

class Logservice extends Logger {

    public static function info(string $message): void
    {
        static::$log->info($message);
    }

    public static function notice(string $message): void
    {
        static::$log->notice($message);
    }

    public static function warning(string $message): void
    {
        static::$log->warning($message);
    }

    public static function error(string $message): void
    {
        static::$log->error($message);
    }
}
