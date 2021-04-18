<?php


namespace util;


use DateTime;

class Parser
{
    public static function toDateTime(string &$date)
    {
        if ($date = DateTime::createFromFormat('Y-m-d', $date)) {
            return true;
        }
        return false;
    }
}