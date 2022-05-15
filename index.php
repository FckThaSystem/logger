<?php

include __DIR__ . '/vendor/autoload.php';

$formatter = new \logger\main\Formatter();
$writer = new \logger\main\Writer($formatter);
$logger = new \logger\main\setLog($writer);

$logger->debug('hello world', [0 => '11', 1 => '12']);