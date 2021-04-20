<?php

use repository\payments\PaymentsEntityMethods;

require __DIR__ . '/../../vendor/autoload.php';

$id = $_REQUEST['id'];
PaymentsEntityMethods::deletePayment($id);
header('Location: payments.php');
