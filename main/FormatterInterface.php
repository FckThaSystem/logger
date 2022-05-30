<?php
/**
 *@version 1.0.0
 */
namespace logger\main;
/**
 * Интерфейс для форматтера данных
 *
 * @author Rostyslav Kibkalo <rostislav.kibkalo@gmail.com>
 * @package rostyslav\logger
 */
interface FormatterInterface
{
    /**
     * @param string $date
     * @param string $level
     * @param string $message
     * @param array $context
     *
     * @return string
     */
    public function format($date, $level, $message, $context) : string;

}