<?php
require __DIR__ . '/../../vendor/autoload.php';

use config\Connector as Connection;
use repository\products\ProductsEntitiesMethods;

$id = $_REQUEST['id'];
ProductsEntitiesMethods::deleteProduct($id);
header('Location: products.php');