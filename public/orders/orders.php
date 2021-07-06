<?php
if (!session_id()) {
    session_start();
}
require __DIR__ . '/../../vendor/autoload.php';

use config\Connector as Connection;
use model\Order;
use repository\orders\OrdersEntityMethods;

?>

<html lang="en">

<head>
    <title>Show orders</title>
</head>

<body>
<?php require '../navbar.php'; ?>
<?php require 'ordersData.php'; ?>

<a class="btn btn-primary" style="margin-left: 10px" href="ordersCreate.php">Add new order</a>
<div style="margin-top: 10px">
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin-left: 10px">
        <label>
            Search by ID:
            <input type="text" name="search_by_id_orders"/>
            <button class="btn btn-primary" type="submit" name="submit" style="margin-left: 3px">Submit</button>
        </label>
    </form>
</div>
<?php
if (isset($_GET['submit'])) :
    $id = $_GET['search_by_id_orders'];
    if (filter_var($id, FILTER_VALIDATE_INT)) :
        $pdo = Connection::get()->getConnect();
        if ($order = OrdersEntityMethods::readOrderByKey($pdo, $id)) :
            ?>
            <table class="table table-striped" style="margin-left: 3px">
                <thead>
                <tr>
                    <?php
                    foreach ($col as $column) :
                        ?>
                        <th scope="col"><?php echo $column ?>
                        </th>
                    <?php endforeach;
                    ?>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <?php if ($order instanceof Order) : ?>
                        <th scope="row"><?php echo $order->getId(); ?></th>
                        <td><?php echo $order->getOrderDate()->format('Y-m-d'); ?></td>
                        <td><?php echo $order->getRequiredDate()->format('Y-m-d'); ?></td>
                        <td><?php echo $order->getStatus(); ?></td>
                        <td><?php echo $order->getComments(); ?></td>
                        <td><?php echo $order->getCustomerId(); ?></td>
                    <?php endif; ?>
                </tr>
                </tbody>
            </table>
        <?php else : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo 'Order with chosen ID doesn\'t exist'; ?>
            </div>
            <?php
        endif;
    else :?>
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
