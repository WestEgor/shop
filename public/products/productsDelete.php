<?php
require __DIR__ . '/../../vendor/autoload.php';

use config\Connector as Connection;
use repository\products\ProductsMethods;

$id = $_REQUEST['id'];
$pdo = Connection::get()->getConnect();
ProductsMethods::deleteProduct($pdo, $id);
header('Location: products.php');