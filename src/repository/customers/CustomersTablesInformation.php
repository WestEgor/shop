<?php

namespace repository\customers;

use repository\AbstractColumnsTablesInformation;

/**
 * Class CustomersTablesInformation
 * Extends AbstractColumnsTablesInformation
 * Contain information about entity 'customers' columns
 *
 * @package repository\customers
 */
class CustomersTablesInformation extends AbstractColumnsTablesInformation
{

    /**
     * Implementation of abstract method
     *
     * @return string get all names of columns from table 'customers'
     */
    public function getColumnsQuery(): string
    {
        return "SELECT * FROM information_schema.columns
                         WHERE table_schema = 'public'
                         AND table_name   = 'customers'";
    }
}
