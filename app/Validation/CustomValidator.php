<?php

namespace App\Validation;

use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{
    public function validatePostalCode($attribute, $value, $parameters)
    {
        return (bool)preg_match('/^[1-9][0-9]{3} ?[a-zA-Z]{2}$/', $value);
    }
}