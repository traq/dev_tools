<?php

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../src/version.php';

use Avalon\Testing\TestSuite;
use Traq\Database\Seeder;

TestSuite::configure(function ($t) {
    $t->setAppClass("Traq\\Traq");
    $t->setAppPath(__DIR__ . '/../../src');
    $t->setAppConfig(require __DIR__ . '/../../config/config.php');
    $t->setSeeder(new Seeder);

    define('START_TIME', microtime(true));
    define('START_MEM', memory_get_usage());
});


foreach (scandir(__DIR__ . '/Controllers') as $testFile) {
    if ($testFile !== '.' && $testFile !== '..') {
        require __DIR__ . "/Controllers/{$testFile}";
    }
}

TestSuite::run();
