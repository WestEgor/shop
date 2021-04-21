<?php

namespace repository;

use PDO;

abstract class AbstractColumnsTablesInformation extends TablesInformation
{

    /**
     * Abstract method
     * @return string get all names of columns from table query
     */
    abstract public function getColumnsQuery(): string;

    /**
     * Method to get all columns of tables
     * @return array|false
     * return ARRAY if columns exist
     * return FALSE if no columns in table
     */
    public function getColumnName(): array|false
    {
        $stmt = $this->pdo->query($this->getColumnsQuery());
        $tableList = [];
        while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
            $tableList[] = $row['column_name'];
        }
        if (count($tableList) === 0) return false;
        return $tableList;
    }

}