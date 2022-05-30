<?php
/**
 * @version 1.0.0
 */
namespace logger\main;
/**
 * Интерфейс для записи данных в хранилище
 *
 * @author Rostyslav Kibkalo <rostislav.kibkalo@gmail.com>
 * @package rostyslav\logger
 */
interface WriterInterface
{
     /**
     * Метод принимает данные логирования, форматирует их и записывает в файл
     *
     * @param string $level
     * @param string $message
     * @param array $context
     *
     * @return bool
     */
    public function write(string $level, string $message, array $context = array()) :bool;
}