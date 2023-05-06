<?php

namespace Versonix\Interview\Main;

use Monolog\Level;
use Monolog\Logger as MonologLogger;
use Monolog\Handler\StreamHandler;

class Logger {

    protected static $log;

    public function __construct(string $chanel = 'main')
    {
        $log = new MonologLogger($chanel);

        $this->initLog($log);
    }

    private function initLog(MonologLogger $log): void
    {
        $log->pushHandler(new StreamHandler($this->getFile('info'), Level::Info));
        $log->pushHandler(new StreamHandler($this->getFile('notice'), Level::Notice));
        $log->pushHandler(new StreamHandler($this->getFile('error'), Level::Error));
        $log->pushHandler(new StreamHandler($this->getFile('warning'), Level::Warning));

        self::$log = $log;
    }

    private function getFile(string $level)
    {
        return Param::get("app.base_dir") . Param::get("app.log.$level");
    }
}