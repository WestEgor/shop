<?php


namespace repository\payments;

use config\Connector as Connection;
use DateTime;
use model\Payment;
use PDO;

class PaymentsEntityMethods
{

    public static function createPayment(int $customersId, float $amount, DateTime $paymentDate): bool
    {
        $pdo = Connection::get()->getConnect();
        $payment = Payment::parameterizedConstructor($customersId, $amount, $paymentDate);
        $paymentEntity = new PaymentsEntity($pdo);
        return $paymentEntity->create($payment);
    }

    public static function readAllPayments(PDO $pdo): array|false
    {
        $paymentsDB = new PaymentsEntity($pdo);
        return $paymentsDB->readAll();
    }

    /**
     * Methods, that get record with specified key of 'product' entity in @param PDO $pdo instance of @PDO
     * @param int $id @Product id
     * @return object|false
     * return object iff record with specified id exist in table
     * return FALSE if no record with specified in table
     * @package public
     *
     */
    public static function readPaymentByKey(PDO $pdo, int $id): object|false
    {
        $paymentEntity = new PaymentsEntity($pdo);
        return $paymentEntity->read($id);
    }

    public static function updatePayment(PDO $pdo, int $id,int $customersId,
                                         float $amount, DateTime $paymentDate ): bool
    {
        $payment = Payment::parameterizedConstructor($customersId, $amount, $paymentDate);
        $payment->setId($id);
        $paymentEntity = new PaymentsEntity($pdo);
        return $paymentEntity->update($payment);
    }


    public static function deletePayment(int $id): bool
    {
        $pdo = Connection::get()->getConnect();
        $paymentEntity = new PaymentsEntity($pdo);
        return $paymentEntity->delete($id);
    }


}