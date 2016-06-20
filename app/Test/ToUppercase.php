<?php

namespace App\Test;

class ToUppercase implements StringConverter
{
    /**
     * @param $string
     * @return string
     */
    public function convert($string)
    {
        return strtoupper($string);
    }
}