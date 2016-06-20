<?php

namespace App\Test;

interface StringConverter
{
    /**
     * @param $string
     * @return string
     */
    public function convert($string);
}