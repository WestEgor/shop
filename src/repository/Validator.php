<?php


namespace repository;


class Validator
{

    static public function validateInt($intNumber): bool
    {
        return (filter_var($intNumber, FILTER_VALIDATE_INT));
    }

    static public function validateFloat($floatVal): bool
    {
        return (filter_var($floatVal, FILTER_VALIDATE_FLOAT));
    }

    static public function validateString($str): bool
    {
        return trim($str) !== '';
    }

}