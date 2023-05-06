<?php

namespace Versonix\Interview\Main\Traits;

use Versonix\Interview\Helpers\StrHelper;
use Versonix\Interview\Main\Param;
use Exception;

trait ParamTrait {

    const AVAILABLE_EXTENSION_FILE = ['.php'];

    private function loadParamsFromFolder(string $folder): void
    {
        $files = scandir($folder,SCANDIR_SORT_ASCENDING);
        $files = array_slice($files, 2);

        if ($files) {
            foreach($files as $file) {
                $path = "$folder/$file";
                if (is_file($path)) {
                    $key = StrHelper::trimToLower($file);
                    $key = str_replace(self::AVAILABLE_EXTENSION_FILE, "", $key);
                    Param::set($key, require_once $path);
                }
            }
        }
    }

    private function getConfigFolder(string $baseDir): string
    {
        $configFolder = $baseDir . 'config';

        if (!is_dir($configFolder)) {
            throw new Exception("Error $configFolder is not found");
        }

        return $configFolder;
    }
}