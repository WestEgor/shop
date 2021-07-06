<?php

namespace repository\orders;

use repository\AbstractColumnsTablesInformation;

/**
 * Class OrdersColumnsInformation
 * Extends AbstractColumnsTablesInformation
 * Contain information about entity 'orders' columns
 *
 * @package repository\orders
 */
class OrdersColumnsInformation extends AbstractColumnsTablesInformation
{

    /**
     * Implementation of abstract method
     *
     * @return string get all names of columns from table 'orders'
     */
    public function getColumnsQuery(): string
    {
        return "SELECT * FROM information_schema.columns
                         WHERE table_schema = 'public'
                         AND table_name   = 'orders'";
    }
}
