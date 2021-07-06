<?php

use repository\customers\CustomersEntityMethods;

require __DIR__ . '/../../vendor/autoload.php';


$id = $_REQUEST['id'];
CustomersEntityMethods::deleteCustomer($id);
header('Location: customers.php');
