<?php

namespace logger\main;

class Formatter implements FormatterInterface
{

    public function format($date, $level, $message  = 'set log', $context = [])
    {
        $log = '[' . $date . ']' . '[' . $level . ']' . '[' . $message . ']';

        $context = $this->contextFormat($context);

        if($context){
            $log .= $context;
        }

        return $log;

    }

    public function contextFormat($context = array())
    {
        $str_context = '';
        if(is_array($context) && count($context) > 0){
            $str_context .= '[';
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
        }else{
            return false;
        }
    }
}