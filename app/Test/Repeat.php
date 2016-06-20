<?php

namespace App\Test;

class Repeat implements StringConverter
{
    private $times;

    /**
     * Repeat constructor.
     * @param $times
     */
    public function __construct($times)
    {
        $this->times = $times;
    }

    /**
     * @param $string
     * @return string
     */
    public function convert($string)
    {
        return str_repeat($string, $this->times);
    }
}