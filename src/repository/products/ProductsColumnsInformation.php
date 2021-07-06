<?php

namespace repository\products;

use repository\AbstractColumnsTablesInformation;

/**
 * Class ProductsTableInformation
 * Extends AbstractColumnsTablesInformation
 * Contain information about entity 'products' columns
 *
 * @package repository\products
 */
class ProductsColumnsInformation extends AbstractColumnsTablesInformation
{
    /**
     * Implementation of abstract method
     *
     * @return string get all names of columns from table 'products'
     */
    public function getColumnsQuery(): string
    {
        return "SELECT * FROM information_schema.columns
                         WHERE table_schema = 'public'
                         AND table_name   = 'products'";
    }
}
