<?php
require __DIR__ . '/../../vendor/autoload.php';

use config\Connector as Connection;
use repository\products\ProductsEntitiesMethods;

$id = $_REQUEST['id'];
$pdo = Connection::get()->getConnect();
ProductsEntitiesMethods::deleteProduct($pdo, $id);
header('Location: products.php');