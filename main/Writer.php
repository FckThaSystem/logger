<?php
/**
 * @version 1.0.0
 */
namespace logger\main;

include __DIR__ . '/../vendor/autoload.php';
/**
 * Этот класс записывает данные логирования в файл.
 *
 * @author Rostyslav Kibkalo <rostislav.kibkalo@gmail.com>
 * @package rostyslav\logger
 */
class Writer implements WriterInterface
{
    /**
     * @var FormatterInterface
     */
    private $formatter;

    /**
     * @var string
     */
    private $source = __DIR__ . '/../logs/info.log';

    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }
    /**
     * Метод принимает данные логирования, форматирует их и записывает в файл
     *
     * @param string $level
     * @param string $message
     * @param array $context
     *
     * @return bool
     */
    public function write(string $level, string $message, array $context = array()) :bool
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