<?php

namespace logger\main;

include __DIR__ . '/../vendor/autoload.php';

class Writer implements WriterInterface
{
    private $formatter;
    private $source = __DIR__ . '/../logs/info.log';

    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }
    public function write($level, $message, $context = array())
    {
        $date = date('Y-m-d H:i:s');
        $log = $this->formatter->format($date, $level, $message, $context);
        $handle = fopen($this->source, 'c');
        if($handle){
            if(isset($log)){
                file_put_contents($this->source, $log . PHP_EOL, FILE_APPEND | LOCK_EX);
            }else{
                file_put_contents($this->source, '['. $date . ']' . '[Warning: failed to write log]' . PHP_EOL, FILE_APPEND | LOCK_EX);
            }
            return true;
        }else{
            return false;
        }
    }
}