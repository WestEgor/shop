<?php
require __DIR__ . '/../../vendor/autoload.php';

use repository\products\ProductsEntityMethods;

$id = $_REQUEST['id'];
ProductsEntityMethods::deleteProduct($id);
header('Location: products.php');