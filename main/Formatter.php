<?php
/**
 *@version 1.0.0
 */
namespace logger\main;
/**
 * Класс который отвечает за приведение логов к единому формату.
 *
 * @author Rostyslav Kibkalo <rostislav.kibkalo@gmail.com>
 * @package rostyslav\logger
 */
class Formatter implements FormatterInterface
{
    /**
     * Метод получает данные и отдает лог приведенный в строку в нужном формате.
     *
     * @param string $message
     * @param array $context
     * @param string $date
     * @param string $level
     *
     * @return string
     */
    public function format($date, $level, $message  = 'set log', $context = []) : string
    {
        $log = '[' . $date . ']' . '[' . $level . ']' . '[' . $message . ']';

        $context = $this->contextFormat($context);

        if($context){
            $log .= $context;
        }

        return $log;

    }
    /**
     * Метод получает массив данные и приводит его в строку в нужном формате.
     *
     * Используется только внутри класса.
     *
     * @param array $context
     * @return false|string
     */
    private function contextFormat(array $context = [])
    {
        if(is_array($context) && count($context) > 0){
            $str_context = '[';
            $index = 0;
            foreach ($context as $key => $value){
                $index++;
                $str_context .= '["' . $key . '" => "' . $value . '"]';
                if($index < count($context)){
                    $str_context .= ',';
                }
            }
            $str_context .= ']';
        }
        if(isset($str_context)){
            return $str_context;
        }

        return false;

    }
}