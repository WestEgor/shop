<?php

namespace repository\customers;

use config\Connector as Connection;
use model\support_classes\Contacts;
use model\support_classes\Location;
use model\support_classes\Person;
use model\Customer;
use PDO;

/**
 * Class CustomersEntityMethods
 * Class which have static methods to manipulate CustomersEntities methods
 *
 * @package repository\customers
 */
class CustomersEntityMethods
{

    /**
     * Methods, that get all records of 'customers' entity in @param PDO $pdo
     *
     * @return  bool|array
     * return array iff records exist in table
     * return FALSE if no records in table
     * @package public
     */
    public static function readAllCustomers(PDO $pdo): bool|array
    {
        $customersDB = new CustomersEntity($pdo);
        return $customersDB->readAll();
    }

    /**
     * Methods, that get record with specified key of 'customers' entity in @param PDO $pdo
     *
     * @param   int $id
     * @return  object|bool
     * return object iff record with specified id exist in table
     * return FALSE if no record with specified in table
     * @package public
     */
    public static function readCustomersByKey(PDO $pdo, int $id): object|bool
    {
        $productEntity = new CustomersEntity($pdo);
        return $productEntity->read($id);
    }

    /**
     * Methods, that create record in 'customers' entity in @param Person $person
     *
     * @param   Location $location
     * @param   Contacts $contacts
     * @return  bool
     * return TRUE iff record was created
     * return FALSE if records was not create
     * @package public
     */
    public static function createCustomer(Person $person, Location $location, Contacts $contacts): bool
    {
        $pdo = Connection::get()->getConnect();
        $customerEntity = new CustomersEntity($pdo);
        $customer = new Customer($person, $location, $contacts);
        return $customerEntity->create($customer);
    }

    /**
     * Methods, that update record in 'customers' entity in @param PDO $pdo
     *
     * @param   int      $id
     * @param   Person   $person
     * @param   Location $location
     * @param   Contacts $contacts
     * @return  bool
     * return TRUE iff record was updated
     * return FALSE if records was not updated
     * @package public
     */
    public static function updateCustomer(
        PDO $pdo,
        int $id,
        Person $person,
        Location $location,
        Contacts $contacts
    ): bool {
        $customer = new Customer($person, $location, $contacts, $id);
        $customerEntity = new CustomersEntity($pdo);
        return $customerEntity->update($customer);
    }

    /**
     * Methods, that delete record in 'customers' entity in @param int $id
     *
     * @return  bool
     * return TRUE iff record was deleted
     * return FALSE if records was not deleted
     * @package public
     */
    public static function deleteCustomer(int $id): bool
    {
        $pdo = Connection::get()->getConnect();
        $deleteCustomer = new CustomersEntity($pdo);
        return $deleteCustomer->delete($id);
    }
}
