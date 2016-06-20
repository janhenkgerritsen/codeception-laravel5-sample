<?php

namespace App\Test;

class ToLowercase implements StringConverter
{
    /**
     * @param $string
     * @return string
     */
    public function convert($string)
    {
        return strtolower($string);
    }
}