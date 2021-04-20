<?php


namespace repository\customers;


use repository\AbstractColumnsTablesInformation;

class CustomersTablesInformation extends AbstractColumnsTablesInformation
{

    public function getColumnsQuery(): string
    {
        return "SELECT * FROM information_schema.columns
                         WHERE table_schema = 'public'
                         AND table_name   = 'customers'";
    }
}