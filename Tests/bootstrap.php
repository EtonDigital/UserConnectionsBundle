<?php

$file = __DIR__.'/../vendor/autoload.php';
if (!file_exists($file))
{
    $file = __DIR__.'/../../../../../../vendor/autoload.php';
    if (!file_exists($file))
        throw new RuntimeException('Run composer update.');
}

$autoload = require_once $file;