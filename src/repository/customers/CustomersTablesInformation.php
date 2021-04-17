<?php


namespace repository\customers;


use repository\AbstractColumnsTablesInformation;
use repository\TablesInformation;

class CustomersTablesInformation extends AbstractColumnsTablesInformation
{

    public function getColumnsQuery(): string
    {
        return "SELECT * FROM information_schema.columns
                         WHERE table_schema = 'public'
                         AND table_name   = 'customers'";
    }
}