<?php


namespace util;


use DateTime;

class Parser
{
    public static function toDateTime(string &$date)
    {
        return $date = DateTime::createFromFormat('Y-m-d', $date);
    }
}