<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Versonix\Interview\Main\Core;
use Versonix\Interview\Main\Prepare;

$baseDir = __DIR__. '/../';
if (!is_dir($baseDir)) {
    throw new Exception("Error $baseDir is not found");
}

session_start();

new Prepare($baseDir);

(new Core())->run();