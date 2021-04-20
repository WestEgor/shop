<?php
require __DIR__ . '/../../vendor/autoload.php';

use repository\order_details\OrderDetailsEntityMethods;

$id = $_REQUEST['id'];
OrderDetailsEntityMethods::deleteOrderDetails($id);
header('Location: order_details.php');
