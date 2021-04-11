<?php

namespace repository\products;

use repository\TableInformation;
use PDO;

class ProductTableInformation extends TableInformation
{

    public function getColumnName(): array
    {
        $stmt = $this->pdo->query("SELECT *
                                     FROM information_schema.columns
                                    WHERE table_schema = 'public'
                                    AND table_name   = 'products'");
        $tableList = [];
        while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
            $tableList[] = $row['column_name'];
        }
        return $tableList;
    }
}