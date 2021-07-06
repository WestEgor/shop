<?php

namespace repository\order_details;

use repository\AbstractColumnsTablesInformation;

/**
 * Class OrderDetailsTablesInformation
 * Extends AbstractColumnsTablesInformation
 * Contain information about entity 'order_details' columns
 *
 * @package repository\order_details
 */
class OrderDetailsTablesInformation extends AbstractColumnsTablesInformation
{

    /**
     * Implementation of abstract method
     *
     * @return string get all names of columns from table 'order_details'
     */
    public function getColumnsQuery(): string
    {
        return "SELECT * FROM information_schema.columns
                         WHERE table_schema = 'public'
                         AND table_name   = 'order_details'";
    }
}
