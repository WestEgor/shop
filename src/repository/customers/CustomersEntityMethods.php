<?php

namespace repository\customers;

use config\Connector as Connection;
use model\help_change_name\Contacts;
use model\help_change_name\Location;
use model\help_change_name\Person;
use model\Customer;

use PDO;

class CustomersEntityMethods
{

    public static function readAllCustomers(PDO $pdo)
    {
        $customersDB = new CustomersEntity($pdo);
        return $customersDB->readAll();
    }

    public static function readCustomersByKey(PDO $pdo, int $id)
    {
        $productEntity = new CustomersEntity($pdo);
        return $productEntity->read($id);
    }

    public static function createCustomer(Person $person, Location $location, Contacts $contacts)
    {
        $pdo = Connection::get()->getConnect();
        $customerEntity = new CustomersEntity($pdo);
        $customer = Customer::parameterizedConstructor($person, $location, $contacts);
        return $customerEntity->create($customer);
    }

    public static function updateCustomer(PDO $pdo, int $id, Person $person, Location $location, Contacts $contacts)
    {
        $customer = Customer::parameterizedConstructor($person, $location, $contacts);
        $customer->setId($id);
        $customerEntity = new CustomersEntity($pdo);
        return $customerEntity->update($customer);
    }

    public static function deleteCustomer(int $id)
    {
        $pdo = Connection::get()->getConnect();
        $deleteCustomer = new CustomersEntity($pdo);
        return $deleteCustomer->delete($id);
    }
}