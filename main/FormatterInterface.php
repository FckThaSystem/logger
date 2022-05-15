<?php

namespace logger\main;

interface FormatterInterface
{
    public function format($date, $level, $message, $context);

    public function contextFormat($context = array());
}