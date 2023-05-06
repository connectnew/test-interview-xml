<?php

namespace Versonix\Interview\Main;

use Versonix\Interview\Main\Traits\ParamTrait;

class Prepare {

    use ParamTrait;

    public function __construct(string $baseDir)
    {
        $this->initParams($baseDir);
        $this->initTimeZone();
        $this->initLogger();
    }

    private function initParams($baseDir): void
    {
        $configFolder = $this->getConfigFolder($baseDir);

        $this->loadParamsFromFolder($configFolder);

        Param::set('app.base_dir', $baseDir);
        Param::set('app.static_ip', getenv('NGINX_STATIC_IP'));
    }

    private function initLogger(): void
    {
        new Logger();
    }

    private function initTimeZone()
    {
        date_default_timezone_set(Param::get('app.timezone'));
    }
}