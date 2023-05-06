<?php

namespace Versonix\Interview\Main;

use Jenssegers\Blade\Blade;
use Exception;

class Controller {

    protected $blade;

    public function __construct()
    {
        $this->initBlade();
    }

    protected function initBlade(): void
    {
        $views = $this->getBladeFolder(Param::get('app.blade.views'));
        $cache = $this->getBladeFolder(Param::get('app.blade.cache'));

        $this->blade = new Blade($views, $cache);
    }

    private function getBladeFolder(string $postfix): string
    {
        $baseDir = Param::get('app.base_dir');
        $folder = $baseDir . $postfix;

        if (is_dir($folder) === false) {
            throw new Exception("Error $folder is not found");
        }

        return $folder;
    }

    public function render(string $view, $param = []): void
    {
        echo $this->blade->render($view, $param);
    }
}