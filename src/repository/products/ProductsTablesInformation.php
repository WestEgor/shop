<?php

namespace repository\products;

use repository\TablesInformation;
use PDO;

/**
 * Class @ProductTableInformation
 * Extends @TablesInformation
 * Contain information about entity 'products'
 *
 * @package repository\products
 */
class ProductsTablesInformation extends TablesInformation
{
    /**
     * Method to get all columns of products table
     *
     * @return array|false
     * return ARRAY if columns exist
     * return FALSE if no columns in table
     */
    public function getColumnName(): array|false
    {
        $stmt = $this->pdo->query("SELECT *
                                     FROM information_schema.columns
                                    WHERE table_schema = 'public'
                                    AND table_name   = 'products'");
        $tableList = [];
        while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
            $tableList[] = $row['column_name'];
        }
        if (count($tableList) === 0) return false;
        return $tableList;
    }
}