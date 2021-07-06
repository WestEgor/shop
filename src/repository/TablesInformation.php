<?php

namespace repository;

use PDO;

/**
 * Class TablesInformation
 * Get information from all tables in scheme
 *
 * @package repository
 */
class TablesInformation
{

    /**
     * Contain instance of PDO
     *
     * @var PDO
     */
    protected PDO $pdo;

    /**
     * TablesInformation constructor
     *
     * @param PDO $pdo instance of PDO
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getTablesNameQuery(): string
    {
        return "SELECT table_name 
                FROM information_schema.tables 
                WHERE table_schema= 'public' 
                      AND table_type='BASE TABLE'
                ORDER BY table_name";
    }

    /**
     * Method to get all tables from scheme
     *
     * @return array|false
     * return ARRAY iff minimum 1 table exists
     * return FALSE if no tables in scheme
     */
    public function getTableName(): array|false
    {
        $stmt = $this->pdo->query($this->getTablesNameQuery());
        $tableList = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tableList[] = $row['table_name'];
        }
        if (count($tableList) === 0) {
            return false;
        }
        return $tableList;
    }
}
