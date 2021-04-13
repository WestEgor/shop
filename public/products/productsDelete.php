<?php
require __DIR__ . '/../../vendor/autoload.php';

use config\Connector as Connection;
use repository\products\ProductEntity;

$id = $_REQUEST['id'];
$pdo = Connection::get()->getConnect();
$deleteProd = new ProductEntity($pdo);
$deleteProd->delete($id);
header('Location: products.php');