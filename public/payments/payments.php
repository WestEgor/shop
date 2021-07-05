<?php
if (!session_id()) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

use config\Connector as Connection;
use model\Payment;
use repository\payments\PaymentsEntityMethods;

?>

<html lang="en">

<head>
    <title>Show payments</title>
</head>

<body>
<?php require '../navbar.php'; ?>
<?php require 'paymentsData.php'; ?>

<a class="btn btn-primary" style="margin-left: 10px" href="paymentsCreate.php">Add new payment</a>
<div style="margin-top: 10px">
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-left: 10px">
        <label>
            Search by ID:
            <input type="text" name="search_by_id_payments"/>
            <button class="btn btn-primary" type="submit" name="submit" style="margin-left: 3px">Submit</button>
        </label>
    </form>
    <form method="get" action="paymentsJoin.php" style="margin-left: 10px">
        <label> Get full info about payments (join):
            <button class="btn btn-primary" type="submit" name="submit" style="margin-left: 3px">Get</button>
        </label>
    </form>
</div>
<?php
if (isset($_GET['submit'])):
    $id = $_GET['search_by_id_payments'];
    if (filter_var($id, FILTER_VALIDATE_INT)):
        $pdo = Connection::get()->getConnect();
        if ($payment = PaymentsEntityMethods::readPaymentByKey($pdo, $id)):?>
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
                    <?php if ($payment instanceof Payment): ?>
                        <th scope="row"><?php echo $payment->getCustomerId(); ?></th>
                        <td><?php echo $payment->getId(); ?></td>
                        <td><?php echo $payment->getAmount(); ?></td>
                        <td><?php echo $payment->getPaymentDate()->format('Y-m-d'); ?></td>
                    <?php endif; ?>
                </tr>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                <?php echo 'Payment with chosen ID doesn\'t exist'; ?>
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
