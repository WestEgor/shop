<?php


namespace repository\customers;

use model\Customer;
use model\support_classes\Contacts;
use model\support_classes\Location;
use model\support_classes\Person;
use PDO;
use PDOStatement;
use repository\AbstractRepository;

/**
 * Class CustomersEntity
 * Extends AbstractRepository
 * Class for work with entity 'customers'
 * @package repository\customers
 */
class CustomersEntity extends AbstractRepository
{

    /**
     * Implementation of abstract method
     * @return string query of insert in 'customers'
     */
    public function createQuery(): string
    {
        return 'INSERT INTO customers(name,last_name,age,country,city,address,zip_code,email,phone_number) 
                VALUES(:name,:last_name,:age,:country,:city,:address,:zip_code,:email,:phone_number)';
    }

    /**
     * Implementation of abstract method
     * @return string query of select all in 'customers'
     */
    public function readAllQuery(): string
    {
        return 'Select * FROM customers';
    }

    /**
     * Implementation of abstract method
     * @return string query of select all in 'customers' with id
     */
    public function readByKeyQuery(): string
    {
        return 'Select * FROM customers WHERE id = :id';
    }

    /**
     * Implementation of abstract method
     * @return string query of update in 'customers'
     */
    public function updateQuery(): string
    {
        return 'UPDATE customers 
                SET name = :name, last_name = :last_name, age = :age, 
                    country = :country, city= :city, address= :address, zip_code= :zip_code,
                    email= :email, phone_number= :phone_number
                WHERE id = :id';
    }

    /**
     * Implementation of abstract method
     * @return string query of delete in 'customers' with
     */
    public function deleteQuery(): string
    {
        return 'DELETE FROM customers WHERE id = :id';
    }

    /**
     * Implementation of abstract method
     * @param PDOStatement $statement
     * @param object $object
     * @return bool
     */
    public function createStatement(PDOStatement $statement, object $object): bool
    {
        $statement->bindValue(':name', $object->getPersonName());
        $statement->bindValue(':last_name', $object->getPersonLastName());
        $statement->bindValue(':age', $object->getPersonAge());
        $statement->bindValue(':country', $object->getLocationCountry());
        $statement->bindValue(':city', $object->getLocationCity());
        $statement->bindValue(':address', $object->getLocationAddress());
        $statement->bindValue(':zip_code', $object->getLocationZipCode());
        $statement->bindValue(':email', $object->getContactsEmail());
        $statement->bindValue(':phone_number', $object->getContactsPhoneNumber());
        return $statement->execute();
    }

    /**
     * Implementation of abstract method
     * @param PDOStatement $statement
     * @return array|false
     */
    public function readAllStatement(PDOStatement $statement): array|false
    {
        $customers = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $name = $row['name'];
            $lastName = $row['last_name'];
            $age = $row['age'];
            $country = $row['country'];
            $city = $row['city'];
            $address = $row['address'];
            $zipCode = $row['zip_code'];
            $email = $row['email'];
            $phoneNumber = $row['phone_number'];
            $person = Person::parameterizedConstructor($name, $lastName, $age);
            $location = Location::parameterizedConstructor($country, $city, $address, $zipCode);
            $contacts = Contacts::parameterizedConstructor($email, $phoneNumber);
            $customer = Customer::parameterizedConstructor($person, $location, $contacts);
            $customer->setId($id);
            $customers[] = $customer;
        }
        return $customers;
    }

    /**
     * Implementation of abstract method
     * @param PDOStatement $statement
     * @param int $key
     * @return object|false
     */
    public function readByKeyStatement(PDOStatement $statement, int $key): object|false
    {
        $customer = new Customer();
        $obj = $statement->fetchObject();
        if (!$obj) return false;
        $customer->setAll($obj);
        return $customer;
    }

    /**
     * Implementation of abstract method
     * @param PDOStatement $statement
     * @param object $object
     * @return bool
     */
    public function updateStatement(PDOStatement $statement, object $object): bool
    {
        $statement->bindValue(':name', $object->getPersonName());
        $statement->bindValue(':last_name', $object->getPersonLastName());
        $statement->bindValue(':age', $object->getPersonAge());
        $statement->bindValue(':country', $object->getLocationCountry());
        $statement->bindValue(':city', $object->getLocationCity());
        $statement->bindValue(':address', $object->getLocationAddress());
        $statement->bindValue(':zip_code', $object->getLocationZipCode());
        $statement->bindValue(':email', $object->getContactsEmail());
        $statement->bindValue(':phone_number', $object->getContactsPhoneNumber());
        $statement->bindValue(':id', $object->getId());
        return $statement->execute();
    }
}