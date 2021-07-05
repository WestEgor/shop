<?php
if (!session_id()) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

use config\Connector as Connection;
use model\OrderDetails;
use repository\order_details\OrderDetailsEntityMethods;

?>

<html lang="en">

<head>
    <title>Show products</title>
</head>

<body>
<?php require '../navbar.php'; ?>
<?php require 'orderDetailsData.php'; ?>

<a class="btn btn-primary" style="margin-left: 10px" href="orderDetailsCreate.php">Add new order details</a>
<div style="margin-top: 10px">
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-left: 10px">
        <label>
            Search by ID:
            <input type="text" name="search_by_id_order_details"/>
            <button class="btn btn-primary" type="submit" name="submit" style="margin-left: 3px">Submit</button>
        </label>
    </form>
</div>
<?php
if (isset($_GET['submit'])):
    $id = $_GET['search_by_id_order_details'];
    if (filter_var($id, FILTER_VALIDATE_INT)):
        $pdo = Connection::get()->getConnect();
        if ($orderDetails = OrderDetailsEntityMethods::readOrderDetailsByKey($pdo, $id)): ?>
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
                <?php if ($orderDetails instanceof OrderDetails): ?>
                    <tr>
                        <th scope="row"><?php echo $orderDetails->getId(); ?></th>
                        <td><?php echo $orderDetails->getProductId(); ?></td>
                        <td><?php echo $orderDetails->getOrderId(); ?></td>
                        <td><?php echo $orderDetails->getQuantityOrdered(); ?></td>
                        <td><?php echo $orderDetails->getPrice(); ?></td>
                    </tr>
                <?php endif ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-danger" role="alert">
                <?php echo 'Product with chosen ID doesn\'t exist'; ?>
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

