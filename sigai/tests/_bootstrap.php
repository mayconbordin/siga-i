<?php
// This is global bootstrap for autoloading

include __DIR__.'/../vendor/autoload.php'; // composer autoload

$kernel = \AspectMock\Kernel::getInstance();
$kernel->init([
    'appDir'    => __DIR__ . '/../../',
    'cacheDir' => __DIR__.'/_data/cache',
    'debug' => true,
    'includePaths' => [__DIR__.'/../vendor/laravel', __DIR__.'/../app']
]);