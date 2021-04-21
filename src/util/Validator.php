<?php

namespace util;


/**
 * Class Validator
 * Class to validate input variables
 * @package util
 */
class Validator
{

    /**
     * @param $intNumber
     * @return bool
     * return TRUE iff $intNumber is integer
     * return FALSE if $intNumber doesnt integer
     */
    public static function validateInt($intNumber): bool
    {
        return (filter_var($intNumber, FILTER_VALIDATE_INT));
    }

    /**
     * @param $floatVal
     * @return bool
     * return TRUE iff $floatVal is float
     * return FALSE if $floatVal doesnt float
     */
    public static function validateFloat($floatVal): bool
    {
        return (filter_var($floatVal, FILTER_VALIDATE_FLOAT));
    }

    /**
     * @param $str
     * @return bool
     * return TRUE iff $str is not empty string
     * return FALSE if $str is empty string
     */
    public static function validateString(&$str): bool
    {
        return trim($str) !== '';
    }

    /**
     * @param string $email
     * @return bool
     * return TRUE iff $email after sanitize is valid
     * return FALSE if $email after sanitize is not valid
     */
    public static function validateEmail(string &$email): bool
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

}