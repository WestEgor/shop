<?php

use repository\orders\OrdersEntitiesMethods;

require __DIR__ . '/../../vendor/autoload.php';

$id = $_REQUEST['id'];
OrdersEntitiesMethods::deleteOrder($id);
header('Location: orders.php');