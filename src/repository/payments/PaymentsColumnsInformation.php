<?php

namespace repository\payments;

use repository\AbstractColumnsTablesInformation;

/**
 * Class PaymentsTableInformation
 * Extends AbstractColumnsTablesInformation
 * Contain information about entity 'payments' columns
 * @package repository\products
 */
class PaymentsColumnsInformation extends AbstractColumnsTablesInformation
{

    /**
     * Implementation of abstract method
     * @return string get all names of columns from table 'payments'
     */
    public function getColumnsQuery(): string
    {
        return "SELECT * FROM information_schema.columns
                         WHERE table_schema = 'public'
                         AND table_name   = 'payments'";
    }
}