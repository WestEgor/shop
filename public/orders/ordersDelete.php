<?php

use repository\orders\OrdersEntityMethods;

require __DIR__ . '/../../vendor/autoload.php';

$id = $_REQUEST['id'];
OrdersEntityMethods::deleteOrder($id);
header('Location: orders.php');
