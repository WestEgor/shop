<?php

namespace repository\products;

use repository\AbstractColumnsTablesInformation;


/**
 * Class @ProductTableInformation
 * Extends @AbstractColumnsTablesInformation
 * Contain information about entity 'products' columns
 *
 * @package repository\products
 */
class ProductsColumnsInformation extends AbstractColumnsTablesInformation
{
    public function getColumnsQuery(): string
    {
        return "SELECT * FROM information_schema.columns
                         WHERE table_schema = 'public'
                         AND table_name   = 'products'";
    }
}