<?php

namespace repository\payments;

use DateTime;
use model\Customer;
use model\Payment;
use model\support_classes\Contacts;
use model\support_classes\Location;
use model\support_classes\Person;
use PDO;
use PDOStatement;
use repository\AbstractRepository;
use util\DateMethods;

class PaymentsEntity extends AbstractRepository
{
    /**
     * Implementation of abstract method
     *
     * @return string query of select all in 'payments'
     */
    public function readAllQuery(): string
    {
        return 'SELECT * FROM payments';
    }

    /**
     * Implementation of abstract method
     *
     * @return string query of select all in 'payments' with id
     */
    public function readByKeyQuery(): string
    {
        return 'SELECT * FROM payments WHERE id= :id';
    }

    /**
     * Implementation of abstract method
     *
     * @return string query of insert in 'payments'
     */
    public function createQuery(): string
    {
        return 'INSERT INTO payments(customers_id, amount,payment_date) 
                VALUES(:customers_id, :amount, :payment_date)';
    }

    /**
     * Implementation of abstract method
     *
     * @return string query of update in 'payments'
     */
    public function updateQuery(): string
    {
        return 'UPDATE payments 
                SET amount = :amount, payment_date = :payment_date, customers_id = :customers_id
                WHERE id = :id';
    }

    /**
     * Implementation of abstract method
     *
     * @return string query of delete in 'payments' with
     */
    public function deleteQuery(): string
    {
        return 'DELETE FROM payments WHERE id = :id';
    }

    /**
     * Implementation of abstract method
     *
     * @param  PDOStatement $statement
     * @param  object       $object
     * @return bool
     */
    public function createStatement(PDOStatement $statement, object $object): bool
    {
        if ($object instanceof Payment) {
            $statement->bindValue(':customers_id', $object->getCustomerId());
            $statement->bindValue(':amount', $object->getAmount());
            $statement->bindValue(':payment_date', $object->getPaymentDate()?->format('Y-m-d'));
            return $statement->execute();
        }
        return false;
    }

    /**
     * Implementation of abstract method
     *
     * @param  PDOStatement $statement
     * @return array|false
     */
    public function readAllStatement(PDOStatement $statement): array|false
    {
        $payments = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $customersId = $row['customers_id'];
            $id = $row['id'];
            $amount = $row['amount'];
            $paymentDate = DateMethods::setDate(DateTime::createFromFormat('Y-m-d', $row['payment_date']));
            $payment = new Payment($amount, $paymentDate, $customersId, $id);
            $payments[] = $payment;
        }
        return $payments;
    }

    /**
     * Implementation of abstract method
     *
     * @param  PDOStatement $statement
     * @param  int          $key
     * @return object|false
     */
    public function readByKeyStatement(PDOStatement $statement, int $key): object|false
    {
        $payment = new Payment();
        $obj = $statement->fetchObject();
        if (!$obj) {
            return false;
        }
        $payment->setAll($obj);
        return $payment;
    }

    /**
     * Implementation of abstract method
     *
     * @param  PDOStatement $statement
     * @param  object       $object
     * @return bool
     */
    public function updateStatement(PDOStatement $statement, object $object): bool
    {
        if ($object instanceof Payment) {
            $statement->bindValue(':customers_id', $object->getCustomerId());
            $statement->bindValue(':amount', $object->getAmount());
            $statement->bindValue(':payment_date', $object->getPaymentDate()?->format('Y-m-d'));
            $statement->bindValue(':id', $object->getId());
            return $statement->execute();
        }
        return false;
    }

    /**
     * @return string left inner join of 'payments' and 'customers' query
     */
    public function leftInnerJoinQuery(): string
    {
        return $sql = "SELECT *
                FROM payments
                LEFT JOIN customers
                ON payments.customers_id = customers.id";
    }

    /**
     * Left inner join entities 'payments' and 'customers'
     *
     * @param  PDO $pdo
     * @return array|false
     */
    public function getFullInformationAboutPayments(PDO $pdo): array|false
    {
        $stmt = $pdo->query($this->leftInnerJoinQuery());
        $joinDataArray = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $customersId = $row['customers_id'];
            $id = $row['id'];
            $amount = $row['amount'];
            $paymentDate = DateMethods::setDate(DateTime::createFromFormat('Y-m-d', $row['payment_date']));
            $name = $row['name'];
            $lastName = $row['last_name'];
            $age = $row['age'];
            $country = $row['country'];
            $city = $row['city'];
            $address = $row['address'];
            $zipCode = $row['zip_code'];
            $email = $row['email'];
            $phoneNumber = $row['phone_number'];
            $payment = new Payment($amount, $paymentDate, $customersId, $id);
            $person = new Person($name, $lastName, $age);
            $location = new Location($country, $city, $address, $zipCode);
            $contacts = new Contacts($email, $phoneNumber);
            $customer = new Customer($person, $location, $contacts, $customersId);
            $paymentsJoin = new PaymentsJoin($payment, $customer);
            array_push($joinDataArray, $paymentsJoin);
        }
        return $joinDataArray;
    }
}
