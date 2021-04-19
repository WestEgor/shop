<?php


namespace repository\orders;


use repository\AbstractColumnsTablesInformation;

class OrdersColumnsInformation extends AbstractColumnsTablesInformation
{

    public function getColumnsQuery(): string
    {
        return "SELECT * FROM information_schema.columns
                         WHERE table_schema = 'public'
                         AND table_name   = 'orders'";
    }
}