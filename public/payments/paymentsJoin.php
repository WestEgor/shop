<?php

require __DIR__ . '/../../vendor/autoload.php';

require '../navbar.php';

use config\Connector as Connection;
use repository\payments\PaymentsEntity;
use repository\payments\PaymentsJoin;

$pdo = Connection::get()->getConnect();
$paymentsEntity = new PaymentsEntity($pdo);
$paymentJoin = $paymentsEntity->getFullInformationAboutPayments($pdo);
$paymentJoinLength = 0;
if (is_array($paymentJoin)) :
    $paymentJoinLength = count($paymentJoin);
endif;
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
    <?php
    foreach ($paymentJoin as $pj) :
        if ($pj instanceof PaymentsJoin) :
            ?>
            <tr>
                <td><?php echo $pj->getPayment()->getCustomerId(); ?></td>
                <td><?php echo $pj->getPayment()->getId(); ?></td>
                <td><?php echo $pj->getPayment()->getAmount(); ?></td>
                <td><?php echo $pj->getPayment()->getPaymentDate()?->format('Y-m-d'); ?></td>
                <td><?php echo $pj->getCustomer()->getPersonName(); ?></td>
                <td><?php echo $pj->getCustomer()->getPersonLastName(); ?></td>
                <td><?php echo $pj->getCustomer()->getPersonAge(); ?></td>
                <td><?php echo $pj->getCustomer()->getLocationCountry(); ?></td>
                <td><?php echo $pj->getCustomer()->getLocationCity(); ?></td>
                <td><?php echo $pj->getCustomer()->getLocationAddress(); ?></td>
                <td><?php echo $pj->getCustomer()->getLocationZipCode(); ?></td>
                <td><?php echo $pj->getCustomer()->getContactsEmail(); ?></td>
                <td><?php echo $pj->getCustomer()->getContactsPhoneNumber(); ?></td>
            </tr>
            <?php
        endif;
    endforeach; ?>
    </tbody>
</table>
