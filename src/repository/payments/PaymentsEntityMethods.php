<?php

namespace repository\payments;

use config\Connector as Connection;
use DateTime;
use model\Payment;
use PDO;

/**
 * Class PaymentsEntityMethods
 * Class which have static methods to manipulate PaymentsEntities methods
 *
 * @package repository\products
 */
class PaymentsEntityMethods
{

    /**
     * Methods, that create record in 'payments' entity in @param int $customersId
     *
     * @param   float    $amount
     * @param   DateTime $paymentDate
     * @return  bool
     * return TRUE iff record was created
     * return FALSE if records was not create
     * @package public
     */
    public static function createPayment(int $customersId, float $amount, DateTime $paymentDate): bool
    {
        $pdo = Connection::get()->getConnect();
        $payment = new Payment($amount, $paymentDate, $customersId);
        $paymentEntity = new PaymentsEntity($pdo);
        return $paymentEntity->create($payment);
    }

    /**
     * Methods, that get all records of 'payments' entity in @param PDO $pdo
     *
     * @return  array|false
     * return array iff records exist in table
     * return FALSE if no records in table
     * @package public
     */
    public static function readAllPayments(PDO $pdo): array|false
    {
        $paymentsDB = new PaymentsEntity($pdo);
        return $paymentsDB->readAll();
    }

    /**
     * Methods, that get record with specified key of 'payment' entity in @param PDO $pdo instance of @PDO
     *
     * @param   int $id @Product id
     * @return  object|false
     * return object iff record with specified id exist in table
     * return FALSE if no record with specified in table
     * @package public
     */
    public static function readPaymentByKey(PDO $pdo, int $id): object|false
    {
        $paymentEntity = new PaymentsEntity($pdo);
        return $paymentEntity->read($id);
    }

    /**
     * Methods, that update record in 'payments' entity in @param PDO $pdo
     *
     * @param   int      $id
     * @param   int      $customersId
     * @param   float    $amount
     * @param   DateTime $paymentDate
     * @return  bool
     * return TRUE iff record was updated
     * return FALSE if records was not updated
     * @package public
     */
    public static function updatePayment(
        PDO $pdo,
        int $id,
        int $customersId,
        float $amount,
        DateTime $paymentDate
    ): bool {
        $payment = new Payment($amount, $paymentDate, $customersId, $id);
        $paymentEntity = new PaymentsEntity($pdo);
        return $paymentEntity->update($payment);
    }


    /**
     * Methods, that delete record in 'payments' entity in @param int $id
     *
     * @return  bool
     * return TRUE iff record was deleted
     * return FALSE if records was not deleted
     * @package public
     */
    public static function deletePayment(int $id): bool
    {
        $pdo = Connection::get()->getConnect();
        $paymentEntity = new PaymentsEntity($pdo);
        return $paymentEntity->delete($id);
    }
}
