<?php

namespace util;


use DateTime;
use model\ModelInterface;

/**
 * Class Validator
 * Class to validate input variables
 * @package util
 */
class Validator
{

    /**
     * @param int $intNumber
     * @return bool
     * return TRUE iff $intNumber is integer
     * return FALSE if $intNumber doesnt integer
     */
    public static function validateInt(mixed $intNumber): bool
    {
        return is_int(filter_var($intNumber, FILTER_VALIDATE_INT));
    }

    /**
     * @param mixed $floatVal
     * @return bool
     * return TRUE iff $floatVal is float
     * return FALSE if $floatVal doesnt float
     */
    public static function validateFloat(mixed $floatVal): bool
    {
        return is_float(filter_var($floatVal, FILTER_VALIDATE_FLOAT));
    }

    /**
     * @param mixed $str
     * @return bool
     * return TRUE iff $str is not empty string
     * return FALSE if $str is empty string
     */
    public static function validateString(mixed &$str): bool
    {
        return trim($str) !== '';
    }

    /**
     * @param mixed $email
     * @return bool
     * return TRUE iff $email after sanitize is valid
     * return FALSE if $email after sanitize is not valid
     */
    public static function validateEmail(mixed &$email): bool
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return is_string(filter_var($email, FILTER_VALIDATE_EMAIL));
    }

}