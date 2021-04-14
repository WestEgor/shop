<?php

namespace repository;

use PDO;

class TableInformation
{

    protected $pdo;

    /**
     * TableInformation constructor.
     */
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getTableName(): array
    {
        $stmt = $this->pdo->query("SELECT table_name 
                                   FROM information_schema.tables 
                                   WHERE table_schema= 'public' 
                                        AND table_type='BASE TABLE'
                                   ORDER BY table_name");
        $tableList = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tableList[] = $row['table_name'];
        }
        return $tableList;
    }



}