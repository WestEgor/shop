<?php
if (!session_id()) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

use config\Connector as Connection;
use model\Customer;
use repository\customers\CustomersEntityMethods;

?>

<html lang="en">

<head>
    <title>Show customers</title>
</head>

<body>
<?php require '../navbar.php'; ?>
<?php require 'customersData.php'; ?>

<a class="btn btn-primary" style="margin-left: 10px" href="customersCreate.php">Add new customer</a>
<div style="margin-top: 10px">
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-left: 10px">
        <label>
            Search by ID:
            <input type="text" name="search_by_id_customers"/>
            <button class="btn btn-primary" type="submit" name="submit" style="margin-left: 3px">Submit</button>
        </label>
    </form>
</div>
<?php
if (isset($_GET['submit'])):
    $id = $_GET['search_by_id_customers'];
    if (filter_var($id, FILTER_VALIDATE_INT)):
        $pdo = Connection::get()->getConnect();
        if ($customer = CustomersEntityMethods::readCustomersByKey($pdo, $id)):?>
            <table class="table table-striped" style="margin-left: 3px">
                <thead>
                <tr>
                    <?php foreach ($col as $column):
                        ?>
                        <th scope="col"><?php echo $column ?>
                        </th>
                    <?php endforeach;
                    ?>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php if ($customer instanceof Customer): ?>
                        <th scope="row"><?php echo $customer->getId(); ?></th>
                        <td><?php echo $customer->getPersonName(); ?></td>
                        <td><?php echo $customer->getPersonLastName(); ?></td>
                        <td><?php echo $customer->getPersonAge(); ?></td>
                        <td><?php echo $customer->getLocationCountry(); ?></td>
                        <td><?php echo $customer->getLocationCity(); ?></td>
                        <td><?php echo $customer->getLocationAddress(); ?></td>
                        <td><?php echo $customer->getLocationZipCode(); ?></td>
                        <td><?php echo $customer->getContactsEmail(); ?></td>
                        <td><?php echo $customer->getContactsPhoneNumber(); ?></td>
                    <?php endif; ?>
                </tr>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                <?php echo 'Customer with chosen ID doesn\'t exist'; ?>
            </div>
        <?php
        endif;
    else:?>
        <div class="alert alert-danger" role="alert">
            <?php echo 'ID have to be integer value(without comma)'; ?>
        </div>
    <?php
    endif;
endif;
session_destroy();
?>
</body>
</html>