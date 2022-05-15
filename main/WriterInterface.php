<?php

namespace logger\main;

interface WriterInterface
{
    public function write($level, $message, $context = array());
}