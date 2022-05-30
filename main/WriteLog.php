<?php
/**
 * @version 1.0.0
 */
namespace logger\main;

use Psr\Log\AbstractLogger;

include __DIR__ . '/../vendor/autoload.php';
/**
 * Класс, принимающий класс который имплементирует @var WriterInterface
 * и работает с его методами
 *
 * @author Rostyslav Kibkalo <rostislav.kibkalo@gmail.com>
 * @package rostyslav\logger
 */
class WriteLog extends AbstractLogger
{
     /**
     * @var WriterInterface
     */
    private $writer;

    public function __construct(WriterInterface $writer){
        $this->writer = $writer;
    }
    /**
     * @param string $level
     * @param string $message
     * @param array $context
     */
    public function log($level, $message, array $context = array())
    {
        $this->writer->write($level, $message, $context);
    }
}