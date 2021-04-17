<?php

use repository\customers\CustomersEntitiesMethods;

require __DIR__ . '/../../vendor/autoload.php';


$id = $_REQUEST['id'];
CustomersEntitiesMethods::deleteCustomer($id);
header('Location: customers.php');