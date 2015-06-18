<?php
// This is global bootstrap for autoloading

include __DIR__.'/../vendor/autoload.php'; // composer autoload

$kernel = \AspectMock\Kernel::getInstance();
$kernel->init([
    'appDir'    => __DIR__ . '/../../',
    'debug' => true,
    'includePaths' => [__DIR__.'/../vendor/laravel', __DIR__.'/../app']
]);