<?php

namespace util;

use DateTime;

/**
 * Class DateMethods
 *
 * @package util
 */
class DateMethods
{
    /**
     * Method to set DateTime
     *
     * @param  mixed $dateTime
     * @return DateTime
     */
    public static function setDate(mixed $dateTime): DateTime
    {
        $date = DateTime::createFromFormat('Y-m-d', $dateTime);
        if ($date instanceof DateTime) {
            return $date;
        }
        return new DateTime('1970-01-01');
    }
}
