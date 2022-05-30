<?php

include __DIR__ . '/vendor/autoload.php';

$formatter = new \logger\main\Formatter();
$writer = new \logger\main\Writer($formatter);
$logger = new \logger\main\WriteLog($writer);

$logger->debug('hello world', [0 => '1', 1 => '2']);

exit();