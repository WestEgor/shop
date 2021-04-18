<?php

use repository\payments\PaymentsEntitiesMethods;

require __DIR__ . '/../../vendor/autoload.php';

$id = $_REQUEST['id'];
PaymentsEntitiesMethods::deletePayment($id);
header('Location: payments.php');
