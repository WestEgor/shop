<?php

require __DIR__ . '/../../vendor/autoload.php';

require '../navbar.php';

use config\Connector as Connection;
use repository\payments\PaymentsEntity;

$pdo = Connection::get()->getConnect();
$paymentsEntity = new PaymentsEntity($pdo);
$paymentJoin = $paymentsEntity->getFullInformationAboutPayments($pdo);
$paymentJoinLength = count($paymentJoin);
?>

<table class="table table-striped" style="margin-left: 3px">
    <thead>
    <tr>
        <th>CUSTOMER ID</th>
        <th>ID</th>
        <th>AMOUNT</th>
        <th>PAYMENT DATE</th>
        <th>NAME</th>
        <th>LAST NAME</th>
        <th>AGE</th>
        <th>COUNTRY</th>
        <th>CITY</th>
        <th>ADDRESS</th>
        <th>ZIP CODE</th>
        <th>EMAIL</th>
        <th>PHONE NUMBER</th>
    </tr>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < $paymentJoinLength; $i++):
        ?>
        <tr>
            <td><?php echo $paymentJoin[$i]->getPayment()->getCustomerId(); ?></td>
            <td><?php echo $paymentJoin[$i]->getPayment()->getId(); ?></td>
            <td><?php echo $paymentJoin[$i]->getPayment()->getAmount(); ?></td>
            <td><?php echo $paymentJoin[$i]->getPayment()->getPaymentDate()->format('Y-m-d'); ?></td>
            <td><?php echo $paymentJoin[$i]->getCustomer()->getPersonName(); ?></td>
            <td><?php echo $paymentJoin[$i]->getCustomer()->getPersonLastName(); ?></td>
            <td><?php echo $paymentJoin[$i]->getCustomer()->getPersonAge(); ?></td>
            <td><?php echo $paymentJoin[$i]->getCustomer()->getLocationCountry(); ?></td>
            <td><?php echo $paymentJoin[$i]->getCustomer()->getLocationCity(); ?></td>
            <td><?php echo $paymentJoin[$i]->getCustomer()->getLocationAddress(); ?></td>
            <td><?php echo $paymentJoin[$i]->getCustomer()->getLocationZipCode(); ?></td>
            <td><?php echo $paymentJoin[$i]->getCustomer()->getContactsEmail(); ?></td>
            <td><?php echo $paymentJoin[$i]->getCustomer()->getContactsPhoneNumber(); ?></td>
        </tr>
    <?php endfor; ?>
    </tbody>
</table>
