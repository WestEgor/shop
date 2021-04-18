<?php


namespace repository\payments;


use DateTime;
use model\Payment;
use PDO;
use PDOStatement;
use repository\AbstractRepository;

class PaymentsEntity extends AbstractRepository
{

    public function readAllQuery(): string
    {
        return 'SELECT * FROM payments';
    }

    public function readByKeyQuery(): string
    {
        return 'SELECT * FROM payments WHERE id= :id';
    }

    public function createQuery(): string
    {
        return 'INSERT INTO payments(customers_id, amount,payment_date) 
                VALUES(:customers_id, :amount, :payment_date)';
    }

    public function updateQuery(): string
    {
        return 'UPDATE payments 
                SET amount = :amount, payment_date = :payment_date, customers_id = :customers_id
                WHERE id = :id';
    }

    public function deleteQuery(): string
    {
        return 'DELETE FROM payments WHERE id = :id';
    }

    public function createStatement(PDOStatement $statement, object $object): bool
    {
        $statement->bindValue(':customers_id', $object->getCustomerId());
        $statement->bindValue(':amount', $object->getAmount());
        $statement->bindValue(':payment_date', $object->getPaymentDate()->format('Y-m-d'));
        return $statement->execute();
    }

    public function readAllStatement(PDOStatement $statement): array|false
    {
        $payments = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $customersId = $row['customers_id'];
            $id = $row['id'];
            $amount = $row['amount'];
            $paymentDate = DateTime::createFromFormat('Y-m-d', $row['payment_date']);
            $payment = Payment::parameterizedConstructor($customersId, $amount, $paymentDate);
            $payment->setId($id);
            $payments[] = $payment;
        }
        return $payments;
    }

    public function readByKeyStatement(PDOStatement $statement, int $key): object|false
    {
        $payment = new Payment();
        $obj = $statement->fetchObject();
        if (!$obj) return false;
        $payment->setAll($obj);
        return $payment;
    }

    public function updateStatement(PDOStatement $statement, object $object): bool
    {
        $statement->bindValue(':customers_id', $object->getCustomerId());
        $statement->bindValue(':amount', $object->getAmount());
        $statement->bindValue(':payment_date', $object->getPaymentDate()->format('Y-m-d'));
        $statement->bindValue(':id', $object->getId());
        return $statement->execute();
    }
}