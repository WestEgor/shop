<?php

namespace util;

use DateTime;

/**
 * Class Parser
 * Need for parse data
 *
 * @package util
 */
class Parser
{
    /**
     * Method to parse from string to DateTime
     *
     * @param  string $date
     * @return DateTime|bool
     */
    public static function toDateTime(string &$date): DateTime|bool
    {
        return $date = DateTime::createFromFormat('Y-m-d', $date);
    }
}
