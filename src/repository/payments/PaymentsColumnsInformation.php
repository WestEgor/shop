<?php


namespace repository\payments;


use repository\AbstractColumnsTablesInformation;

class PaymentsColumnsInformation extends AbstractColumnsTablesInformation
{

    public function getColumnsQuery(): string
    {
        return "SELECT * FROM information_schema.columns
                         WHERE table_schema = 'public'
                         AND table_name   = 'payments'";
    }
}